<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2>Coordinators</h2>    
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Coordinators</li>
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
                        <div class="row clearfix">
                            <div class="col">
                                <h5>Data Coordinator</h5>                                
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary" onclick="add()"><i class="zmdi zmdi-plus"></i> ADD</button>                                
                            </div>
                        </div>
                         <div class="table-responsive">
                            <?php echo $this->session->flashdata('msg'); ?>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>EPF</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>EPF</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach ($get as $data) { ?>
                                             <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data->epf; ?></td>
                                                <td><?php echo $data->name; ?></td>
                                                <td><?php 
                                                    if ($data->status == 1) {
                                                        echo '<button type="button" class="btn btn-success btn-sm">Active</button>';
                                                    }else{
                                                        echo '<button type="button" class="btn btn-secondary btn-sm">Inactive</button>';                                    
                                                    }
                                                 ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('coordinator/delete/'.$data->epf) ?>" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>
                                                </td>
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

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Add Coordinator</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('coordinator/add', array('class' => 'form-horizontal')); ?>                 
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label for="email_address_2">EPF Number</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="epf" class="form-control" placeholder="Enter EPF Number" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label for="password_2">Name</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Enter Employee Name" required="">
                            </div>
                        </div>
                    </div>

            <h6 class="text-danger">* Password default by EPF Number</h6>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default waves-effect">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    function add() {
        $('#defaultModal').modal('show');
    }

</script>