<div id="container" style="height: 300px;"></div>
<div id="container2" style="height: 300px;"></div>

<script>

Highcharts.chart('container', {
    title: {
        text: 'Morning Graph'        
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
            '8th'
        ]
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Cycle Time (s)'
        }
    }, {
        title: {
            text: 'Output (pcs)'
        }
    },{
        min: 0,
        title: {
            text: 'Power (watt)'
        },
        opposite: true
    }, {
        title: {
            text: 'Energy (Kwh)'
        },
        opposite: true
    }],    
    plotOptions: {
        series: {
            animation: false
        }     
    },
    series: [{
        type: 'column',
        name: 'CycleTime',
        color: 'rgba(103, 190, 230,1)',
        data: [
            <?php echo round($jam1->jam1,1) ?>,
            <?php echo round($jam2->jam2,1) ?>,
            <?php echo round($jam3->jam3,1) ?>,
            <?php echo round($jam4->jam4,1) ?>,
            <?php echo round($jam5->jam5,1) ?>,
            <?php echo round($jam6->jam6,1) ?>,
            <?php echo round($jam7->jam7,1) ?>,
            <?php echo round($jam8->jam8,1) ?>
        ],
        tooltip: {            
            valueSuffix: ' seconds'
        }
    }, {
        type: 'column',
        name: 'Ouput',
        color: 'rgba(103, 230, 118,1)',
        data: [
             <?php echo round($op1->op1/$cc,1) ?>,
            <?php echo round($op2->op2/$cc,1) ?>,
            <?php echo round($op3->op3/$cc,1) ?>,
            <?php echo round($op4->op4/$cc,1) ?>,
            <?php echo round($op5->op5/$cc,1) ?>,
            <?php echo round($op6->op6/$cc,1) ?>,
            <?php echo round($op7->op7/$cc,1) ?>,
            <?php echo round($op8->op8/$cc,1) ?>
        ],
        yAxis: 1,
        tooltip: {            
            valueSuffix: ' pcs'
        }
    }, {
        type: 'spline',
        name: 'Power',
        color : 'rgba(255, 230, 0)',
        data: [
            <?php echo round($power1->power1,1) ?>,
            <?php echo round($power2->power2,1) ?>,
            <?php echo round($power3->power3,1) ?>,
            <?php echo round($power4->power4,1) ?>,
            <?php echo round($power5->power5,1) ?>,
            <?php echo round($power6->power6,1) ?>,
            <?php echo round($power7->power7,1) ?>,
            <?php echo round($power8->power8,1) ?>
        ],
        pointPadding: 0.3,        
        yAxis: 2,
        tooltip: {            
            valueSuffix: ' Watt'
        }
    }, {
        type: 'spline',
        name: 'Energy',
        color : 'rgba(255, 0, 0)',        
        data: [
            <?php echo round($power1->kwh1,1) ?>,
            <?php echo round($power2->kwh2,1) ?>,
            <?php echo round($power3->kwh3,1) ?>,
            <?php echo round($power4->kwh4,1) ?>,
            <?php echo round($power5->kwh5,1) ?>,
            <?php echo round($power6->kwh6,1) ?>,
            <?php echo round($power7->kwh7,1) ?>,
            <?php echo round($power8->kwh8,1) ?>    
        ],
        pointPadding: 0.4,                      
        yAxis: 3,
        tooltip: {            
            valueSuffix: ' Kwh'
        }    
    }]
});

Highcharts.chart('container2', {
    title: {
        text: 'Evening Graph'        
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
            '8th'
        ]
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Cycle Time (s)'
        }
    }, {
        title: {
            text: 'Output (pcs)'
        }
    },{
        min: 0,
        title: {
            text: 'Power (watt)'
        },
        opposite: true
    }, {
        title: {
            text: 'Energy (Kwh)'
        },
        opposite: true
    }],
    plotOptions: {
        series: {
            animation: false
        }     
    },
    series: [{
        type: 'column',
        name: 'CycleTime',
        color: 'rgba(103, 190, 230,1)',
        data: [
            <?php echo round($jam9->jam9,1) ?>,
            <?php echo round($jam10->jam10,1) ?>,
            <?php echo round($jam11->jam11,1) ?>,
            <?php echo round($jam12->jam12,1) ?>,
            <?php echo round($jam13->jam13,1) ?>,
            <?php echo round($jam14->jam14,1) ?>,
            <?php echo round($jam15->jam15,1) ?>,
            <?php echo round($jam16->jam16,1) ?>        
        ],
        tooltip: {            
            valueSuffix: ' seconds'
        }
    }, {
        type: 'column',
        name: 'Ouput',
        color: 'rgba(103, 230, 118,1)',
        data: [             
            <?php echo round($op9->op9/$cc,1) ?>,
            <?php echo round($op10->op10/$cc,1) ?>,
            <?php echo round($op11->op11/$cc,1) ?>,
            <?php echo round($op12->op12/$cc,1) ?>,
            <?php echo round($op13->op13/$cc,1) ?>,
            <?php echo round($op14->op14/$cc,1) ?>,
            <?php echo round($op15->op15/$cc,1) ?>,
            <?php echo round($op16->op16/$cc,1) ?>  
        ],
        yAxis: 1,
        tooltip: {            
            valueSuffix: ' pcs'
        }
    }, {
        type: 'spline',
        name: 'Power',
        color : 'rgba(255, 230, 0)',
        data: [
           <?php echo round($power9->power9,1) ?>,
            <?php echo round($power10->power10,1) ?>,
            <?php echo round($power11->power11,1) ?>,
            <?php echo round($power12->power12,1) ?>,
            <?php echo round($power13->power13,1) ?>,
            <?php echo round($power14->power14,1) ?>,
            <?php echo round($power15->power15,1) ?>,
            <?php echo round($power16->power16,1) ?>
        ],
        pointPadding: 0.3,        
        yAxis: 2,
        tooltip: {            
            valueSuffix: ' Watt'
        }
    }, {
        type: 'spline',
        name: 'Energy',
        color : 'rgba(255, 0, 0)',        
        data: [
           <?php echo round($power9->kwh9,1) ?>,
            <?php echo round($power10->kwh10,1) ?>,
            <?php echo round($power11->kwh11,1) ?>,
            <?php echo round($power12->kwh12,1) ?>,
            <?php echo round($power13->kwh13,1) ?>,
            <?php echo round($power14->kwh14,1) ?>,
            <?php echo round($power15->kwh15,1) ?>,
            <?php echo round($power16->kwh16,1) ?>
        ],
        pointPadding: 0.4,                      
        yAxis: 3,
        tooltip: {            
            valueSuffix: ' Kwh'
        }    
    }]
});
</script>