<?php

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$connect = new PDO("mysql:host=localhost; dbname=ronyrezaul", "root", "", $options);

//$connect = mysqli_connect("localhost","root","","cars");

?>