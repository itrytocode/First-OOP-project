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
    

    if(isset($_POST['contact']))
    {
        $message = new Message();

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $inputMessage = $_POST['message'];
        
        $message->GetFormData($name, $email, $phone, $subject, $inputMessage);
    }
    else
    {
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
                    <li><a href="index.php?logout=true" class="align-right">Uitloggen</a></li>
                </ul>
            </nav>
            <!-- End Navbar -->

            <div class="margin-top">
            <h1>Contact Form</h1>
            <form method="POST" action="index.php" name="contact">
                <fieldset>
                    <table>
                            <div>
                                <tr>
                                    <p>
                                        <td>Naam:</td> <td><input type="text" name="name" required></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td>Email:</td> <td><input type="text" name="email" required></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td>Telefoon:</td> <td><input type="text" name="phone"required></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td>Onderwerp:</td> <td><input type="text" name="subject" required></td>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <td>Bericht:</td> <td><textarea type="text" name="message" required></textarea></td>
                                    </p>
                                </tr>
                            </div>
                            <div class="wrapper">
                                <tr>
                                    <p>
                                        <td></td><td><button type="submit" name="contact" value="contact" class="button wrapper submit">Versturen</button></td>
                                    </p>
                                </tr>
                            </div>
                    </table>
                </fieldset>
            </form>
        </div>
        </body>
        </html>
<?php
    }
?>
