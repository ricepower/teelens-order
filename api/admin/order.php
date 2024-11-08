<?php
include("../../utils/checkAdmin.php");
include("../../utils/db.php");

$flag = $_POST["flag"];
if (!isset($flag)) {
    echo "{}";
    exit();
}
try {
    switch ($flag) {
        case "selectOrderListBy":
            $startDate = isset($_POST["startDate"]) ? trim($_POST["startDate"]) : date("Y-m-d", strtotime("-7 Day")) . " 00:00:00";
            $endDate = isset($_POST["endDate"]) ? trim($_POST["endDate"]) : date("Y-m-d") . " 23:59:59";
            $orderIdx = isset($_POST["orderIdx"]) ? trim($_POST["orderIdx"]) : "";
            $state = isset($_POST["state"]) ? trim($_POST["state"]) : "";

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $conditions = array();
            $params = array();
            $types = "";

            if (!empty($startDate)) {
                $conditions[] = "order_date >= ?";
                $params[] = $startDate . " 00:00:00";
                $types .= "s";
            }
            
            if (!empty($endDate)) {
                $conditions[] = "order_date <= ?";
                $params[] = $endDate . " 23:59:59";
                $types .= "s";
            }

            if (!empty($orderIdx)) {
                $conditions[] = "`order`.`idx` = ?";
                $params[] = $orderIdx;
                $types .= "i";
            }
            
            if (!empty($state)) {
                $conditions[] = "state = ?";
                $params[] = $state;
                $types .= "s";
            }

            $sql = "SELECT 
                `order`.*, 
                `order_lens_spec`.`LR` AS `spec_LR`, 
                `order_lens_spec`.`sph` AS `spec_sph`, 
                `order_lens_spec`.`cyl` AS `spec_cyl`, 
                `order_lens_spec`.`axis` AS `spec_axis`, 
                `order_lens_spec`.`add` AS `spec_add`, 
                `order_lens_spec`.`dia` AS `spec_dia`, 
                `order_lens_spec`.`prism` AS `spec_prism`, 
                `order_lens_spec`.`qty` AS `spec_qty`, 
                `order_type`.`name` AS `type_name` 
                FROM `order`
                LEFT JOIN `order_lens_spec` ON `order`.`idx` = `order_lens_spec`.`order_idx`
                LEFT JOIN `order_type` ON `order`.`type_idx` = `order_type`.`idx`";

            if (!empty($conditions)) {
                $sql .= " AND " . implode(" AND ", $conditions);
            }
            $sql .= " ORDER BY `order`.`idx`, `order`.`order_date`, `order_lens_spec`.`LR` DESC";
            $stmt = mysqli_prepare($conn, $sql);
            
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            $sqlResult = mysqli_stmt_get_result($stmt);
            
            $resultArr = array();
            while ($row = mysqli_fetch_array($sqlResult)) {
                $rowArr = array();
                $rowArr['idx'] = $row['idx'];
                $rowArr['name'] = $row['name'];
                $rowArr['type'] = $row['type_name'];
                $rowArr['coating'] = $row['coating'];
                $rowArr['spec_LR'] = $row['spec_LR'];
                $rowArr['spec_sph'] = $row['spec_sph'];
                $rowArr['spec_cyl'] = $row['spec_cyl'];
                $rowArr['spec_axis'] = $row['spec_axis'];
                $rowArr['spec_add'] = $row['spec_add'];
                $rowArr['spec_dia'] = $row['spec_dia'];
                $rowArr['spec_prism'] = $row['spec_prism'];
                $rowArr['spec_qty'] = $row['spec_qty'];
                $rowArr['state'] = $row['state'];
                array_push($resultArr, $rowArr);
            }
            
            $result['data'] = $resultArr;
            echo json_encode($result);
            exit();
            break;
        default:
            header(trim("HTTP/1.0 500 InternalServerError"));
            exit();
            break;
    }
} catch (Exception $e) {
    header(trim("HTTP/1.0 500 InternalServerError"));
    exit();
}
?>