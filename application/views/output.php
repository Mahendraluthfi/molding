<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Output Monitoring</h2>    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Output Record</li>
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
                            <div class="row clearfix">
                                <div class="col">
                                    <h5>Date, <?php echo date('d M Y'); ?></h5>
                                </div>
                                <div class="col text-right">
                                    <?php echo form_open('output/submit'); ?>
                                        <div class="row clearfix">
                                            <div class="col-lg-5 col-md-5 col-sm-5"></div>
                                            <div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
                                                <div class="form-group">
                                                    <input type="text" class="form-control datepicker" placeholder="Date" name="date" required="">
                                                </div>                                                
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2" style="padding: 5px;">                                      
                                                <button type="submit" class="btn btn-sm btn-primary waves-effect m-l-20"><i class="zmdi zmdi-search"></i> Find</button> 
                                            </div>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                            <ul class="nav nav-tabs p-0 mb-3">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#morning">Morning</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#evening">Evening</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#total">Total</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="morning">                                    
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th width="1%">No</th>
                                            <th>MC</th>
                                            <th>1st</th>
                                            <th>2nd</th>
                                            <th>3rd</th>                                            
                                            <th>4th</th>                                            
                                            <th>5th</th>                                            
                                            <th>6th</th>                                            
                                            <th>7th</th>                                            
                                            <th>8th</th>                                            
                                            <th>Total</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-secondary text-white">                                            
                                            <th>No</th>
                                            <th>MC</th>
                                            <th>1st</th>
                                            <th>2nd</th>
                                            <th>3rd</th>                                            
                                            <th>4th</th>                                            
                                            <th>5th</th>                                            
                                            <th>6th</th>                                            
                                            <th>7th</th>                                            
                                            <th>8th</th>                                            
                                            <th>Total</th>                                                                                    
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach ($get as $data) { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->serial_no ?></td>
                                                <td><?php echo $data->jam1->op1/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam2->op2/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam3->op3/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam4->op4/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam5->op5/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam6->op6/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam7->op7/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam8->op8/$data->count_cycle ?></td>
                                                <td><?php echo $data->morning->today/$data->count_cycle ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a href="<?php echo base_url('output/download/1/'.date('Y-m-d')) ?>" class="btn btn-primary" target="_blank"><i class="zmdi zmdi-print"></i> Print PDF</a>                                
                                </div>
                                <div role="tabpanel" class="tab-pane" id="evening">
                                    <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th width="10">No</th>
                                            <th>MC</th>
                                            <th>1st</th>
                                            <th>2nd</th>
                                            <th>3rd</th>                                            
                                            <th>4th</th>                                            
                                            <th>5th</th>                                            
                                            <th>6th</th>                                            
                                            <th>7th</th>                                            
                                            <th>8th</th>                                            
                                            <th>Total</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-secondary text-white">                                            
                                            <th>No</th>
                                            <th>MC</th>
                                            <th>1st</th>
                                            <th>2nd</th>
                                            <th>3rd</th>                                            
                                            <th>4th</th>                                            
                                            <th>5th</th>                                            
                                            <th>6th</th>                                            
                                            <th>7th</th>                                            
                                            <th>8th</th>                                            
                                            <th>Total</th>                                                                                    
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach ($get as $data) { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->serial_no ?></td>
                                                <td><?php echo $data->jam9->op9/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam10->op10/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam11->op11/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam12->op12/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam13->op13/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam14->op14/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam15->op15/$data->count_cycle ?></td>
                                                <td><?php echo $data->jam16->op16/$data->count_cycle ?></td>
                                                <td><?php echo $data->evening->today/$data->count_cycle ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a href="<?php echo base_url('output/download/2/'.date('Y-m-d')) ?>" class="btn btn-primary" target="_blank"><i class="zmdi zmdi-print"></i> Print PDF</a>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="total">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th width="10">No</th>
                                            <th>MC</th>
                                            <th>Morning</th>
                                            <th>Evening</th>
                                            <th>Total</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="bg-secondary text-white">
                                            <th width="10">No</th>
                                            <th>MC</th>
                                            <th>Morning</th>
                                            <th>Evening</th>
                                            <th>Total</th>                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1; foreach ($get as $data) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data->serial_no ?></td>                                            
                                            <td><?php echo $data->morning->today/$data->count_cycle ?></td>
                                            <td><?php echo $data->evening->today/$data->count_cycle ?></td>
                                            <td><?php echo ($data->morning->today/$data->count_cycle)+($data->evening->today/$data->count_cycle) ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <a href="<?php echo base_url('output/download/3/'.date('Y-m-d')) ?>" class="btn btn-primary" target="_blank"><i class="zmdi zmdi-print"></i> Print PDF</a>                                
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

