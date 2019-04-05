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
include "ovladaci panel ucitel.php";

$id_predmetu = $_POST['id'];
//echo $_POST['id'];
/*$query2 = "SELECT * FROM classes";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_array($result2);
$predmet = $row2[1];*/
echo "<h3>$id_predmetu</h3>";
//echo $id_predmetu . "<br>";
$query = "SELECT users.username, classes.class, znamky.date, znamky.mark FROM `users`, znamky, classes WHERE  znamky.id_student= users.id and znamky.id_class = classes.id and classes.class='$id_predmetu' ";
$result = mysqli_query($connection, $query);
$num_rows = mysqli_num_rows($result);
/*$row = mysqli_fetch_array($result);
$predmet = $row[1];
echo "<h3>$predmet</h3>";*/

    while($row = mysqli_fetch_array($result)) {
        echo $row[1] .' dostal '. $row[2] .' známku '.$row[3].'<br>';
    //echo "Student ". $row[0] . " obdržel ". $row[2] . " známku <big>". $row[3] .".</big><br>";
    }


?>

</div>
</div>
    
</body>
</html>