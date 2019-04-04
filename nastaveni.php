
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
<h3>Vytvoreni noveho hesla</h3>

<?php 
include 'header.php';
include 'ovladaci panel.php';?>
<br><br>
<form action="nastaveni.php" method="post">
<div class="form-group">
<label for="username">Username</label>
<input type="text" name="username" class="form-control">
</div>
<br>
        

<div class="form-group">
<label for="password">Password</label>
<input type="password" name= "password" class="form-control">
</div>
<br>
<input class ="btn btn-primary" type="submit" name="login" value="Submit">
</form>
<br>
<?php
        
        
        if(!isset($_SESSION['login_user'])) {
            header("location: index.php");
        } 
        echo $hlaska;
        ?>
        
</div>
</div>
    
</body>
</html>
        
       
        