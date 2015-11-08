<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WasteManagement</title>
    <?php
        session_start();
        if($_SESSION['logged_in']==0) {
            header("Location:http://colab-sbx-221.oit.duke.edu/login.html");
            exit();
        }
        $name = $_SESSION['name'];
        function getWeight($date_in) {
            mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
            mysql_select_db("my_database") or die(mysql_error());
            $entry_list = mysql_query("SELECT * FROM entry_list") or die(mysql_error());
            $id = $_SESSION['id'];

            $weight = 0;
            while($row=mysql_fetch_array($entry_list)) {
                if($id==$row['id'] and $date_in==$row['date']) {
                    $weight = $weight + $row['weight'];
                }
            }
            return $weight;
        }
        mysql_connect("localhost", "root", "bitnami") or die(mysql_error());
        mysql_select_db("my_database") or die(mysql_error());
        $entry_list = mysql_query("SELECT * FROM entry_list") or die(mysql_error());
        $dates = array();
        while($row=mysql_fetch_array($entry_list)) {
                if($id==$row['id']) {
                      array_push($dates,$row['date']);
                  }
         }

        $json_obj = "";
        foreach($dates as $date){
            $w = getWeight($date);
            $json_obj = $json_obj . $date . ":" . $w . ", ";
        }
        $json_obj ="{" . substr($json_obj, 0, strlen($json_obj)-2) . "}";
    ?>
    <script type="text/javascript">
        console.log("hello");
        test = '<?php echo json_encode($json_obj) ?>';
        var arrGraph = JSON.parse(test);
        console.log(arrGraph);
    </script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/Chart.js/Chart.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <script src="js/bootstrap.min.js"></script>
    <style>
        p.bigspacing{
            line-height: 120%
        }
    </style>
</head>
<body>
<h1 align="center">
    r<font color="#228b22">EDU</font>ce</h1>
<h1 align="center">
    <font size="4">An online interacting platform that strives to make reducing a habit</font></h1>

<p class="bigspacing">
<div class="searchbar" align="center">
    <input id="tags" placeholder="Search" class="bar">
    <button class="btn btn-info" onclick="adjustForm()">Search</button>
</div>
</p>

<div id="tableEntry" style="display:none">
    <form action="json_to_entry.php" method="post">
        <div id="tableForm">
            <h1 id="category"> Category </h1>
            <input type="text" id="cat" name="name" value="lols" style="display:none">
            <fieldset>
                Enter amount consumed: <input type="text" id="myText" name="amount">
                <label for="units">Select Units</label>
                <select name="units" id="units">
                    <option>Pounds</option>
                    <option>Grams</option>
                    <option selected="selected">Amount</option>
                </select>
                <button class="btn btn-primary" onClick="addDataToAddingTable()">Add Item</button>
            </fieldset>
        </div>
        <div>
            <table class="table table-hover" id="addingTable">
                <thead>
                <tr>
                    <th>Waste Item Category</th>
                    <th>Amount Wasted</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
<!--        <div id="submit" align="right">-->
<!--            <button class="btn btn-info" type="submit" > Submit</button>-->
<!--        </div>-->
    </form>
</div>

<div id="accordion">
    <h3>Visual Data</h3>

    <div align="center">
        <canvas id="chartData" width="400px" height="400px"></canvas>
    </div>
    <h3>Table</h3>

    <div>
        <table class="table table-hover" id="wasteTable">
            <thead>
            <tr>
                <th>Waste Item</th>
                <th>Amount Wasted</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script src="js/index.js"></script>
</body>
</html>