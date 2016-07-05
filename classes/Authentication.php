<?php
ob_start();

require 'classes/Database.php';

class Authenticate
{
    public function __construct()
    {

    }

    // retrieve the form data
    public function GetFormData($email, $password)
    {
        $this->Authentication($email, $password);
    }

    public function Authentication($email, $password)
    {
        // make a new instance
        $database = new Database();
        // get the connection variable
        $dbh = $database->GetConnection();

        if(isset($dbh))
        {
            // make the query
            $query = "SELECT userID, password FROM users WHERE email=:email";
            // prepare the query
            $stmt = $dbh->prepare($query);
            // bind the value to the statement
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            // execute the statement
            $stmt->execute();

            $returnedLine = $stmt->rowCount();

            $this->Authenticate($returnedLine, $password, $stmt);
        }
        else
        {
            // if there couldn't be created an connection
            echo 'Er kon geen verbinding worden gemaakt met de database.';
        }
    }

    // password check
    private function Authenticate($returnedLine, $password, $stmt)
    {
        // check if the query returned a user
        if($returnedLine === 1)
        {
            // get the values associated with the loggedin user
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // check if the password is right
            if(password_verify($password, $result['password']))
            {
                $_SESSION['id'] = $result['userID'];
                echo '<div class="message-top">';
                echo 'You are succesfully logged in!';
                echo '<div>';
                header('Location: account.php');
            }
            // if something went wrong
            else
            {
                echo 'Er is een verkeerd gebruikersnaam en/of wachtwoord ingevuld. Probeer het nog eens.';
            }
        }
        // if something went wrong
        else
        {
            echo 'Er is een verkeerd gebruikersnaam en/of wachtwoord ingevuld. Probeer het nog eens.';
        }
    }

}