/**
 * Created by nesh1 on 11/7/2015.
 */

function getArrayOfItems(){
    return [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];
}

addDataToTable({type:"Fiat", model:500, color:"white"});
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
    document.getElementById("myText").value = 0;
    document.getElementById("tableEntry").style.display='block';

}

function addDataToTable(tableData){
    var tableRow = document.createElement("TR");
    for (var property in tableData){
        if (tableData.hasOwnProperty(property)) {
            tableD = document.createElement("TD");
            textData = document.createTextNode(tableData[property]);
            tableD.appendChild(textData);
            tableRow.appendChild(tableD);
        }
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
    //sends the data to Tom
    console.log(itemArray);
}

// Get context with jQuery - using jQuery's .get() method.
var ctx = $("#chartData").get(0).getContext("2d");
// This will get the first returned node in the jQuery collection.
var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};
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