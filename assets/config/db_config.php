<?php

//connect to database

$connection = mysqli_connect('localhost','Zoli','u0980@qLv44oj@0Z', 'portofolioDB');

//check the connection

if(!$connection){

    echo 'Connection failed: ' . mysqli_connect_error();
}