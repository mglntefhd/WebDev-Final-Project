<?php

$is_success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/connect.php";

    $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";

    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)){
        die("SQL error: ". $mysqli->error);
    }

    $stmt->bind_param("sss",
                        $_POST["name"],
                        $_POST["email"],
                        $_POST["password"]);

    if ($stmt->execute()){
        $is_success = true;
        header ("location: login.html");
    }
    else{
        die($mssqli->error. " " . $mysqli->errno);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="login.css">
    <script src="script.js"></script>
</head>
<body>
<div class="background">
    <form class="login-container register-container" id="signup" onsubmit="check()" method="post">
        <h1>REGISTER</h1>
        <input type="text" name="name" id="username2" autocomplete="off" placeholder="Full Name">
        <input type="text" name="email" id="Last Name" autocomplete="off" placeholder="Email">
        <input type="password" name="password" id="password2" autocomplete="off" placeholder="Password">
        <input type="password" id="password2" autocomplete="off" placeholder="Confirm Password">
        <button>Sign Up</button>
        <a href="login.html" class="link">Already Have An Account? Log In Here</a>
    </form>
</div>
</body>
</html>