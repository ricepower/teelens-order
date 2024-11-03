<?php
include("../db.php");

$flag = $_POST["flag"];
if (!isset($flag)) {
    echo "{}";
    exit();
}
try {
    switch ($flag) {
        case "selectAllByIndex":
            $index_idx = $_POST["index_idx"];
            $sql = "SELECT * FROM order_color WHERE index_idx = '$index_idx' ORDER BY sort ASC";
            $fetch = mysqli_query($conn, $sql);

            $resultArr = array();
            while ($row = mysqli_fetch_array($fetch)) {
                $rowArr['idx'] = $row['idx'];
                $rowArr['index_idx'] = $row['index_idx'];
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