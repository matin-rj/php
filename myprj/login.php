<?php
    session_start();
    include "log.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        html,
        body {
            height: 100%;
        }
        body {
            background:pink;
            color: #fff;
            font-size: 1.5em;
            font-weight: 400;
            text-align: right;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        .main {
            position: relative;
            background: #ffffff;
            color: #0e5698;
            display: inline-block;
            padding: 15px 30px;
            margin: 0 auto;
            border-radius: 7px;
            box-shadow: 0 50px 50px rgba(0, 0, 0, 0.2);
            min-height: 250px;
            min-width: 400px;
        }
        h1 {
            font: 30px sans-serif;
            text-align: center;
            margin: 25px 10px;
            font-weight: bold;
            color: #4a96db;
        }
        input,
        button,
        select,
        textarea {
            display: block;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-top: 10px;
            line-height: 28px;
            height: 30px;
            padding: 0 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: sans-serif;
            font-size: 15px;
        }
        button {
            background: #007bec;
            color: #fff;
            line-height: 40px;
            height: 40px;
            font-size: 18px;
            border: 0;
        }
        button:hover {
            opacity: 0.7;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="error-show">

     
    </div>

    <div class='main'>

        <?php 
        if(isset($_POST['submit'])){

        //____________ error check
           
            $input_check=new error_check($_POST['user'] , $_POST['pass']);
    
        //____________ connect to database
            if($input_check->input_error==false){
    
                $my_DB=new log("localhost" , "root" , "" , "commerce1");
    
        //____________ check user & password in data base
    
                $table_name="user";
                $user=$_POST['user'];
                $pass=md5($_POST['pass']);
                $username_field="user";
                $password_field="pass";

                $check=false;
                if(isset($_POST['remember']))
                    $check=true;
    
                $my_DB->data_check($table_name , $user , $pass , $username_field , $password_field , $check);
                    
            } 
        }
        ?>
        <h1>LOGIN</h1>
        <form action="#" method="post">
            <input type="text" name="user" placeholder="username">
            <input type="password" name="pass" placeholder="password">
            <input type="submit" name="submit">
        </form> 
    </div>

</body>
</html>