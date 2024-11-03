<?php
include("../db.php");

$flag = $_POST["flag"];
if (!isset($flag)) {
    echo "{}";
    exit();
}
try {
    switch ($flag) {
        case "createOne":
            $orderName = mysqli_real_escape_string($conn, trim($_POST["orderName"]));
            $orderType = mysqli_real_escape_string($conn, trim($_POST["orderType"]));
            
            $orderRSPH = mysqli_real_escape_string($conn, trim($_POST["orderRSPH"]));
            $orderRCYL = mysqli_real_escape_string($conn, trim($_POST["orderRCYL"]));
            $orderRAXIS = mysqli_real_escape_string($conn, trim($_POST["orderRAXIS"]));
            $orderRADD = mysqli_real_escape_string($conn, trim($_POST["orderRADD"]));
            $orderRDIA = mysqli_real_escape_string($conn, trim($_POST["orderRDIA"]));
            $orderRPRISM = mysqli_real_escape_string($conn, trim($_POST["orderRPRISM"]));
            $orderRQTY = mysqli_real_escape_string($conn, trim($_POST["orderRQTY"]));

            $orderLSPH = mysqli_real_escape_string($conn, trim($_POST["orderLSPH"]));
            $orderLCYL = mysqli_real_escape_string($conn, trim($_POST["orderLCYL"]));
            $orderLAXIS = mysqli_real_escape_string($conn, trim($_POST["orderLAXIS"]));
            $orderLADD = mysqli_real_escape_string($conn, trim($_POST["orderLADD"]));
            $orderLDIA = mysqli_real_escape_string($conn, trim($_POST["orderLDIA"]));
            $orderLPRISM = mysqli_real_escape_string($conn, trim($_POST["orderLPRISM"]));
            $orderQTY = mysqli_real_escape_string($conn, trim($_POST["orderLQTY"]));

            $orderHBOX = mysqli_real_escape_string($conn, trim($_POST["orderHBOX"]));
            $orderVBOX = mysqli_real_escape_string($conn, trim($_POST["orderVBOX"]));
            $orderEDBOX = mysqli_real_escape_string($conn, trim($_POST["orderEDBOX"]));
            $orderDBL = mysqli_real_escape_string($conn, trim($_POST["orderDBL"]));
            $orderRSEG = mysqli_real_escape_string($conn, trim($_POST["orderRSEG"]));
            $orderRPD = mysqli_real_escape_string($conn, trim($_POST["orderRPD"]));
            $orderLPD = mysqli_real_escape_string($conn, trim($_POST["orderLPD"]));
            $orderPANTO = mysqli_real_escape_string($conn, trim($_POST["orderPANTO"]));
            $orderZTILT = mysqli_real_escape_string($conn, trim($_POST["orderZTILT"]));
            $orderINSET = mysqli_real_escape_string($conn, trim($_POST["orderINSET"]));

            $orderDesign = mysqli_real_escape_string($conn, trim($_POST["orderDesign"]));
            $orderIndex = mysqli_real_escape_string($conn, trim($_POST["orderIndex"]));
            $orderColor = mysqli_real_escape_string($conn, trim($_POST["orderColor"]));
            $orderCorridor = mysqli_real_escape_string($conn, trim($_POST["orderCorridor"]));
            $orderFrame = mysqli_real_escape_string($conn, trim($_POST["orderFrame"]));
            $orderCoating = mysqli_real_escape_string($conn, trim($_POST["orderCoating"]));
            $orderUV = mysqli_real_escape_string($conn, trim($_POST["orderUV"]));
            $orderTintColor = mysqli_real_escape_string($conn, trim($_POST["orderTintColor"]));
            $orderTintColorDesc = mysqli_real_escape_string($conn, trim($_POST["orderTintColorDesc"]));
            $orderMirror = mysqli_real_escape_string($conn, trim($_POST["orderMirror"]));
            $orderMirrorDesc = mysqli_real_escape_string($conn, trim($_POST["orderMirrorDesc"]));
            $orderMemo = mysqli_real_escape_string($conn, trim($_POST["orderMemo"]));
            $orderQty = mysqli_real_escape_string($conn, trim($_POST["orderQty"]));

            mysqli_begin_transaction($conn);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $memberIdx = $_SESSION["idx"];
            $orderDate = date("Y-m-d H:i:s");
            $insertSql = "INSERT INTO `order`(`name`, `type_idx`, `hbox`, `vbox`, `edbox`, `dbl`, `r_segh`, `r_pd`, `l_pd`, `panto`, `ztilt`, `inset`, `design_idx`, `index_idx`, `color_idx`, `corridor`, `frame`, `coating`, `uv`, `tint_color`, `tint_color_desc`, `mirror`, `mirror_desc`, `memo`, `quntity`, `member_idx`, `order_date`) VALUES('$orderName', '$orderType', '$orderHBOX', '$orderVBOX', '$orderEDBOX', '$orderDBL', '$orderRSEG', '$orderRPD', '$orderLPD', '$orderPANTO', '$orderZTILT', '$orderINSET', '$orderDesign', '$orderIndex', '$orderColor', '$orderCorridor', '$orderFrame', '$orderCoating', '$orderUV', '$orderTintColor', '$orderTintColorDesc', '$orderMirror', '$orderMirrorDesc', '$orderMemo', '$orderQty', '$memberIdx', '$orderDate')";            // echo $insertSql;
            $insertResult = mysqli_query($conn, $insertSql);
            $orderIdx = mysqli_insert_id($conn);

            if ($orderRSPH != "" || $orderRCYL != "" || $orderRAXIS != "" || $orderRADD != "" || $orderRDIA != "" || $orderRPRISM != "" || $orderRQTY != "") {
                $insertOrderRightSpecSql = "INSERT INTO order_lens_spec(`order_idx`, `LR`, `sph`, `cyl`, `axis`, `add`, `dia`, `prism`, `qty`) VALUES('$orderIdx', 'R', '$orderRSPH', '$orderRCYL', '$orderRAXIS', '$orderRADD', '$orderRDIA', '$orderRPRISM', '$orderRQTY')";
                $insertOrderRightSpecResult = mysqli_query($conn, $insertOrderRightSpecSql);
            }

            if ($orderLSPH != "" || $orderLCYL != "" || $orderLAXIS != "" || $orderLADD != "" || $orderLDIA != "" || $orderLPRISM != "" || $orderQTY != "") {
                $insertOrderLeftSpecSql = "INSERT INTO order_lens_spec(`order_idx`, `LR`, `sph`, `cyl`, `axis`, `add`, `dia`, `prism`, `qty`) VALUES('$orderIdx', 'L', '$orderLSPH', '$orderLCYL', '$orderLAXIS', '$orderLADD', '$orderLDIA', '$orderLPRISM', '$orderQTY')";
                $insertOrderLeftSpecResult = mysqli_query($conn, $insertOrderLeftSpecSql);
            }

            if ($insertResult) {
                mysqli_commit($conn);
                echo http_response_code(200);
            } else {
                mysqli_rollback($conn);
                header(trim("HTTP/1.0 500 InternalServerError"));
                exit();
            }
            break;
        case "updateOne":
            break;
        case "selectAll":
            $startDate = isset($_POST["startDate"]) ? trim($_POST["startDate"]) : date("Y-m-d", strtotime("-7 Day")) . " 00:00:00";
            $endDate = isset($_POST["endDate"]) ? trim($_POST["endDate"]) : date("Y-m-d") . " 23:59:59";
            $orderIdx = isset($_POST["orderIdx"]) ? trim($_POST["orderIdx"]) : "";
            $orderState = isset($_POST["orderState"]) ? trim($_POST["orderState"]) : "";
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $memberIdx = $_SESSION['idx'];

            $conditions = array();
            $params = array($memberIdx);
            $types = "s";

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
                $conditions[] = "idx = ?";
                $params[] = $orderIdx;
                $types .= "s";
            }
            
            if (!empty($orderState)) {
                $conditions[] = "state = ?";
                $params[] = $orderState;
                $types .= "s";
            }

            $sql = "SELECT * FROM `order_lens_spec` LEFT JOIN `order` ON `order_lens_spec`.`order_idx` = `order`.`idx` WHERE `order`.`member_idx` = ?";
            if (!empty($conditions)) {
                $sql .= " AND " . implode(" AND ", $conditions);
            }
            $sql .= " ORDER BY order_date DESC";
            $stmt = mysqli_prepare($conn, $sql);
            
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            $sqlResult = mysqli_stmt_get_result($stmt);
            
            $resultArr = array();
            while ($row = mysqli_fetch_array($sqlResult)) {
                $rowArr = array();
                $rowArr['idx'] = $row['idx'];
                $rowArr['name'] = $row['name'];
                $rowArr['LR'] = $row['LR'];
                $rowArr['order_idx'] = $row['order_idx'];
                $rowArr['type_idx'] = $row['type_idx'];
                $rowArr['coating'] = $row['coating'];
                $rowArr['state'] = $row['state'];
                $rowArr['order_date'] = $row['order_date'];
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