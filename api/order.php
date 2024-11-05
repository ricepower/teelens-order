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
            $insertSql = "INSERT INTO `order`(`name`, `type_idx`, `hbox`, `vbox`, `edbox`, `dbl`, `r_segh`, `r_pd`, `l_pd`, `panto`, `ztilt`, `inset`, `design_idx`, `index_idx`, `color_idx`, `corridor`, `frame`, `coating`, `uv`, `tint_color`, `tint_color_desc`, `mirror`, `mirror_desc`, `memo`, `quantity`, `member_idx`, `order_date`) VALUES('$orderName', '$orderType', '$orderHBOX', '$orderVBOX', '$orderEDBOX', '$orderDBL', '$orderRSEG', '$orderRPD', '$orderLPD', '$orderPANTO', '$orderZTILT', '$orderINSET', '$orderDesign', '$orderIndex', '$orderColor', '$orderCorridor', '$orderFrame', '$orderCoating', '$orderUV', '$orderTintColor', '$orderTintColorDesc', '$orderMirror', '$orderMirrorDesc', '$orderMemo', '$orderQty', '$memberIdx', '$orderDate')";
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
            $orderIdx = mysqli_real_escape_string($conn, trim($_POST["orderIdx"]));
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
            $updateSql = "UPDATE `order` SET 
                `name` = '$orderName', 
                `type_idx` = '$orderType', 
                `hbox` = '$orderHBOX', 
                `vbox` = '$orderVBOX', 
                `edbox` = '$orderEDBOX', 
                `dbl` = '$orderDBL', 
                `r_segh` = '$orderRSEG', 
                `r_pd` = '$orderRPD', 
                `l_pd` = '$orderLPD', 
                `panto` = '$orderPANTO', 
                `ztilt` = '$orderZTILT', 
                `inset` = '$orderINSET', 
                `design_idx` = '$orderDesign', 
                `index_idx` = '$orderIndex', 
                `color_idx` = '$orderColor', 
                `corridor` = '$orderCorridor', 
                `frame` = '$orderFrame', 
                `coating` = '$orderCoating', 
                `uv` = '$orderUV', 
                `tint_color` = '$orderTintColor', 
                `tint_color_desc` = '$orderTintColorDesc', 
                `mirror` = '$orderMirror', 
                `mirror_desc` = '$orderMirrorDesc', 
                `memo` = '$orderMemo', 
                `quantity` = '$orderQty' 
                WHERE `idx` = '$orderIdx'";
            $updateResult = mysqli_query($conn, $updateSql);

            if ($orderRSPH != "" || $orderRCYL != "" || $orderRAXIS != "" || $orderRADD != "" || $orderRDIA != "" || $orderRPRISM != "" || $orderRQTY != "") {
                $deleteOrderRightSpecSql = "DELETE FROM `order_lens_spec` WHERE `order_idx` = '$orderIdx' AND `LR` = 'R'";
                $deleteOrderRightSpecResult = mysqli_query($conn, $deleteOrderRightSpecSql);
                $insertOrderRightSpecSql = "INSERT INTO `order_lens_spec`(`order_idx`, `LR`, `sph`, `cyl`, `axis`, `add`, `dia`, `prism`, `qty`) VALUES('$orderIdx', 'R', '$orderRSPH', '$orderRCYL', '$orderRAXIS', '$orderRADD', '$orderRDIA', '$orderRPRISM', '$orderRQTY')";
                $insertOrderRightSpecResult = mysqli_query($conn, $insertOrderRightSpecSql);
            } else {
                $deleteOrderRightSpecSql = "DELETE FROM `order_lens_spec` WHERE `order_idx` = '$orderIdx' AND `LR` = 'R'";
                $deleteOrderRightSpecResult = mysqli_query($conn, $deleteOrderRightSpecSql);
            }

            if ($orderLSPH != "" || $orderLCYL != "" || $orderLAXIS != "" || $orderLADD != "" || $orderLDIA != "" || $orderLPRISM != "" || $orderQTY != "") {
                $deleteOrderLeftSpecSql = "DELETE FROM `order_lens_spec` WHERE `order_idx` = '$orderIdx' AND `LR` = 'L'";
                $deleteOrderLeftSpecResult = mysqli_query($conn, $deleteOrderLeftSpecSql);
                $insertOrderLeftSpecSql = "INSERT INTO `order_lens_spec`(`order_idx`, `LR`, `sph`, `cyl`, `axis`, `add`, `dia`, `prism`, `qty`) VALUES('$orderIdx', 'L', '$orderLSPH', '$orderLCYL', '$orderLAXIS', '$orderLADD', '$orderLDIA', '$orderLPRISM', '$orderQTY')";
                $insertOrderLeftSpecResult = mysqli_query($conn, $insertOrderLeftSpecSql);  
            } else {
                $deleteOrderLeftSpecSql = "DELETE FROM `order_lens_spec` WHERE `order_idx` = '$orderIdx' AND `LR` = 'L'";
                $deleteOrderLeftSpecResult = mysqli_query($conn, $deleteOrderLeftSpecSql);
            }
            if ($updateResult) {
                mysqli_commit($conn);
                echo http_response_code(200);
            } else {
                mysqli_rollback($conn);
                header(trim("HTTP/1.0 500 InternalServerError"));
                exit();
            }
            break;
        case "selectOne":
            $orderIdx = trim($_POST["orderIdx"]);
            $orderSql = "SELECT * FROM `order` WHERE `idx` = '$orderIdx'";
            $lensSpecSql = "SELECT * FROM `order_lens_spec` WHERE `order_idx` = '$orderIdx'";
            $orderResult = mysqli_query($conn, $orderSql);
            $lensSpecResult = mysqli_query($conn, $lensSpecSql);
            
            $order = mysqli_fetch_assoc($orderResult);
            $lensSpecArr = array();
            while ($row = mysqli_fetch_array($lensSpecResult)) {
                $rowArr['idx'] = $row['idx'];
                $rowArr['order_idx'] = $row['order_idx']; 
                $rowArr['LR'] = $row['LR'];
                $rowArr['sph'] = $row['sph'];
                $rowArr['cyl'] = $row['cyl'];
                $rowArr['axis'] = $row['axis'];
                $rowArr['add'] = $row['add'];
                $rowArr['dia'] = $row['dia'];
                $rowArr['prism'] = $row['prism'];
                $rowArr['qty'] = $row['qty'];
                array_push($lensSpecArr, $rowArr);
            }
            $order["lens_spec"] = $lensSpecArr;
            echo json_encode($order);
            exit();
            break;
        case "selectOrderListBy":
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
                $conditions[] = "`order`.`idx` = ?";
                $params[] = $orderIdx;
                $types .= "i";
            }
            
            if (!empty($orderState)) {
                $conditions[] = "state = ?";
                $params[] = $orderState;
                $types .= "s";
            }

            // $sql = "SELECT `order_lens_spec`.*, `order`.*, `order_type`.`name` AS `type_name` FROM `order_lens_spec` 
            //     LEFT JOIN `order` ON `order_lens_spec`.`order_idx` = `order`.`idx`
            //     LEFT JOIN `order_type` ON `order`.`type_idx` = `order_type`.`idx`
            //     WHERE `order`.`member_idx` = ?";

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
                LEFT JOIN `order_type` ON `order`.`type_idx` = `order_type`.`idx`
                WHERE `order`.`member_idx` = ?";

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