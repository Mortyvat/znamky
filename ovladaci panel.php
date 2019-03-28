<?php

if(isset($_SESSION['login_user'])){
    ?>
<ul>
            <li><a href="index.php">Index</a></li>
            <li><a href="nastaveni.php">Nastaveni</a></li>
            <li><a href="odhlaseni.php">Odhlaseni</a></li>
            
</ul>
<?php 
} 
?>