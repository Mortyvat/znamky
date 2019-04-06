<?php
include 'db.php';
include 'common.php';

if(isset($_SESSION['login_user'])){

    } else {  
    if(isset($_POST['login'])){   
    showLogin();
    }
?>


<div class="container">
<div class="col-sm-6">


<h3>Prihlasovani</h3> 


<form action="index.php" method="post">
        <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name= "password" class="form-control">
        </div>
        <input class ="btn btn-primary" type="submit" name="login" value="Submit">
        <?php
        
        ?>
        </form>
        


</form>

</div>
</div>
  <?php  
}  
?>