<?php

//This gets all the other information from the form
$name = $_POST['name'];
$id = intval($_POST['id']);

// Connects to your Database
mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
mysql_select_db("my_database") or die(mysql_error());

$names_list = mysql_query("SELECT * FROM names_list") or die(mysql_error());
while($row=mysql_fetch_array($names_list)) {
    $name_row = $row['name'];
    $id_row = $row['id'];
    if(strcmp($name,$name_row)!=0 and $id==$id_row) {
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['logged_in'] = 1;
        session_start();
        header("Location:http://colab-sbx-221.oit.duke.edu/index.html");
        exit();
    }
}
echo "Incorrect login info."

?>
