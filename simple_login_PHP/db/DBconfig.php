<?php

require "DB.php";

class databaseaction {
    //create connection with database
    public function connection()
    {   
        $dbinfo = new database();
        return mysqli_connect($dbinfo->servername,$dbinfo->admin,$dbinfo->password,$dbinfo->databasename);
    }

    public $message;
    //insert in the correct column table data from user
    public function registerdata($email, $password)
    {
        if(!empty($email) && !empty($password)){
            $connect = $this->connection();
            if($connect){
                $checkemail = mysqli_query($connect,"SELECT * FROM registrate WHERE email = '$email'");
                if(mysqli_num_rows($checkemail) != 0){
                    $this->message = '<div class="alert alert-danger mt-4" role="alert">Utente già registrato</div>';
                }else{
                $hashpassword = password_hash($password, PASSWORD_BCRYPT);
                $registerquery = "INSERT INTO registrate (email,password) VALUES ('{$email}','{$hashpassword}')";
                $register = mysqli_query($connect, $registerquery);
                $this->message = '<div class="alert alert-success mt-4" role="alert">Registration successful</div>';
                header('refresh:2, login.php');
                return $register;
                
                }
            }else{
                $this->message = '<div class="alert alert-danger mt-4" role="alert">Database connection error</div>';
            }
        }else{
            $this->message = '<div class="alert alert-danger mt-4" role="alert">Sorry, did you fill in the fields?</div>';
        }
        mysqli_close($connect);
    }
    //check if the email and the hashed password is correct
    public function login($email, $password)
    {
        $connect = $this->connection();
        if(!empty($email) && !empty($password)){
            $searchemail = mysqli_query($this->connection(), "SELECT email FROM registrate WHERE email = '$email'");
            $searchpassword = mysqli_query($this->connection(), "SELECT password FROM registrate WHERE email = '$email'");
            $extpassword = mysqli_fetch_array($searchpassword)['password'];
            if (mysqli_num_rows($searchemail) && password_verify($password, $extpassword)){
                $this->message = '<div class="alert alert-success mt-4" role="alert">Access confirmed</div>';
                header('refresh:2, ../restrict-area/index.php');
            }else{
                $this->message = '<div class="alert alert-danger mt-4" role="alert">Wrong Email or password</div>';
            }
        }else{
            $this->message = '<div class="alert alert-danger mt-4" role="alert">Sorry, did you fill in the fields?</div>';
        }
        mysqli_close($connect);
    }
}

?>