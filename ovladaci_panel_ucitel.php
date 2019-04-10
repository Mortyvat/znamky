<div class="ovladaci_panel_student">
<?php

if(isset($_SESSION['login_user'])){
    ?>
<ul>
            <li><a href="index.php">Domů</a></li>
            <li><a href="classes_to_teach.php">Učit předmět</a></li>
            <li><a href="nastaveni.php">Změna hesla</a></li>
            <li><a href="pridat_znamky.php">Přidat Známky</a></li>
            <li><a href="predmety_ucitel.php">Přehled Známek</a><li>
            <li><a href="odhlaseni.php">Odhlaseni</a></li>
    </ul><br><br>
<?php 
} 
?>
