<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<script src="<?php echo base_url() ?>assets/highchart/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/exporting.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/export-data.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/drilldown.js"></script> 
<style>
    .list-group-item{
        padding: 5px;
    }       
</style>   
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Downtime Monitoring</h2>    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('downtime') ?>">Downtime Record</a></li>
                        <li class="breadcrumb-item active">Downtime Report</li>
                    </ul>                
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-menu"></i></button>
                </div>                         
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">                        
                        <div class="body">
                            <h5>Downtime Report</h5>                            
                            <?php echo form_open('downtime/report'); ?>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="date1" class="form-control datepicker" placeholder="Date Start" required="">
                                        </div>
                                    </div>                                    
                                    <i class="zmdi zmdi-code" style="margin-top:8px;"></i>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <input type="text" name="date2" class="form-control datepicker" placeholder="Date End" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1">                                        
                                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Find</button>          
                                    </div>
                                </div>
                            <?php echo form_close(); ?>                                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-4">
                                    <h5>Result Downtime / <span class="text-success"><?php echo date('d M', strtotime($d1)).'-'.date('d M', strtotime($d2)) ?></span></h5>
                                        <ul class="row profile_state list-unstyled">
                                        <li class="col" style="margin: 3px;">                                            
                                            <div class="body bg-cyan" style="color: white; padding: 8px;">
                                                <i class="zmdi zmdi-assignment" style="margin-bottom: 10px;"></i>
                                                <h5 style="margin-bottom: 0px;"><?php echo $num ?> results</h5>
                                                <h6>Count Downtime</h6>
                                            </div>
                                        </li>
                                        <li class="col" style="margin: 3px;">                                            
                                            <div class="body bg-warning" style="color: white; padding: 8px;">
                                                <i class="zmdi zmdi-watch" style="margin-bottom: 10px;"></i>
                                                <h5 style="margin-bottom: 0px;"><?php echo $total->total ?> Minutes</h5>
                                                <h6>Total Downtime</h6>
                                            </div>
                                        </li>
                                    </ul><br>
                                    <h6>Longest Downtime</h6>
                                    <ul class="list-group">
                                        <?php foreach ($long as $data) { ?>                                            
                                            <li class="list-group-item"><?php echo date('d/M', strtotime($data->date)).'; '.$data->time.'m; '.$data->reason ?></li>
                                        <?php } ?>
                                    </ul>
                                    <a href="<?php echo base_url('downtime/print/'.$d1.'/'.$d2) ?>" class="btn btn-default btn-primary" target="_blank"><i class="zmdi zmdi-download"></i> Download PDF <i class="zmdi zmdi-collection-pdf"></i></a>
                                </div>
                                <div class="col-8">
                                    <div id="container" style="height: 330px;"></div>    
                                </div>
                            </div><hr>
                            <h6 class="text-primary">Detail</h6>
                            <div class="table-responsive">
                                
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Date</th>
                                            <th>MC</th>
                                            <th width="1%">Shift</th>
                                            <th>Time</th>
                                            <th width="1%">Prod.Hours</th>
                                            <th>Reason</th>                                            
                                            <th>Input by</th>                                                                                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>MC</th>
                                            <th>Shift</th>
                                            <th>Time</th>
                                            <th>Prod.Hours</th>
                                            <th>Reason</th>                                            
                                            <th>Input by</th>                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach ($get as $data) { ?>
                                             <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date('d M Y', strtotime($data->date)); ?></td>
                                                <td><?php echo $data->mc; ?></td>
                                                <td><?php echo $data->shift; ?></td>
                                                <td><?php echo $data->time ?> Minutes</td>
                                                <td><?php echo $data->prd_hours ?></td>
                                                <td><?php echo $data->reason ?></td>
                                                <td><?php echo $data->name ?></td>                                               
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Downtime Graph'
    },    
    xAxis: {
        categories: [

            <?php foreach ($chart as $data) {
                echo "'".$data->reason."',";
            } ?>

        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Minutes (m)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} minutes</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Minutes',
        data: [
            <?php foreach ($chart as $data) {
                echo $data->total.",";
            } ?>
        ]

    }]
});</script>