
<?php 
session_start();
$username = '';
$username =  $_SESSION['login_user'];

$connection = mysqli_connect('localhost', 'root', '', 'databaze');

if(!$connection) {

    die("Database connection failed");

} 

$query = "SELECT users.username, classes.class FROM `users`, attending, classes WHERE users.username = '$username' and attending.id_student= users.id and attending.id_class = classes.id ";

$result = mysqli_query($connection, $query);

if(!$result){

die('Query FAILED' . mysqli_error($connection));
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

<?php

while($row = mysqli_fetch_assoc($result)) {
    print_r($row);
?>
<pre>
<?php

?>
</pre>
<?php
}


?>

   

</div>
</div>
    
</body>
</html>