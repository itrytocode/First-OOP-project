<?php
    session_start();

    require 'classes/Messages.php';
    require "classes/Database.php";


    // look if the session is set(if the is user has logged in)
    if(!isset($_SESSION['id']))
    {
        $message = new Message();
    
        $message->NotLoggedIn();
    }

    // if the use clicks the logout button
    if (isset($_GET['logout']))
    {
        $connection = new Database();

        $connection->Logout();
    }

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Contact Form:</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar">
    <ul>
        <li><a href="login.php">Inloggen</a></li>
        <li><a href="register.php">Registreren</a></li>
        <li><a href="index.php">Contact</a></li>
        <li><a href="userlist.php?logout=true" class="align-right">Uitloggen</a></li>
    </ul>


</nav>
<!-- End Navbar -->

<div class="margin-top">
    <h1>Gebruikers lijst</h1>
    

</div>
</body>
</html>