

<?php
include "header.php";
include "db.php";
//include "common.php";

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
 

<div class="container">
<div class="col-sm-6">


        <?php
        include "prihlasovani.php";
        include "welcome.php";

        if(isset($_SESSION['login_user'])){
            
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        if($row['access']==1){
            include "ovladaci panel ucitel.php";
        }   else{
            include "ovladaci panel student.php";
        }

        //if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            
            

                
                $hlaska = "AHOJ ". $_SESSION['login_user'].'<br>';
                
                
                include "vypis_predmetu_studenta.php";
                include "vypis_studentu_predmetu.php";
                include "vypis_znamek_predmetu_studenta.php";
                }   
        /*}
        else 
        echo "nope".implode(" ",$_SESSION);*/
?>

</div>
</div>
    
</body>
</html>