<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function() {

            var dataPoints = [];

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Nombre Ticket Par office (Service) "
                },
                axisY: {
                    title: "ID Office",
                    titleFontSize: 24
                },
                data: [{
                    type: "line",
                    yValueFormatString: "### Nombre Ticket, #",
                    xValueFormatString: "#, ### id office",
                    dataPoints: dataPoints
                }]
            });

            function addData(data) {
                for (var i = 0; i < data.length; i++) {
                    dataPoints.push({
                        x: parseInt(data[i].day),
                        y: parseInt(data[i].nboffice)
                    });
                }
                chart.render();

            }
            $.getJSON("serviceoffice", addData);

        }
    </script>
</head>
<body>

<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body" id="chartContainer">
            </div>
        </div>
    </div>
</div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

