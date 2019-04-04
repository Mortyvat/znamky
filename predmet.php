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

<?php include "db.php";?>
<?php include "functions.php";?>
<?php
session_start();
include "ovladaci panel.php";
$username =  $_SESSION['login_user'];
$id_predmetu = $_POST['id'];
//echo $_POST['id'];
/*$query2 = "SELECT * FROM classes";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_array($result2);
$predmet = $row2[1];*/
echo "<h3>$id_predmetu</h3>";
//echo $id_predmetu . "<br>";
$query = "SELECT users.username, classes.class, znamky.date, znamky.mark FROM `users`, znamky, classes WHERE  znamky.id_student= users.id and znamky.id_class = classes.id and classes.class='$id_predmetu' and users.username='$username' ";
$result = mysqli_query($connection, $query);
$num_rows = mysqli_num_rows($result);
/*$row = mysqli_fetch_array($result);
$predmet = $row[1];
echo "<h3>$predmet</h3>";*/
if ($num_rows > 0) {
    echo "Vaše známky v předmětu $id_predmetu jsou:<br><br>";
    while($row = mysqli_fetch_array($result)) {
    
    echo "Student ". $row[0] . " obdržel ". $row[2] . " známku <big>". $row[3] .".</big><br>";
    }
  }
  else {
    echo "Nemáte žádné známky";
    }

?>

</div>
</div>
    
</body>
</html>