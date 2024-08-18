<?php

include("db.php");

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if (isset($id) && isset($password)) {
    $sql = "SELECT * FROM member WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $member = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $member["password"])) {
            if (empty($_SESSION)) {
                echo "ddd";
                session_start();
                $_SESSION["id"] = $member["id"];
                $_SESSION["name"] = $member["name"];
                $_SESSION["auth"] = $member["auth"];

                echo "id: ".$_SESSION["id"]."<br/>";
                echo "name: ".$_SESSION["name"]."<br/>";
                echo "auth: ".$_SESSION["auth"]."<br/>";
            }
            header("location: starter-template-sample.php");
        }
    }
}
echo "<script>history.back();</script>";

?>

