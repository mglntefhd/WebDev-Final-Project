<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/connect.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();

    if ($user) {
       if ( $_POST["password"] == $user["password"]){

        session_start();

        $_SESSION["user_id"] = $user["id"];

        header("Location: homeP.html");

       } 
    }

    
}
?>
