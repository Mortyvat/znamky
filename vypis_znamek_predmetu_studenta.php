
<?php 

$username = '';
$username =  $_SESSION['login_user'];

$connection = mysqli_connect('localhost', 'root', '', 'databaze');

if(!$connection) {

    die("Database connection failed");

} 

$query = "SELECT users.username, classes.class, znamky.date, znamky.mark FROM `users`, znamky, classes WHERE username = '$username' and znamky.id_student= users.id and znamky.id_class = classes.id ";

$result = mysqli_query($connection, $query);

if(!$result){

die('Query FAILED' . mysqli_error($connection));
}

?>
<div class="znamky">
<h5>Tvoje známky</h5>

<?php

while($row = mysqli_fetch_array($result)) {
    echo $row[2] . " ". $row[1] . ' známka ' . $row[3] . '<br>';
}
?>
</div>

