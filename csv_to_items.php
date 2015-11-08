<?php

//This gets all the other information from the form
$item = $_POST['item'];
$weight = $_POST['weight'];
$cost =  $_POST['weight'];

// Connects to your Database
mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
mysql_select_db("my_database") or die(mysql_error());

//Writes the information to the database
mysql_query("INSERT INTO items_list VALUES ('$item', '$weight', '$cost')");

?>
