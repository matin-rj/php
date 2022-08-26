<?php

    class error_check{
        public $input_error=false;

        function __construct($user , $pass){
            if(empty($user)){
                echo "<p><b>please enter your username</b></p>";
                $this->input_error=true;
            }

            if(empty($pass)){
                echo "<p><b>please enter your password</b></p>";
                $this->input_error=true;
            }
        } 
    }

    class log{
//____ connect to database

        private $mysql;
        function __construct($db_host , $db_user , $db_pass , $db_name){
            $this->mysql=new mysqli($db_host , $db_user , $db_pass , $db_name);
            if($this->mysql->connect_error)
                die("connection error!!");
        }

//____ check user and password to Allow to enter

        function data_check($tbl , $user , $pass , $user_field , $pass_field , $check){
            $sql="SELECT * FROM $tbl WHERE $user_field='$user' AND $pass_field='$pass'";
            $result=$this->mysql->query($sql);
            $this->mysql->close();
            if($result->num_rows!=0){
                $_SESSION['user']=$user;
                $_SESSION['pass']=$pass;

                if($check===true and !isset($_COOKIE['user'])){
                    setcookie("user" , $user , time()+60,'/');
                }
                else if($_COOKIE['user']!=$user){
                    setcookie("user" , $user , time()+60,'/');
                } 
                header("location:index.php");
            }
            else{
                echo "<p><b>wrong username or password</b></p>";
            }   
        }

//____ Checking the username for non-duplication
        function duplicate_username($user_field , $pass_field , $tbl , $user , $pass){
            $user=mysqli_real_escape_string($this->mysql,$user);
            $sql="SELECT $user_field FROM $tbl WHERE $user_field='$user'";
            $result= $this->mysql->query($sql);
            if($result->num_rows!=0){
                echo "<b>This username has already been chosen !!!</b><br><p><b> please choose another &#9940;</b></p>";
            }
            else{
                $this->insert($user_field , $pass_field , $tbl , $user , $pass);
            }
        }

//____ Save data
        function insert($user_field , $pass_field , $tbl , $user , $pass){
            $sql="INSERT INTO $tbl($user_field , $pass_field)
            VALUE('$user' , '$pass')";
            $result= $this->mysql->query($sql);
            if($result===true){
                $_SESSION['user']=$user;
                $_SESSION['pass']=$pass;
                echo "<p style='color:darkgreen;background-color: #c1ffb0;padding:7px; font-weight:bold;border: 2px solid darkgreen;'>Your account has been created successfully&#9989;</p>";
                header("refresh:1;url=index.php");
            }

        }
    }


?>