<?php
include("../utils/db.php");

$flag = $_POST["flag"];
if (!isset($flag)) {
    echo "{}";
    exit();
}
try {
    switch ($flag) {
        case "selectAllByType":
            $type_idx = $_POST["type_idx"];
            $sql = "SELECT * FROM order_design WHERE type_idx = '$type_idx' ORDER BY sort ASC";
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