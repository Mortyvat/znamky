<?php include "db.php";?>
<?php include "functions.php";?>
<h3>Předměty k přihlášení</h3>
<?php
session_start();
$i = 0;
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
$query3 = "SELECT * FROM users WHERE username ='$username' ";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_array($result3);
$_SESSION['student_id'] = $row3[0];
echo "ID studenta " . $_SESSION['student_id']. "<br>";
while($row = mysqli_fetch_array($result)) {

        $row2 = mysqli_fetch_array($result2);
        
        if(!($row[0]==$row2[2])){

            $i += 1;    
            $_POST['predmet_id'] = $i;
            echo  "ID predmetu ".$_POST['login_id'] = $row[0];
            echo '<li><a href="prihlasit_predmet.php">' . $row[1]. '</a></li>';

            echo '<br>';
        }

    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="prihlasit_predmet.php">
    <select name ="id" id="">
        <?php
        showAllclasses();

        ?>
    <input type="submit" value="Submit">
    
    
    </div>


    </form>
</body>
</html>