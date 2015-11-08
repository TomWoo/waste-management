<?php

//This gets all the other information from the form
$name = $_POST['name'];
$id = intval($_POST['id']);
$teacher_id = intval($_POST['teacher_id']);

// Connects to your Database
mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
mysql_select_db("my_database") or die(mysql_error());
session_start();

$names_list = mysql_query("INSERT INTO names_list (name,id,teacher_id) VALUES ('" . $name . "'," . $id . "," . $teacher_id . ")") or die(mysql_error());
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
$_SESSION['logged_in'] = 1;
header("Location:http://colab-sbx-221.oit.duke.edu/index.php");
exit();

?>
