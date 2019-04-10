<?php include "db.php";?>
<?php
session_start();
$id_predmetu = $_POST['id'];
echo "<h3>$id_predmetu</h3>";
include "ovladaci_panel_student.php";
if(isset($_POST['submit'])){
    if(isset($_POST['znamka'])){
    $znamka = $_POST['znamka'];
    $datum = $_POST['datum'];
    $student = $_POST['idstudent'];
    $query2 = "SELECT id FROM users WHERE username = '$student'"; 
    $result2 = mysqli_query($connection, $query2);
    $row2 = mysqli_fetch_array($result2);
    $student_id = $row2[0];
    $query3 = "SELECT id FROM classes WHERE class = '$id_predmetu'"; 
    $result3 = mysqli_query($connection, $query3);
    $row3[0] = mysqli_fetch_array($result3);
    $class_id = $row3[0];
    $query = "INSERT INTO znamky(id_student, id_class, date, mark) ";
    $query .= "VALUES ('$student_id', '$class_id', '$datum', '$znamka')";
    $result = mysqli_query($connection, $query);
    echo $student .' dostal '. $datum .' známku '.$znamka.'<br>';
    //echo "Student ". $row[0] . " obdržel ". $row[2] . " známku <big>". $row[3] .".</big><br>";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<br>
<form action="pridat_znamky.php" method="post">
        <div class="form-group">
        <label for="znamka">znamka</label>
        <input type="text" name="znamka" class="form-control">
        </div>

        <div class="form-group">
        <label for="datum">datum</label>
        <input type="text" name= "datum" class="form-control">
        </div>

        <div class="form-group">
        <select name ="idstudent" idstudent="">
            <?php 
            $query2 = "SELECT users.username FROM `users`, classes WHERE classes.class = '$id_predmetu' ";
            $result2 = mysqli_query($connection, $query2);
            if(!$result2){
                die('Query FAILED' . mysqli_error());
            }
            while($row2 = mysqli_fetch_array($result2)) {
                $idstudent = $row2[0];
                echo $row2[0];
                echo "<option value='$idstudent'>$idstudent</option>\n";    
            }
            ?>
        </select>
        <input class ="btn btn-primary" type="submit" name="submit" value="Submit">
        </div>    

    </form>
    
</body>
</html>