<?php 
include "db.php";
include "common.php";
session_start();

showUsersID();
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
<h3>Předměty k přihlášení</h3>
<?php include "ovladaci_panel_student.php" ?>
    <br>   
    <form method="POST" action="prihlasit_predmet.php">
    <div class="form-group">
        <select name ="id" id="">            
        <?php
        showMyClasses();          
        ?>
            </select>
            </div>
            <br>
    <input type="submit" name="submit" value="Submit">
    <?php 
    ?>   
    </div>
    </form>
</div>
</body>
</html>