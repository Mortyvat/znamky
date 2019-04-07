<?php
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
include "db.php";
$id = $_GET;
$id_predmetu = $id['id'];
echo $id_predmetu."<br>";
$query = "SELECT users.username, classes.class, znamky.date, znamky.mark FROM `users`, znamky, classes WHERE  znamky.id_student= users.id and znamky.id_class = classes.id and classes.id='$id_predmetu' ";
$result = mysqli_query($connection, $query);
array($result);
if(!$result){
    die('Query FAILED' . mysqli_error());
}
while($row = mysqli_fetch_array($result)) {
    echo "Student ". $row[0]. " dostal ". $row[2] . " ". $row[1] . ' známku ' . $row[3] . '<br>';
}
?>