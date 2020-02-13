<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="<?php echo base_url() ?>assets/highchart/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/highchart/exporting.js"></script>
	<script src="<?php echo base_url() ?>assets/highchart/export-data.js"></script>
	<script src="<?php echo base_url() ?>assets/highchart/drilldown.js"></script>
</head>
<body>
	<div id="container">
		
	</div>
<script>
	Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Summary Graph'
    },
    xAxis: {
        categories: [
            'Seattle HQ',
            'San Francisco',
            'Tokyo'
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

    },{
        min: 0,
        title: {
            text: 'Cycle Time'
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
        }
    },
    series: [{
        name: 'Mrn. CTime',
        color: 'rgba(103, 190, 230,1)',
        data: [150, 73, 20],
        pointPadding: 0.3,
        pointPlacement: -0.2       
    }, {
        name: 'Evn. CTime',
        color: 'rgba(0, 88, 171,.9)',
        data: [140, 90, 40],
        pointPadding: 0.4,
        pointPlacement: -0.2
    }, {
        name: 'Mrn.Power',
        color: 'rgba(103, 230, 118,1)',
        data: [183.6, 178.8, 198.5],
        tooltip: {
            valuePrefix: '$',
            valueSuffix: ' M'
        },
        pointPadding: 0.3,
        pointPlacement: 0.2,
        yAxis: 1
    }, {
        name: 'Evn. Power',
        color: 'rgba(15, 186, 0,.9)',
        data: [203.6, 198.8, 208.5],
        tooltip: {
            valuePrefix: '$',
            valueSuffix: ' M'
        },
        pointPadding: 0.4,
        pointPlacement: 0.2,
        yAxis: 1
    }, {
        type: 'spline',
        name: 'Mrn. Output',
        color : 'rgba(255, 230, 0)',
        data: [
        	500,650,400
        ],
        // pointPadding: 1,
        // pointPlacement: 0.2,
        yAxis: 2
    }, {
        type: 'spline',
        color : 'rgba(255, 0, 0)',        
        name: 'Evn. Output',
        data: [
        	600,450,500

        ],
        // pointPadding: 1,
        // pointPlacement: 0.2,
        yAxis: 2
       
    }]
});
</script>	
</body>
</html>