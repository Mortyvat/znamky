<?php
if(isset($_SESSION['login_user'])){
    
    $hlaska = "AHOJ ". $_SESSION['login_user'].' demente <br>';
    ?>

    <?php
    } else {  
    if(isset($_POST['login'])){

        $username= $_POST['username'];
        $password= $_POST['password'];
        $id2 = NULL;
        $connection = mysqli_connect('localhost', 'root', '', 'databaze');
        //echo $username . "<br>" . $password;
        if($connection) {

            $hlaska .= 'Připojeno k databázi'. '<br>';
            $query = "SELECT * FROM users WHERE username ='$username'and password = '$password' LIMIT 1";
            $result = mysqli_query($connection, $query);

            if (mysqli_fetch_row($result)) {
                
                $session =  $_SESSION['login_user']= $username;
                //echo $session;
                $hlaska .= "Přihlašovací údaje existují". '<br>';
                $hlaska .= "Ahoj ". $session. '<br>';
                echo "<script>location.href='index.php'</script>";
            
                 if(!$result){

                    die('Query FAILED' . mysqli_error($connection));
                    }
            } else {

                $hlaska .= "Přihlašovací údaje neexistují". '<br>';
            
            }
        } else {

            $hlaska = 'Připojení k databázi selhalo';
            die("Database connection failed");
        }
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