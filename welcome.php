<?php
$username = $_SESSION['login_user'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $connection = mysqli_connect('localhost', 'root', '', 'databaze');
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        if($row['access']==1){
        echo "<h3>Vitejte Pane učiteli ".$row['access']."</h3> ";
        } else {
            echo "<h3>Vitejte studente " .$_SESSION['login_user'] ." </h3>";
        }
    }       
    
 
?>

