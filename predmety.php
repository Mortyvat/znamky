<?php include "db.php";?>
<?php include "functions.php";?>


<?php
session_start();

$username =  $_SESSION['login_user'];
$query3 = "SELECT * FROM users WHERE username ='$username' ";
$result3 = mysqli_query($connection, $query3);
if(!$result3){
    die('Query FAILED' . mysqli_error());
}
$row3 = mysqli_fetch_array($result3);
$_SESSION['student_id'] = $row3[0];
//echo "ID studenta " . $_SESSION['student_id']. "<br>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bubu.css">
</head>
<body>
    
<div class="container">
<h3>Předměty</h3>
    <?php include "ovladaci_panel_student.php" ?>
    <br>
    <form method="POST" action="predmet.php">
    <div class="form-group">
        <select name ="id" id="">
        <?php

        $query = "SELECT * FROM classes";
        $query2 = "SELECT users.username, classes.class, classes.id FROM `users`, attending, classes WHERE users.username = '$username' and attending.id_student= users.id and attending.id_class = classes.id ";
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
                echo "<option value='$id'>$id</option>\n";
                //echo $_POST;
                echo '<br>';
                }   
            }
            
        ?>
            </select>
            </div><br>
    <input type="submit" name="submit" value="Submit">
    <?php 
    //echo $id;
    ?>
    
    </div>


    </form>
</body>
</html>