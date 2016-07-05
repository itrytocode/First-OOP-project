<?php
require "classes/Database.php";


    class User
    {
        // recieve the user input
        public function GetFormData($email, $password, $firstname, $lastname)
        {
            $this->CreateUser($email, $password, $firstname, $lastname);
        }

        public function CreateUser($email, $password, $firstname, $lastname)
        {
            try
            {
                // make a new instance
                $database = new Database();
                // get the connection variable
                $dbh = $database->GetConnection();

                $null = null;

                // make the query
                $query = "INSERT INTO users(userID, email, password, firstname, lastname) 
                          VALUES (:userID, :email, :password, :firstname, :lastname)";
                // prepare the query
                $stmt = $dbh->prepare($query);
                // bind the value to the statement
                $stmt->bindParam(':userID', $null);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                // execute the statement
                $stmt->execute();

                // message if it succeeds
                echo "The user is created successfully!";
            }
            catch(PDOException $ex)
            {
                echo $ex;
            }
        }
    }
?>