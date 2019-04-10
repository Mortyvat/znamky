    <?php 

$username = '';
$username =  $_SESSION['login_user'];

$connection = mysqli_connect('localhost', 'root', '', 'databaze');

if(!$connection) {

    die("Database connection failed");

} 

$query = "SELECT users.username, classes.class, classes.id FROM `users`, attending, classes WHERE users.username = '$username' and attending.id_student= users.id and attending.id_class = classes.id ";

$result = mysqli_query($connection, $query);

if(!$result){

die('Query FAILED' . mysqli_error($connection));
}

?>
<div class="moje_predmety">
<h2>Moje předměty</h2>

<?php

while($row = mysqli_fetch_array($result)) {
    $id = $row[2];
    $class = $row[1];
    echo "<li><a href='predmetek.php?id=$id'>$class</a><li><br>";
}
?>
</div>