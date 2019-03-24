<?php
session_start();
$hlaska = '';

if(isset($_SESSION['login_user'])){

    $hlaska = "AHOJ ". $_SESSION['login_user'].'<br>';

    }   

if(isset($_POST['login'])){

    $username= $_POST['username'];
    $password= $_POST['password'];
    $id2 = NULL;
    $connection = mysqli_connect('localhost', 'root', '', 'databaze');

if($connection) {

    $hlaska .= 'Připojeno k databázi'. '<br>';
    $query = "SELECT * FROM users WHERE username ='$username'and password = '$password' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (mysqli_fetch_row($result)) {

        $session =  $_SESSION['login_user']= $username;
        
        $hlaska .= "Přihlašovací údaje existují". '<br>';
        $hlaska .= "Ahoj ". $session. '<br>';
        echo "<script>location.href='welcome.php'</script>";
    
    if(!$result){

        die('Query FAILED' . mysqli_error($connection));

        }
} else {

    $hlaska .= "Přihlašovací údaje neexistují". '<br>';
    
    }


} else {

    $hlaska = 'Připojení k databázi selhalo';
    die("Database connection failed");

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

<h3>Prihlasovani</h3> 


<form action="prihlasovani.php" method="post">
        <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name= "password" class="form-control">
        </div>
        <input class ="btn btn-primary" type="submit" name="login" value="Submit">
        <?php
        echo $hlaska;
        
        ?>
        </form>
        


</form>

</div>
</div>
    
</body>
</html>