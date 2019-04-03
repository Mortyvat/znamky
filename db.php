<?php

$connection = mysqli_connect('localhost', 'root', '', 'databaze');

if(!$connection) {

    die("Database connection failed");
}