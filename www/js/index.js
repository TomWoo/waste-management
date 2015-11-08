/**
 * Created by nesh1 on 11/7/2015.
 */

function getArrayOfItems(){
    return [
        "Apple",
        "Banana",
        "Egg",
        "Cheetos(one)",
        "Milk(1L)",
        "Orange",
        "Steak (6 oz)",
        "Disposable Utensils",
        "Yogurt per US cup",
        "Paper",
        "Bottled Water",
        "Coffee Cups",
        "Lunch Box",
        "Rice per bowl",
        "Noodle per bowl",
        "Salmon(4 oz)",
        "Plastic Bags",
        "Paper Bags"
    ];
}

addDataToTable();


var itemArray=[];
$(function() {
    var availableTags = getArrayOfItems();
    $( "#tags" ).autocomplete({
        source: availableTags
    });
    $( "#accordion" ).accordion();
});

function adjustForm(){
    //change the category name
    //change the values to 0
    document.getElementById('category').innerHTML = document.getElementById('tags').value;
    document.getElementById('cat').value = document.getElementById('category').innerHTML;
    document.getElementById("myText").value = 0;
    document.getElementById("tableEntry").style.display='block';

}

function addDataToTable(){
    var tableRow = document.createElement("TR");
    arrW = getWeight();
    arrT = getDate();
    for(i=0;i<arrT.length;i++){
            tableD = document.createElement("TD");
            textData = document.createTextNode(arrT(i));
            tableD.appendChild(textData);
            tableRow.appendChild(tableD);
            tableD = document.createElement("TD");
            textData = document.createTextNode(arrW(i));
            tableD.appendChild(textData);
            tableRow.appendChild(tableD);
        }
    $("#wasteTable tbody").append(tableRow);
}

function addDataToAddingTable(){
    var categoryTitle = document.getElementById('category').innerHTML;
    var amount = document.getElementById("myText").value;
    item = {cat: categoryTitle, amount: amount, date: getMinutes()};
    itemArray.push(item);
    var tableRow = document.createElement("TR");
    for (var property in item){
        if (item.hasOwnProperty(property)) {
            tableD = document.createElement("TD");
            textData = document.createTextNode(item[property]);
            tableD.appendChild(textData);
            tableRow.appendChild(tableD);
        }
    }
    $("#addingTable tbody").append(tableRow);
}

function getMinutes(){
    date = new Date();
    return date.getHours()*60+date.getMinutes();
}

function submitTheItemArrayToTable(){
        $.ajax({
            type: 'POST',
            url: 'json_to_entry.php',
            data: {json: JSON.stringify(itemArray)},
            dataType: 'json',
            async: false
        });
    console.log(itemArray);
}

// Get context with jQuery - using jQuery's .get() method.
var ctx = $("#chartData").get(0).getContext("2d");
// This will get the first returned node in the jQuery collection.
var data = {
    labels: getDate(),
    datasets: [
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: getWeight()
        }
    ]
};

function getDate(){
    arr = [];
    for(var property in arrGraph){
        arr.push(property);
    }
    console.log(arr);
    return arr;
}

function getWeight(){
    arr = [];
    for(var property in arrGraph){
        if (arrGraph.hasOwnProperty(property)) {
            arr.push(arrGraph[property]);
        }
    }
    console.log(arr);
    return arr;
}

var myLineChart = new Chart(ctx).Line(data, {

    ///Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - Whether the line is curved between points
    bezierCurve : true,

    //Number - Tension of the bezier curve between points
    bezierCurveTension : 0.4,

    //Boolean - Whether to show a dot for each point
    pointDot : true,

    //Number - Radius of each point dot in pixels
    pointDotRadius : 4,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth : 1,

    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 2,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill : true,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

});