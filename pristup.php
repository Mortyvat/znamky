
<?php 

function Pristup();
$username = '';
$username =  $_SESSION['login_user'];
echo $username;
if(isset($_POST['access'])){
    $access = $_POST['access'];
    switch ($access) {
        case '1':
            echo 'ucitel<br/>';
            break;
        case '2':
            echo 'student<br/>';
            break;
        }
    }

$connection = mysqli_connect('localhost', 'root', '', 'databaze');
$query = "UPDATE users SET access = '$access' WHERE username = '$username' ";
$result = mysqli_query($connection, $query);


if(!$result) {
    die("Query Failed " . mysqli_error($connection));
               // $hlaska .= "Účet vytvořen". '<br>';
}
               ?>            


<!DOCTYPE html>
<html>
<body>
<form action="pristup.php" method="post">
<select name="access">
  <option value="1">Ucitel</option>
  <option value="2">Student</option>
  
</select>
<input class ="btn btn-primary" type="submit" name="submit" value="Update">  

</form>
<li><a href="index.php">HOME</a></li>
</body>
</html>