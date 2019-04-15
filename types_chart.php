<html>
<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
    </div>
</head>

<body>

<?php
/**
 * Created by PhpStorm.
 * User: Kiril Andonov
 * Date: 11.12.17
 * Time: 19:42
 */
    require ('types.php');
?>

<script>
    Highcharts.chart('container', {
        data: {
            table: 'typetable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Income by days and types'
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Type income'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name}: {point.y}<br/>Total: 		{point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            }
        }
    });
    document.getElementById("typetable").parentNode.removeChild(document.getElementById("typetable"));
</script>

</body>
</html>
