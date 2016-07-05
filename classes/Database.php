<?php
    class Database
    {
        public function GetConnection()
        {
            $user = "root"; // username
            $pass = "Welkom01"; // password

            try
            {
                $dbh = new PDO("mysql:host=localhost;dbname=contact",$user,$pass);
                return $dbh;
            }
            catch (PDOException $e)
            {
                // show the error message
                print_r($e);
                die();
            }
        }

        public function Logout()
        {
//          // start/going on session
//          session_start();

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            else {
                // remove all the sessions variables
                session_unset();
            }


          // destroy the session
          session_destroy();

          // header back to login screen
          echo 'U bent succesvol uitgelogd.';
          header("refresh: 5;url=../login.php" );

        }
    }
?>