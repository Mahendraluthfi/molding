    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/highchart/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/highchart/exporting.js"></script>
    <script src="<?php echo base_url() ?>assets/highchart/export-data.js"></script>
    <script src="<?php echo base_url() ?>assets/highchart/drilldown.js"></script>
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Data Record</h2>    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Record</li>
                    </ul>                
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-menu"></i></button>
                </div>    
                <!-- <div class="col-2 text-right">
                    <a href="<?php echo base_url('record') ?>" class="btn btn-info btn-sm"><i class="zmdi zmdi-file"></i> Data</a>
                    <a href="<?php echo base_url('setting') ?>" class="btn btn-default btn-sm"><i class="zmdi zmdi-settings"></i> Settings</a>
                </div> -->            
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">                        
                        <div class="body">
                            <?php echo form_open('record/submit'); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Date" name="date" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
                                        <div class="form-group">
                                            <select class="form-control show-tick" required="" name="mc">
                                                <option value="">-- Choose MC --</option>
                                                <?php foreach ($node as $data) { ?>
                                                <option value="<?php echo $data->node_id ?>"><?php echo $data->serial_no ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding: 5px;">                                      
                                        <button type="submit" class="btn btn-sm btn-primary waves-effect m-l-20"><i class="zmdi zmdi-search"></i> Find</button> 
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="margin: 5px; padding: 5px;">Result for Node <?php echo $id ?> /Date: <?php echo date('d M Y', strtotime($date)); ?></h4>
            <div class="row">
            <div class="col-3" style="padding: 5px;">
                <div class="card">
                    <div class="body" style="padding: 10px;">
                                        
                    <div class="form-group row" style="margin-bottom: 0px;">
                        <label class="col-10">
                            <h6 class="text-primary">Machine Information</h6>                
                        </label>
                        <label class="col-2"></label>
                    </div>        
                    <div class="form-group row" style="padding: 0px; margin: 0px;">
                        <label class="col-5 text-left">Machine</label>
                        <label class="col-7 text-right"><?php echo $mc->machine_category ?></label>
                    </div>
                    <div class="form-group row" style="padding: 0px; margin: 0px;">
                        <label class="col-5 text-left">Serial No.</label>
                        <label class="col-7 text-right"><?php echo $mc->serial_no ?></label>
                    </div>
                    <div class="form-group row" style="padding: 0px; margin: 0px;">
                        <label class="col-5 text-left">Location</label>
                        <label class="col-7 text-right"><?php echo $mc->location ?></label>
                    </div>
                    <ul class="row profile_state list-unstyled">
                        <li class="col-6">
                            <div class="body bg-cyan" style="padding: 5px; margin: 2px;">
                                <i class="zmdi zmdi-chart"></i>
                                <h4 style="margin-bottom: 0px;"><?php echo $morning; ?></h4><hr color="white" style="margin: 5px; padding: 1px;">
                                <h4 style="margin-top: 0px;"><?php echo round($eff1,1) ?>%</h4>
                                <span>Morning Count</span><br>
                                <span><?php echo $sm ?></span>
                            </div>
                        </li>
                        <li class="col-6">
                            <div class="body bg-blush" style="padding: 5px; margin: 2px;">
                                   <i class="zmdi zmdi-chart"></i>
                                <h4 style="margin-bottom: 0px;"><?php echo $evening; ?></h4><hr color="white" style="margin: 5px; padding: 1px;">
                                <h4 style="margin-top: 0px;"><?php echo round($eff2,1) ?>%</h4>
                                <span>Evening Count</span><br>
                                <span><?php echo $se ?></span>
                            </div>
                        </li>
                        <li class="col-6">
                            <div class="body bg-success" style="padding: 5px; margin: 2px; color: white;">
                                <i class="zmdi zmdi-chart"></i>
                                <h4><?php echo $count; ?></h4>
                                <span>Today Count</span>
                            </div>
                        </li>            
                        <li class="col-6">
                            <div class="body bg-warning" style="padding: 5px; margin: 2px; color: white;">
                                <i class="zmdi zmdi-time"></i>
                                <h4><?php echo $avg; ?>s</h4>
                                <span>Avg. Cycle Time</span>
                            </div>
                        </li>  
                        <li class="col-12">
                            <div class="body bg-primary" style="padding: 5px; margin: 2px; color: white;">
                                <i class="zmdi zmdi-flash"></i>
                                <h4><?php echo $kwh ?> Kwh</h4>
                                <span>Today Energy Consumption</span>
                            </div>
                        </li>                                                          
                    </ul>

                                </div>
                </div>                
            </div>
            <div class="col-9" style="padding: 5px;">
                <div class="card">
                    <div class="body" style="padding: 3px;">
                        <div id="container" style="height: 300px;"></div>
                        <div id="container2" style="height: 300px;"></div>
                    </div>
                </div>
            </div>            
        </div>
        </div>
    </div>

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