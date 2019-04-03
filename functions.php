
<?php

function showAllusers() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        //echo "<option value='$id' name=''>$id </option>";
    }
}

function showAllclasses() {
    global $connection;
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

        while($row2 = mysqli_fetch_array($result2));

        
        if(!($row[0]==$row2[2])){
            $id = $row[1];

            echo "<option value='$id' name=''>$id </option>";
           
        }

    }
}



function showMYclasses() {
    global $connection;
    $query = "SELECT users.username, classes.class FROM `users`, attending, classes WHERE users.username = '$username' and attending.id_student= users.id and attending.id_class = classes.id";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
?>
<h5>Tvoje předměty</h5>
<?php
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        echo $row[1] . '<br>';
        //echo "<option value='$id' name=''>$id </option>";
    }
}

function showSTUDENTSofclasses() {
    global $connection;
    $query = "SELECT users.username, classes.class FROM `users`, attending, classes WHERE  attending.id_student= users.id and attending.id_class = classes.id";
    $result = mysqli_query($connection, $query);
    if(!$result){
            die('Query FAILED' . mysqli_error());
    }
?>
<h5>Studenti příhlášení na předměty</h5>
<?php
    while($row = mysqli_fetch_array($result)) {
        echo $row[1] .' '.$row[0].'<br>';
        //echo "<option value='$id' name=''>$id </option>";  
    }
}





?>