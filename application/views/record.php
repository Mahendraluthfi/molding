    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Data Record</h2>    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
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
        </div>
    </div>
