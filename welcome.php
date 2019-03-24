<?php

session_start();
$hlaska = '<br>'.'Připojeno k databázi'. '<br>';
$username = $_SESSION['login_user'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $connection = mysqli_connect('localhost', 'root', '', 'databaze');
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        if($row['access']==1){
        echo "<h3>Vitejte Pane učiteli ".$row['access']."</h3> ";
        } else {
            echo "<h3>Vitejte studente </h3>";
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
            <li><a href="index.php">INDEX</a></li>
            <li><a href="registrace.php">REGISTRACE</a></li>
            <li><a href="prihlasovani.php">PRIHLASOVANI</a></li>
</ul>
        <?php
        

        //if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo "AHOJ ". $_SESSION['login_user'];
        /*}
        else 
        echo "nope".implode(" ",$_SESSION);*/
?>

</div>
</div>
    
</body>
</html>