<div id="container">
                                
</div>

<script>

Highcharts.chart('container', {
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
            '8th'
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
    plotOptions: {
        series: {
            animation: false
        }     
    },
    series: [{
        type: 'column',
        name: 'Morning CycleTime',
        data: [
            <?php echo round($jam1->jam1,1) ?>,
            <?php echo round($jam2->jam2,1) ?>,
            <?php echo round($jam3->jam3,1) ?>,
            <?php echo round($jam4->jam4,1) ?>,
            <?php echo round($jam5->jam5,1) ?>,
            <?php echo round($jam6->jam6,1) ?>,
            <?php echo round($jam7->jam7,1) ?>,
            <?php echo round($jam8->jam8,1) ?>
        ]
    }, {
        type: 'column',
        name: 'Evening CycleTime',
        data: [

            <?php echo round($jam9->jam9,1) ?>,
            <?php echo round($jam10->jam10,1) ?>,
            <?php echo round($jam11->jam11,1) ?>,
            <?php echo round($jam12->jam12,1) ?>,
            <?php echo round($jam13->jam13,1) ?>,
            <?php echo round($jam14->jam14,1) ?>,
            <?php echo round($jam15->jam15,1) ?>,
            <?php echo round($jam16->jam16,1) ?> 
        ]
    }, {
        type: 'spline',
        name: 'Morning Output',
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
        pointPadding: 0.3,
        pointPlacement: 0.2,
        yAxis: 1
    }, {
        type: 'spline',
        name: 'Evening Output',
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
        pointPadding: 0.4,
        pointPlacement: 0.2,
        yAxis: 1
       
    }]
});

</script>