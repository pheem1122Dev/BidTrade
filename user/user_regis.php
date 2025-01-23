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
    <link rel = "stylesheet" href = "styleRegis.css">
    <title>Register</title>
</head>
<body class = "body">
    <div class="card">
        <form class = "form-container" method = "post" action = "../code.php">
            <h1>Register</h1>
            <input type = "text" name = "username" placeholder = "Username" required>
            <input type = "number" name = "user_phone" placeholder = "Phone Number" required>
            <input type = "email" name = "user_mail" placeholder = "Email" required>
            <input type = "password" name = "user_pass" placeholder = "Password" required>
            <input type = "password" name = "user_confirm_pass" placeholder = "Confirm Password" required>
            <button type = "submit" name = "user_regis_btn" class = "btn btn-warning">Register</button>
        </form>
        <img src = "../include/b2.jpg">
    </div>
</body>
</html>