<div id="container">
                                
</div>

<script>
	Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Summary Hourly Cycle Time & Output'
    },
    xAxis: {
        categories: [
            '1st',
            '2nd',
            '3rd',
            '4th',
            '5th',
            '6th',
            '7th',
            '8th',
        ]
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Cycle Time'
        }
    }, {
        title: {
            text: 'Output'
        },
        opposite: true
    }],
    legend: {
        shadow: false
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        },
        series: {
            animation: false
        }     
    },
    series: [{
        name: 'CT Morning',
        color: 'rgba(165,170,217,1)',
        data: [150, 73, 20,150, 73, 20,150, 73],
        pointPadding: 0.3,
        pointPlacement: -0.2
    }, {
        name: 'CT Evening',
        color: 'rgba(126,86,134,.9)',
        data: [140, 90, 40,140, 90, 40,140, 90],
        pointPadding: 0.4,
        pointPlacement: -0.2
    }, {
        name: 'Output Morning',
        color: 'rgba(248,161,63,1)',
        data: [183.6, 178.8, 198.5,183.6, 178.8, 198.5,183.6, 178.8],
        tooltip: {            
            valueSuffix: ' pcs'
        },
        pointPadding: 0.3,
        pointPlacement: 0.2,
        yAxis: 1
    }, {
        name: 'Output Evening',
        color: 'rgba(186,60,61,.9)',
        data: [203.6, 198.8, 208.5,203.6, 198.8, 208.5,203.6, 198.8],
        tooltip: {            
            valueSuffix: ' pcs'
        },
        pointPadding: 0.4,
        pointPlacement: 0.2,
        yAxis: 1
    }]
});
</script>