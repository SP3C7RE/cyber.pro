//Creat table
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

//Select element by id
document.getElementById("typetable").parentNode.removeChild(document.getElementById("typetable"));
