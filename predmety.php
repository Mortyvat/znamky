<h3>Vaše předměty</h3>
<?php

$connection = mysqli_connect('localhost', 'root', '', 'databaze');

if(!$connection) {

    die("Database connection failed");

}

$query = "SELECT * FROM classes";

$result = mysqli_query($connection, $query);

if(!$result){

    die('Query FAILED' . mysqli_error());
   
}
while($row = mysqli_fetch_array($result)) {
    print_r($row[1]);
    echo '<br>';
}

?>