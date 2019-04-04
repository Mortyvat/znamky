

<?php
include "header.php";

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
        include "ovladaci panel.php";
        

        //if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            
            if(isset($_SESSION['login_user'])){

                
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