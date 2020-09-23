<?php
$servername = 'localhost:3307';
$username = 'root';
$password = '';
$db= 'username';

//connection
$conn = mysqli_connect($servername,$username,$password,$db);

if(mysqli_connect_error()){
    echo "failed". mysqli_connect_error();
}

?>