<?php
include 'db.php'; 

//Vypíše všechny uživatele
/*function showUsers() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
}*/

//Vypíše všechny předměty
function showClasses() {
    global $connection;
    $query = "SELECT * FROM classes";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
}

//Ukáže data uživatele podle username
function showUsersID() {
    global $connection;
    $username =  $_SESSION['login_user'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
    $row3 = mysqli_fetch_array($result);
    $_SESSION['student_id'] = $row3[0];
}

//Ukáže ID studenta podle student
function showStudentID() {
    global $connection;
    $query = "SELECT id FROM users WHERE username = '$student'";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
}

//Ukáže ID třídy podle predmet
function showClassID() {
    global $connection;
    $query = "SELECT id FROM classes WHERE class = '$predmet'";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
}

//Vybere jeden záznam z databáze k přihlašování
function showLogin() {
    global $connection;
    $username= $_POST['username'];
    $password= $_POST['password'];
    $query = "SELECT * FROM users WHERE username ='$username'and password = '$password' LIMIT 1";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
    if (mysqli_fetch_row($result)) {
        $row = mysqli_fetch_array($result);
        $session2 = $_SESSION['login_id'] = $row[0]; 
        $session =  $_SESSION['login_user']= $username;
        //echo $session;
        echo "<script>location.href='index.php'</script>";
    
            if(!$result){

            die('Query FAILED' . mysqli_error($connection));
            }
    } else {

             echo "Přihlašovací údaje neexistují". '<br>';
    
    }
}

//Vypíše moje předměty podle username
function showMyClasses() {
    global $connection;
    $username =  $_SESSION['login_user'];
    $query = "SELECT * FROM classes";
    $query2 = "SELECT users.username, classes.class, classes.id FROM `users`, attending, classes WHERE users.username = '$username' and attending.id_student= users.id and attending.id_class = classes.id ";
    $result = mysqli_query($connection, $query);
    $result2 = mysqli_query($connection, $query2);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
    if(!$result2){
        die('Query FAILED' . mysqli_error());
    }
    while($row = mysqli_fetch_array($result)) {

        $row2 = mysqli_fetch_array($result2);
    
        if(!($row[0]==$row2[2])){

            $id = $row[1];
            $id2 = $row[0];   
            $_POST['id'] = $id;
            echo "<option value='$id2'>$id</option>\n";
            echo '<br>';
            }   
        }
}

//Vypíše předměty které učím podle username
function showTeachingClasses() {
    global $connection;
    $username =  $_SESSION['login_user'];
    $query = "SELECT * FROM classes";
    $query2 = "SELECT users.username, classes.class, classes.id FROM `users`, teaching, classes WHERE users.username = '$username' and teaching.id_teacher= users.id and teaching.id_class = classes.id ";
    $result = mysqli_query($connection, $query);
    $result2 = mysqli_query($connection, $query2);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
    if(!$result2){
        die('Query FAILED' . mysqli_error());
    }
    while($row = mysqli_fetch_array($result)) {

        $row2 = mysqli_fetch_array($result2);
    
        if(!($row[0]==$row2[2])){

            $id = $row[1];
            $id2 = $row[0];   
            $_POST['id'] = $id;
            echo "<option value='$id2'>$id</option>\n";
            echo '<br>';
            }   
        }
}

// Vypíše známky studentů předmětu podle id_predmetu
function showMarksOf() {
    global $connection;
    $query = "SELECT users.username, classes.class, znamky.date, znamky.mark FROM `users`, znamky, classes WHERE  znamky.id_student= users.id and znamky.id_class = classes.id and classes.class='$id_predmetu' ";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }
}

//Vypíše všechny studenty všech tříd
function showStudents() {
    global $connection;
    $query = "SELECT users.username, classes.class FROM `users`, attending, classes WHERE users.username = '$username' and attending.id_student= users.id and attending.id_class = classes.id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }
}

//Vypíše všechny studenty všech tříd
function showClassStudents() {
    global $connection;
    $query = "SELECT users.username, classes.class FROM `users`, attending, classes WHERE  attending.id_student= users.id and attending.id_class = classes.id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }
}

//Vypíše studenta podle jeho ID
function showStudentByID() {
    global $connection;
    $query = "SELECT users.username FROM `users`, classes WHERE classes.class = '$id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }
}

//Zapíše známky do databáze
function insertMarks() {
    global $connection;
    $query = "INSERT INTO znamky(id_student, id_class, date, mark) ";
    $query .= "VALUES ('$student_id', '$class_id', '$datum', '$znamka')";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
}

//Zapíše učitele k novému předmětu do databáze
function insertTeacher() {
    global $connection;
    $query = "INSERT INTO teaching(id_teacher, id_class) ";
    $query .=  "VALUES ('$id_ucitele', '$id_predmetu')";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
}

//Zapíše studenta k novému předmětu do databáze
function insertStudent() {
    global $connection;
    $query = "INSERT INTO attending(id_student, id_class) ";
    $query .=  "VALUES ('$id_ucitele', '$id_predmetu')";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
}

//
function insertRegistration() {
    global $connection;
    $query = "INSERT INTO users(username, password, access) ";
    $query .=  "VALUES ('$username', '$password', '$access')";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error($connection));
    }
}

function notTeacher(){
    if(isset($_SESSION['login_user'])){
        $username = $_SESSION['login_user'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $connection = mysqli_connect('localhost', 'root', '', 'databaze');
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)) {
            if($row['access']==1){
            } elseif($row['access']==2){
                header("location: index.php");
            } else {
                header("location: index.php");
            }
            
        }        
    } else {
        header("location: index.php");   
    }
}

function notStudent(){
    if(isset($_SESSION['login_user'])){
        $username = $_SESSION['login_user'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $connection = mysqli_connect('localhost', 'root', '', 'databaze');
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)) {
            if($row['access']==2){
            } elseif($row['access']==1){
                header("location: index.php");
            } else {
                header("location: index.php");
            }
            
        }        
    } else {
        header("location: index.php");   
    }
}

function notUser(){
    if(!isset($_SESSION['login_user'])) {
        header("location: index.php");
    } 
}

function Welcome(){
    if(isset($_SESSION['login_user'])){
        $username = $_SESSION['login_user'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $connection = mysqli_connect('localhost', 'root', '', 'databaze');
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)) {
            if($row['access']==1){
            echo "<h3>Vitejte Pane učiteli ".$_SESSION['login_user']."</h3> ";
            } elseif($row['access']==2){
                echo "<h3>Vitejte studente " .$_SESSION['login_user'] ." </h3>";
            } else {
                echo "Vypadni, tady nemáš co dělat";
    
            }
            
        }       
    }
}

?>
