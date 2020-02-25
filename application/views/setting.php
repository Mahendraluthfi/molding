<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2>Settings</h2>    
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
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
                                <h5>Shift Schedule</h5>                                
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
                                            <th>Date</th>
                                            <th>Morning</th>
                                            <th>Evening</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Morning</th>
                                            <th>Evening</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach ($shift as $data) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date('d M Y', strtotime($data->date)); ?></td>
                                                <td><?php echo $data->morning; ?></td>
                                                <td><?php echo $data->evening; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm" onclick="edit('<?php echo $data->id ?>')"><i class="zmdi zmdi-edit"></i></a>
                                                    <a href="<?php echo base_url('setting/delete/'.$data->id) ?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>

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
</div>
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Add Schedule</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('setting/submit'); ?>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label for="email_address_2">Date Start</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="date1" placeholder="Date Start">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label for="email_address_2">Date End</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="date2" placeholder="Date End">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label for="password_2">Morning</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <select class="form-control show-tick" required="" name="morning">
                                    <option value="SHIFT A">SHIFT A</option>                                    
                                    <option value="SHIFT B">SHIFT B</option>                                    
                                </select>   
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label for="password_2">Evening</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <select class="form-control show-tick" required="" name="evening">
                                    <option value="SHIFT A">SHIFT A</option>                                    
                                    <option value="SHIFT B">SHIFT B</option>                                    
                                </select>   
                            </div>
                        </div>
                    </div>                     
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default waves-effect">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title" id="defaultModalLabel">Edit Schedule</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('setting/edit_s'); ?>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label for="email_address_2">Date</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="e_date1">
                                <input type="hidden" class="form-control" name="id">
                            </div>
                        </div>
                    </div>                    
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label for="password_2">Morning</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <select class="form-control show-tick" required="" name="e_morning">
                                    <option value="SHIFT A">SHIFT A</option>                                    
                                    <option value="SHIFT B">SHIFT B</option>                                    
                                </select>   
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label for="password_2">Evening</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <select class="form-control show-tick" required="" name="e_evening">
                                    <option value="SHIFT A">SHIFT A</option>                                    
                                    <option value="SHIFT B">SHIFT B</option>                                    
                                </select>   
                            </div>
                        </div>
                    </div>                     
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

    function edit(id) {
        
        $.ajax({
            url : "<?php echo base_url('setting/edit/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                // console.log(data);
                $('[name="e_date1"]').val(data.date);
                $('[name="e_morning"]').val(data.morning);
                $('[name="e_evening"]').val(data.evening);
                $('[name="e_morning"]').trigger('change');
                $('[name="e_evening"]').trigger('change');
                $('[name="id"]').val(id);
                $('#editModal').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
</script>

