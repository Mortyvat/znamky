<?php 
$username = '';
//$username =  $_SESSION['login_user'];
$connection = mysqli_connect('localhost', 'root', '', 'databaze');
if(!$connection) {
    die("Database connection failed");
} 
$query = "SELECT users.username, classes.class FROM `users`, attending, classes WHERE  attending.id_student= users.id and attending.id_class = classes.id  ";
$result = mysqli_query($connection, $query);
if(!$result){
die('Query FAILED' . mysqli_error($connection));
}
?>

<div style="background-color:blue;">
<h5>Studenti příhlášení na předměty</h5> 

<?php
if(!$result){
    die('Query FAILED' . mysqli_error());
   
}
while($row = mysqli_fetch_array($result)) {
    echo $row[1] .' '.$row[0].'<br>';
    
}
//$query = "SELECT users.username, classes.class, znamky.date, znamky.mark FROM `users`, znamky, classes WHERE  znamky.id_student= users.id and znamky.id_class = classes.id  ";

?>
</div>