<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../include/header.php"; ?>
    <link href = "../include/header.css" rel = "stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../css/bootstrap.min.css" rel = "stylesheet">
    <script src = "../js/bootstrap.bundle.min.js"></script>
    <link href="../bootstrap-icons" rel="stylesheet">
    <link rel = "stylesheet" href = "styleLogin.css">
    <title>LogIn</title>
</head>
<body class = "body">
    <div class="card">
        <img src = "../include/b2.jpg">
        <form class = "form-container" method = "post" action = "../code.php">
            <h1>Log In</h1>
            <input type = "email" name = "user_mail" placeholder = "Email" required>
            <input type = "password" name = "user_pass" id = "user_pass" placeholder = "Password" required>
            <button type = "submit" name = "user_login_btn" class = "btn btn-primary">Log In</button>
        </form>
    </div>
</body>
</html>