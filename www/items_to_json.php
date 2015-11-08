<?php
// Connects to your Database
mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
mysql_select_db("my_database") or die(mysql_error());
$items_list = mysql_query("SELECT * FROM items_list") or die(mysql_error());

$items_arr = array();
while($row=mysql_fetch_array($items_list)) {
    $item = $row['item'];
    array_push($items_arr,$item);
}

?>
