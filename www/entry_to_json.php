<?php

$name = $_SESSION['name'];

function getWeight($date_in) {
    mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
    mysql_select_db("my_database") or die(mysql_error());
    $entry_list = mysql_query("SELECT * FROM entry_list") or die(mysql_error());
    $id = $_SESSION['id'];

    $weight = 0;
    while($row=mysql_fetch_array($entry_list)) {
        if($id==$$row['id'] and $date_in==$row['date']) {
            $weight = $weight + $row['weight'];
        }
    }
    return $weight;
}

mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
mysql_select_db("my_database") or die(mysql_error());
$names_list = mysql_query("SELECT * FROM names_list") or die(mysql_error());
$dates = array($names_list);
$weights = array_map("getWeight", $dates);

$json_obj = '{
    "date":' . $dates .
    ', weight":' . $weights .
'}';

?>
