<?php 
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
                <input type="text" id="id" name="id" placeholder="ID or Email">
                <input type="password" id="password" name="password" placeholder="Password">
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
                } else {
                    $("form").submit();
                }
            });
        });
    </script>
    <?php 
    var_dump($_SESSION);
    var_dump(isset($_SESSION));
    var_dump(empty($_SESSION));
    ?>
</body>

</html>