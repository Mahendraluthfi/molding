<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Downtime Monitoring</h2>    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Downtime Record</li>
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
                                <h5>Downtime Records</h5>                                
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo base_url('downtime/report') ?>" class="btn btn-success"><i class="zmdi zmdi-file"></i> Report</a>                                
                                <button type="button" class="btn btn-primary" onclick="add()"><i class="zmdi zmdi-plus"></i> New</button>                                
                            </div>
                        </div>
                         <div class="table-responsive">
                            <?php echo $this->session->flashdata('msg'); ?>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Date</th>
                                            <th width="1%">Shift</th>
                                            <th>Time</th>
                                            <th width="1%">Prod.Hours</th>
                                            <th>Reason</th>                                            
                                            <th>Input by</th>                                            
                                            <th>#</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Shift</th>
                                            <th>Time</th>
                                            <th>Prod.Hours</th>
                                            <th>Reason</th>                                            
                                            <th>Input by</th>                                            
                                            <th>#</th>                                                   
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach ($get as $data) { ?>
                                             <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo date('d M Y', strtotime($data->date)); ?></td>
                                                <td><?php echo $data->shift; ?></td>
                                                <td><?php echo $data->time ?> Minutes</td>
                                                <td><?php echo $data->prd_hours ?></td>
                                                <td><?php echo $data->reason ?></td>
                                                <td><?php echo $data->name ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?php echo $data->id ?>')"><i class="zmdi zmdi-edit"></i></button>
                                                    <a href="<?php echo base_url('downtime/delete/'.$data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure ?')"><i class="zmdi zmdi-delete"></i></button>
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
                <h5 class="title" id="defaultModalLabel">Add Downtime Report</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('downtime/add', array('class' => 'form-horizontal','id' => 'frm')); ?>                 
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Date</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Shift</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select name="shift" class="form-control show-tick ms select2" required="">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                        </div>
                    </div>                          
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Machine</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select class="form-control show-tick ms select2" required="" name="mc">
                                    <option value="" selected="">-- Choose MC --</option>
                                    <?php foreach ($node as $data) { ?>
                                    <option value="<?php echo $data->serial_no ?>"><?php echo $data->serial_no ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>   
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Prod.Hours</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="number" class="form-control" name="prd" min="1" max="8" placeholder="Production Hours" required="">
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Time/minutes</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="number" class="form-control" name="time" min="1" placeholder="Duration time" required="">                                
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Reason</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select class="form-control show-tick ms select2" required="" name="reason" required="">
                                    <option value="" selected="">-- Choose Reason --</option>                                    
                                    <optgroup label="Machine Downtime">
                                        <option value="Head Change">Head Change</option>
                                        <option value="Clamp Change">Clamp Change</option>
                                        <option value="Head & Female Adjustment">Head & Female Adjustment</option>
                                        <option value="Colour Change">Colour Change</option>
                                        <option value="Size Change">Size Change</option>
                                        <option value="Reset due to not meet Approved Hanger">Reset due to not meet Approved Hanger</option>
                                        <option value="Batch Change">Batch Change</option>
                                        <option value="Ring Mark">Ring Mark</option>
                                        <option value="Over heat depth issue">Over heat depth issue</option>
                                        <option value="Looseness Issue">Looseness Issue</option>
                                        <option value="Setting Sample">Setting Sample</option>
                                        <option value="Change Samura Fabric">Change Samura Fabric</option>                                        
                                    </optgroup>
                                    <optgroup label="Material Downtime">
                                        <option value="No Cutwork">No Cutwork</option>
                                        <option value="Wait Recut">Wait Recut</option>
                                    </optgroup>
                                    <optgroup label="Man Downtime">
                                        <option value="No Operator">No Operator</option>
                                        <option value="Soldering Problem">Soldering Problem</option>                                        
                                    </optgroup>
                                    <optgroup label="Other Downtime">
                                        <option value="Electrical Failure">Electrical Failure</option>
                                        <option value="Compressed Failure">Compressed Failure</option>                                        
                                        <option value="Meeting">Meeting</option>                                        
                                        <option value="Trial Pilot">Trial Pilot</option>                                        
                                    </optgroup>                                    
                                </select>
                            </div>
                        </div>
                    </div>  
 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info waves-effect">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    function add() {
        $("#frm")[0].reset();
        $('#frm').attr('action','<?php echo base_url('downtime/add') ?>'); 
        $('.title').text('Add Downtime Report');   
        $('#defaultModal').modal('show');
    }

    function edit(id) {
         $.ajax({
            url : "<?php echo base_url('downtime/get/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                // console.log(data);
                $('#frm').attr('action','<?php echo base_url('downtime/edit/') ?>'+id);
                $('[name="date"]').val(data.date);
                $('.title').text('Edit Downtime Report');   
                $('[name="shift"]').val(data.shift);
                $('[name="mc"]').val(data.mc);
                $('[name="prd"]').val(data.prd_hours);
                $('[name="time"]').val(data.time);
                $('[name="reason"]').val(data.reason);
                $('[name="reason"]').trigger('change');
                $('[name="mc"]').trigger('change');
                $('[name="shift"]').trigger('change');
                $('#defaultModal').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
</script>
