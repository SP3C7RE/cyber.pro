$.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=large-dataset.json&callback=?',

function (data) {

// Create a timer
var start = +new Date();


// Create the chart
Highcharts.stockChart('container', {

        data: {
            table: 'clientstable'
        },

        chart: {
            events: {
                load: function () {
                    this.setTitle(null, {
                        text: 'Built chart in ' + (new Date() - start) + 'ms'
                    });
                }
            },
            zoomType: 'x'
        },

        rangeSelector: {

            buttons: [{
                type: 'day',
                count: 3,
                text: '3d'
            }, {
                type: 'week',
                count: 1,
                text: '1w'
            }, {
                type: 'month',
                count: 1,
                text: '1m'
            }, {
                type: 'all',
                text: 'All'
            }],
            selected: 3
        },

        xAxis: {
            categories: []},

        yAxis:{
            min : 0,
            title: {
                text: 'Hourly income ($)'
            }
        },

        title: {
            text: 'Income by days and hours.'
        },

        subtitle: {
            text: 'This is build in subtitle ...' // dummy text to reserve space for dynamic subtitle
        },

        series: [{
            name: 'Price',
            data: data,
            tooltip: {
                valueDecimals: 1,
                valueSuffix: '$'
            }
        }]

    });
    document.getElementById("clientstable").parentNode.removeChild(document.getElementById("clientstable"));
});
