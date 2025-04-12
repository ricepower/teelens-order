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
                `order_type`.`name` AS `type_name`,
                `order_design`.`name` AS `design_name`,
                `order_index`.`name` AS `index_name`,
                `order_color`.`name` AS `color_name`,
                `member`.`name` AS `member_name`
                FROM `order`
                LEFT JOIN `order_lens_spec` ON `order`.`idx` = `order_lens_spec`.`order_idx`
                LEFT JOIN `order_type` ON `order`.`type_idx` = `order_type`.`idx`
                LEFT JOIN `order_design` ON `order`.`design_idx` = `order_design`.`idx`
                LEFT JOIN `order_index` ON `order`.`index_idx` = `order_index`.`idx`
                LEFT JOIN `order_color` ON `order`.`color_idx` = `order_color`.`idx`
                LEFT JOIN `member` ON `order`.`member_idx` = `member`.`idx`";

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
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
                $rowArr['index_name'] = $row['index_name'];
                $rowArr['design_name'] = $row['design_name'];
                $rowArr['color_name'] = $row['color_name'];
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
                $rowArr['member_name'] = $row['member_name'];
                array_push($resultArr, $rowArr);
            }
            
            $result['data'] = $resultArr;
            echo json_encode($result);
            exit();
            break;
        case "deleteOne":
            $orderIdx = $_POST["orderIdx"];
            mysqli_begin_transaction($conn);
            $deleteOrderSql = "DELETE FROM `order` WHERE `idx` = " . $orderIdx;
            $deleteOrderResult = mysqli_query($conn, $deleteOrderSql);

            $deleteOrderLensSpecSql = "DELETE FROM `order_lens_spec` WHERE `order_idx` = " . $orderIdx;
            $deleteOrderLensSpecResult = mysqli_query($conn, $deleteOrderLensSpecSql);

            if ($deleteOrderResult && $deleteOrderLensSpecResult) {
                mysqli_commit($conn);
                echo http_response_code(200);
            } else {
                mysqli_rollback($conn);
                header(trim("HTTP/1.0 500 InternalServerError"));
                exit();
            }
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