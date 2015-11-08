<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>WasteManagement</title>
        <?php
        if($_SESSION['logged_in']==0)
            header("Location:http://colab-sbx-221.oit.duke.edu/login.html");
            exit();
        ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="js/Chart.js/Chart.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css"/>
        <link rel="stylesheet" href="css/index.css"/>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1 align="center">rEDUce</h1>

        <div class="searchbar" align="center">
            <input id="tags" placeholder="Search" class="bar">
            <button class="btn btn-info">Search</button>
        </div>

        <div id ="accordion">
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
                        <th>Date</th>
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