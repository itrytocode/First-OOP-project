<?php
    session_start();
    require "classes/Authentication.php";

    if(isset($_SESSION['id']))
    {
        header('Location: account.php');
    }
    

    if(isset($_POST['Login']))
    {
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $authenticate = new Authenticate();

        $authenticate->GetFormData($email, $password);
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

<h1>Login screen</h1>
<form method="POST" action="login.php" name="contact">
    <fieldset>
        <table>
            <div>
                <tr>
                    <p>
                        <td>E-mailadres:</td> <td><input type="text" name="email" required></td>
                    </p>
                </tr>
                <tr>
                    <p>
                        <td>Wachtwoord:</td> <td><input type="password" name="password" required></td>
                    </p>
                </tr>



            </div>
            <div class="wrapper">
                <tr>
                    <p>
                        <td></td><td><button type="submit" name="Login" value="login" class="button wrapper submit">Inloggen</button></td>
                    </p>
                </tr>
            </div>
        </table>
        <p>
            Nog geen account <a href="register.php" class="register">registreer</a> hier!
        </p>
    </fieldset>
</form>
</body>
</html>
