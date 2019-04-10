<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
<h3>Přihlašte si předmět</h3>
<?php
session_start();
include "ovladaci_panel_student.php";
$hlaska = '';
$username =  $_SESSION['login_user'];
$id_ucitele = $_SESSION['student_id'];
$id_predmetu = $_POST['id'];
echo $username. "<br>";
echo $id_ucitele. "<br>";
echo $id_predmetu . "<br>";
$connection = mysqli_connect('localhost', 'root', '', 'databaze');

if(!$connection) {

    die("Database connection failed");

}


/*$query = "SELECT users.username, classes.class, classes.id FROM `users`, attending, classes WHERE attending.id_student= users.id and attending.id_class = classes.id ";
$result = mysqli_query($connection, $query);
if(!$result){

    die('Query FAILED' . mysqli_error());
   
}
$query3 = "SELECT users.id, FROM `users`, attending, classes WHERE username = '$username' ";
$result = mysqli_query($connection, $query3);
if(!$result){

    die('Query FAILED' . mysqli_error());
   
}
$query3 = "SELECT * FROM attending WHERE id_class ='$id_predmetu' LIMIT 1";
        $result3 = mysqli_query($connection, $query3);
        if (mysqli_fetch_row($result3)) {
            $hlaska .= "Předmět už máte přihlášený". '<br>';
        } else {*/
$query2 = "INSERT INTO teaching(id_teacher, id_class) ";
$query2 .=  "VALUES ('$id_ucitele', '$id_predmetu')";
echo $query2;
$result = mysqli_query($connection, $query2);
$hlaska .= "Předmět přidán". '<br>';

        /*}*/
?>

</div>
</div>
    
</body>
</html>