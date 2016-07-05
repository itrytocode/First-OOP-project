<?php
    require 'classes/Users.php';

    // if the use clicks the logout button
    if (isset($_GET['logout']))
    {
        $connection = new Database();

        $connection->Logout();
    }

    // if the user clicks the button register
    if(isset($_POST['create']))
    {
        // make an instance of Users
        $user = new User();

        $email     = $_POST['email'];
        $password  = password_hash($_POST['password'], PASSWORD_BCRYPT); // same as PASSWORD_DEFAULT
        $firstname = $_POST['fname'];
        $lastname  = $_POST['lname'];

        $user->GetFormData($email, $password, $firstname, $lastname);
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
        <li><a href="register.php?logout=true" class="align-right">Uitloggen</a></li>
    </ul>
</nav>
<!-- End Navbar -->

<div class="margin-top">
    <h1>Aanmelden voor de website</h1>
    <form method="POST" action="register.php" name="registreren">
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
                        <td>Password:</td> <td><input type="password" name="password" required></td>
                        </p>
                    </tr>
                    <tr>
                        <p>
                        <td>Voornaam:</td> <td><input type="text" name="fname" required></td>
                        </p>
                    </tr>
                    <tr>
                        <p>
                        <td>Achternaam:</td> <td><input type="text" name="lname" required></td>
                        </p>
                    </tr>

                </div>
                <div class="wrapper">
                    <tr>
                        <p>
                        <td></td><td><button type="submit" name="create" value="create" class="button wrapper submit">Registreren</button></td>
                        </p>
                    </tr>
                </div>
            </table>
        </fieldset>
    </form>
</div>
</body>
</html>
