<h3>Přihlašte si předmět</h3>
<?php
session_start();
$hlaska = '';
$username =  $_SESSION['login_user'];
$id_studenta = $_SESSION['student_id'];
$id_predmetu = $_POST['id'];
echo $username. "<br>";
echo $id_studenta. "<br>";
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
   
}*/
$query2 = "INSERT INTO attending(id_student, id_class) ";
$query2 .=  "VALUES ('$id_studenta', '$id_predmetu')";
$result = mysqli_query($connection, $query2);
$hlaska .= "Předmět přidán". '<br>';
echo "<li><a href='index.php'>Index</a></li><br>";
echo "<li><a href='classes_to_get.php'>Přihlásit předmět</a></li>";

?>
