<?php
if ($_SESSION["auth"] !== "0") {
    header("location: signin.php");
}
?>