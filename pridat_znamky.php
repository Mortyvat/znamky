<?php include "db.php";?>
<?php
session_start();
$username =  $_SESSION['login_user'];
$query4 = "SELECT * FROM users WHERE username ='$username' ";
$result4 = mysqli_query($connection, $query4);
if(!$result4){
    die('Query FAILED' . mysqli_error());
}
$row4 = mysqli_fetch_array($result4);
$_SESSION['student_id'] = $row4[0];
include "ovladaci panel ucitel.php";
if(isset($_POST['submit'])){
    if(isset($_POST['znamka'])){
    $znamka = $_POST['znamka'];
    $datum = $_POST['datum'];
    $student = $_POST['idstudent'];
    $predmet = $_POST["id"];
    $query2 = "SELECT id FROM users WHERE username = '$student'"; 
    $result2 = mysqli_query($connection, $query2);
    $row2 = mysqli_fetch_array($result2);
    $student_id = $row2[0];
    $query3 = "SELECT id FROM classes WHERE class = '$predmet'"; 
    $result3 = mysqli_query($connection, $query3);
    $row3 = mysqli_fetch_array($result3);
    //echo $predmet;
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

        <select name ="id" id="">
        <?php

        $query = "SELECT * FROM classes";
        $query2 = "SELECT users.username, classes.class, classes.id FROM `users`, teaching, classes WHERE users.username = '$username' and teaching.id_teacher= users.id and teaching.id_class = classes.id ";
        $result = mysqli_query($connection, $query);
        $result2 = mysqli_query($connection, $query2);
        if(!$result){
            die('Query FAILED' . mysqli_error());
        }
        if(!$result2){
            die('Query FAILED' . mysqli_error());
        }

        while($row = mysqli_fetch_array($result)) {

            $row2 = mysqli_fetch_array($result2);
        
            if(($row[0]==$row2[2])){

                $id = $row[1];
                $id2 = $row[0];  
                $_POST["id"]= $id2; 
                echo "<option value='$id'>$id</option>\n";
                //echo $_POST;
                echo '<br>';
                }   
            }
            
        ?>
            </select>

        <div class="form-group">
        <select name ="idstudent" idstudent="">
            <?php 
            $query2 = "SELECT users.username FROM `users`, classes WHERE classes.class = '$id' ";
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