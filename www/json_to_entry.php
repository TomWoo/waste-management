<?php

session_start();
$id = $_SESSION['id'];
//This gets all the other information from the form
//$data_in = json_decode($_POST['json']);
//echo $data_in;

//foreach($data_in as $data) {
//    echo "<br><br>";
//    echo $data;
    $item = $_POST['name'];
//    echo $item;
    mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
    mysql_select_db("my_database") or die(mysql_error());
    $items_list = mysql_query("SELECT * FROM items_list") or die(mysql_error());
    $factor = 0;
    while($row=mysql_fetch_array($items_list)) {
        if(strcmp($row['item'],$item)) {
            $factor = $row['cost'];
        }
    }

    $weight = $_POST['amount']*$factor;
    $date = date("H:m");
    $time_arr = explode(":",$date);
    $date = 60*intval($time_arr[0]) + intval($time_arr[1]);

    // Connects to your Database
    mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
    mysql_select_db("my_database") or die(mysql_error());
    session_start();

    $entry_list = mysql_query("INSERT INTO entry_list (id,item,weight,date) VALUES (" . $id . ",'" . $item . "'," . $weight . "," . $date . ")") or die(mysql_error());
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['logged_in'] = 1;
//}

header("Location:http://colab-sbx-221.oit.duke.edu/index.php");
exit();

?>
