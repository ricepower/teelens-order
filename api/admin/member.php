<?php
include("../../checkAdmin.php");
include("../../db.php");

$flag = $_POST["flag"];
if (!isset($flag)) {
    echo "{}";
    exit();
}
try {
    switch ($flag) {
        case "selectOne":
            $id = $_POST["id"];
            $sql = "SELECT * FROM member WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $member = mysqli_fetch_assoc($result);
                unset($member["password"]);
                echo json_encode($member);
            } else {
                echo "{}";
            }
            break;
        case "selectAll":
            $sql = "SELECT * FROM member";
            $fetch = mysqli_query($conn, $sql);

            $resultArr = array();
            while ($row = mysqli_fetch_array($fetch)) {
                $rowArr['idx'] = $row['idx'];
                $rowArr['id'] = $row['id'];
                $rowArr['name'] = $row['name'];
                $rowArr['authority'] = $row['auth'];
                $rowArr['email'] = $row['email'];
                $rowArr['company'] = $row['company'];
                $rowArr['memo'] = $row['memo'];
                array_push($resultArr, $rowArr);
            }
            $aa['data'] = $resultArr;
            echo json_encode($aa);
            break;
        case "createOne":
            $id = mysqli_real_escape_string($conn, trim($_POST["id"]));
            $password = mysqli_real_escape_string($conn, trim($_POST["password"]));
            $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
            $authority = mysqli_real_escape_string($conn, trim($_POST["authority"]));
            $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
            $company = mysqli_real_escape_string($conn, trim($_POST["company"]));
            $memo = mysqli_real_escape_string($conn, trim($_POST["memo"]));

            $sql = "SELECT * FROM member WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                header(trim("HTTP/1.0 400 Existing user"));
                break;
            }

            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insertSql = "INSERT INTO member VALUES('', '$id', '$hash', '$name', '$authority', '$email', '$company', '$memo')";
            $insertResult = mysqli_query($conn, $insertSql);

            if ($insertResult) {
                echo http_response_code(200);
            } else {
                header(trim("HTTP/1.0 500 InternalServerError"));
            }
            break;
        case "updateOne":
            $id = mysqli_real_escape_string($conn, trim($_POST["id"]));
            $password = mysqli_real_escape_string($conn, trim($_POST["password"]));
            $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
            $authority = mysqli_real_escape_string($conn, trim($_POST["authority"]));
            $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
            $company = mysqli_real_escape_string($conn, trim($_POST["company"]));
            $memo = mysqli_real_escape_string($conn, trim($_POST["memo"]));

            $updateSql = "";
            if (!empty($password)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $updateSql = "UPDATE member SET password = '$hash', name = '$name', auth = '$authority', email = '$email', company = '$company', memo = '$memo' WHERE id = '$id'";
            } else {
                $updateSql = "UPDATE member SET name = '$name', auth = '$authority', email = '$email', company = '$company', memo = '$memo' WHERE id = '$id'";
            }
            
            $updateresult = mysqli_query($conn, $updateSql);

            if ($updateresult) {
                echo http_response_code(200);
            } else {
                header(trim("HTTP/1.0 500 InternalServerError"));
            }
            break;
        default:
            header(trim("HTTP/1.0 500 InternalServerError"));
            break;
    }
} catch (Exception $e) {
    header(trim("HTTP/1.0 500 InternalServerError"));
}
?>