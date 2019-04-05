<?php

if(isset($_SESSION['login_user'])){
    ?>
<ul>
            <li><a href="index.php">Index</a></li>
            <li><a href="classes_to_get.php">Přihlásit předmět</a></li>
            <li><a href="nastaveni.php">Změna hesla</a></li>
            <li><a href="predmety.php">Známky</a><li>
            <li><a href="odhlaseni.php">Odhlaseni</a></li>
    </ul><br><br>
<?php 
} 
?>