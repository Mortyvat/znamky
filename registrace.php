<?php
session_start();
$hlaska = '<br>'.'Připojeno k databázi'. '<br>';
if(isset($_POST['register'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $password2 = $_POST['password2'];

    if(!($password==$password2)){
        $hlaska .= 'Hesla se neshodují'. '<br>';

    }
    else
    {
        $hlaska .= "Hesla se shodují". '<br>';
        $connection = mysqli_connect('localhost', 'root', '', 'databaze');

        if($connection) {

        } else {
            $hlaska = 'Připojení k databázi selhalo';
            die("Database connection failed");
        }
        $query2 = "SELECT * FROM users WHERE username ='$username' LIMIT 1";
        $result2 = mysqli_query($connection, $query2);
        if (mysqli_fetch_row($result2)) {
            $hlaska .= "Přihlašovací jméno existuje". '<br>';
        } else {
                $query = "INSERT INTO users(username, password) ";
                $query .=  "VALUES ('$username', '$password')";
        
                $result = mysqli_query($connection, $query);
                $hlaska .= "Účet vytvořen". '<br>';
                if(!$result){

                die('Query FAILED' . mysqli_error($connection));
                
            }
        
        }
        
        
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
 

 
<div class="container">
<div class="col-sm-6">

<ul>
            <li><a href="index.php">HOME</a></li>
</ul>

<h3>Registrace</h3> 


<form action="registrace.php" method="post">
        <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name= "password" class="form-control">
        </div>
        <div class="form-group">
        <label for="password2">Password2</label>
        <input type="password" name= "password2" class="form-control">
        </div>
        <input class ="btn btn-primary" type="submit" name="register" value="Submit">
        <?php 
        echo $hlaska;

        ?>
        


</form>

</div>
</div>


</body>
</html>