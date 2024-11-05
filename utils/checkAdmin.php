<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["auth"] !== "0") {
    header("location: ../../signin.php");
}
?>