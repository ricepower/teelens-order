<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/signin-style.css">
    <title>TEE LENS Order</title>
</head>

<body>
    <div class="container">
        <div class="form-container sign-in">
            <form id="signinForm" name="signinForm" action="signin-process.php" method="post">
                <h1>Sign In</h1>
                <span>Use your ID or Email</span>
                <br />
                <input type="text" id="id" name="id" placeholder="ID or Email" value="admin">
                <input type="password" id="password" name="password" placeholder="Password" value="1234">
                <p id="errorMsg" style="color: #f25961 !important; margin: 0; display: none;">Please enter ID or Password</p>
                <a href="#">Forget Your Password? 아이디 기억하기 넣기</a>
                <button type="button">Sign In</button>
            </form>
        </div>
        <div class="logo-container">
            <div class="logo">
                <div class="logo-panel logo-right">
                    <div class="logo-img">
                        <img src="assets/img/logo.png" />
                    </div>
                    <h1>TEE LENS</h1>
                    <p>teelens.order 방문을 환영한다잉</p>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("button").click(function(e) {
                let id = $("#id").val();
                let password = $("#password").val();

                if (!id || !password) {
                    $("#errorMsg").show();
                    return false;
                }

                $.ajax({
                    type: "post",
                    url: "api/auth.php",
                    dataType: "json",
                    data: {
                        flag: "verify",
                        id: id,
                        password: password,
                    },
                    success: function(result) {
                        location.href = "order.php";
                    },
                    error: function(result, status, error) {
                        $("#errorMsg").text("Fail to signin. Please confirm your ID or Password.");
                        $("#errorMsg").show();
                    }
                });
            });
        });
    </script>
    <?php
    echo var_dump($_SESSION) . "<br/>";
    echo var_dump(isset($_SESSION)) . "<br/>";
    echo var_dump(empty($_SESSION)) . "<br/>";
    echo var_dump(session_status()) . "<br/>";
    echo var_dump(PHP_SESSION_DISABLED) . "<br/>";
    echo var_dump(PHP_SESSION_NONE) . "<br/>";
    echo var_dump(PHP_SESSION_ACTIVE) . "<br/>";
    ?>
</body>

</html>