<h3>Předměty k přihlášení</h3>
<?php
session_start();
$username =  $_SESSION['login_user'];
$connection = mysqli_connect('localhost', 'root', '', 'databaze');

if(!$connection) {

    die("Database connection failed");

}

$query = "SELECT * FROM classes";
$query2 = "SELECT users.username, classes.class, classes.id FROM `users`, attending, classes WHERE users.username = '$username' and attending.id_student= users.id and attending.id_class = classes.id ";
$result = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query2);
if(!$result){

    die('Query FAILED' . mysqli_error());
   
}

while($row = mysqli_fetch_array($result)) {

        $row2 = mysqli_fetch_array($result2);

        if(!($row[0]==$row2[2])){

        echo $row[1];
        echo '<br>';
        }

    
}

?>