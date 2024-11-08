<?php
include("../utils/db.php");

$flag = $_POST["flag"];
if (!isset($flag)) {
    echo "{}";
    exit();
}

try {
    switch ($flag) {
        case "verify":
            $id = mysqli_real_escape_string($conn, $_POST["id"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);

            if (isset($id) && isset($password)) {
                $sql = "SELECT * FROM member WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) === 1) {
                    $member = mysqli_fetch_assoc($result);

                    if (password_verify($password, $member["password"])) {
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        $_SESSION["idx"] = $member["idx"];
                        $_SESSION["id"] = $member["id"];
                        $_SESSION["name"] = $member["name"];
                        $_SESSION["auth"] = $member["auth"];
                        echo json_encode($member);
                        exit();
                    }
                }
            }
            header(trim("HTTP/1.0 401 Unauthorized"));
            break;
        case "signout":
            session_unset();
            session_destroy();
            echo http_response_code(200);
            exit();
            break;
        default:
            header(trim("HTTP/1.0 500 InternalServerError"));
            break;
    }
} catch (Exception $e) {
    header(trim("HTTP/1.0 500 InternalServerError"));
}
