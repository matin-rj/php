<?php
    session_start();
    include "log.php";

    $user_login=false;
    $username="";
    if(isset($_SESSION['user_login'])){
        $user_login=true;
        $username=$_SESSION['fname'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />

    <title>Document</title>
</head>
<body>
    <header>
       <?php include "header.php"?>
    </header>
    
    <div class="h1">
            <h1>WELCOME TO BOOK CITY</h1>
     </div> 


    
   
 
</body>
</html>