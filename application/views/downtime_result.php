<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    
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
        </div>
    </div>



