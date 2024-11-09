<?php
include("../utils/db.php");

$flag = $_POST["flag"];
if (!isset($flag)) {
    echo "{}";
    exit();
}
try {
    switch ($flag) {
        case "selectAllByTypeAndDesign":
            $type_idx = $_POST["type_idx"];
            $design_idx = isset($_POST["design_idx"]) ? $_POST["design_idx"] : null;
            
            $sql = "SELECT * FROM order_index WHERE type_idx = '$type_idx'";
            if ($design_idx) {
                $sql .= " AND design_idx = '$design_idx'";
            }
            $sql .= " ORDER BY sort ASC";
            
            $fetch = mysqli_query($conn, $sql);

            $resultArr = array();
            while ($row = mysqli_fetch_array($fetch)) {
                $rowArr['idx'] = $row['idx'];
                $rowArr['type_idx'] = $row['type_idx'];
                $rowArr['name'] = $row['name'];
                $rowArr['sort'] = $row['sort'];
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