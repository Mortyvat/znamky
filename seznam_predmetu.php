<?php 
include "db.php";

session_start();
if(isset($_SESSION['login_user'])){
    $username = $_SESSION['login_user'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $connection = mysqli_connect('localhost', 'root', '', 'databaze');
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        if($row['access']==2){
        } elseif($row['access']==1){
            header("location: index.php");
        } else {
            header("location: index.php");
        }
        
    }        
} else {
    header("location: index.php");   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bubu.css">
</head>
<body>
    
<div class="container">
<h2>Předměty k přihlášení</h2>
<?php include "ovladaci_panel_student.php" ?>
    <br>   
    <form method="GET" action="predmetek.php">
    <div class="seznam_predmetu">
    <?php
    //Vypíše všechny předměty

    $query = "SELECT * FROM classes";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());

    }
    while($row = mysqli_fetch_array($result)) {
        $id = $row[1];
        $username = $row[0];
        //echo $row[1] .' '.$row[0].'<br>';
        //header("location: predmet.php?id='$row[0]'");
        echo "<li><a href='predmetek.php?id=$username'>$id</a><li>";
    }
    ?>
    </div>
    </form>
</body>
</html>