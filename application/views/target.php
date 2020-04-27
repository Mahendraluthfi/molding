<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Target Monitoring</h2>    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Target</li>
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
                                <div class="col-8">
                                    <h5>Monitoring, <?php echo $date ?></h5>                                
                                </div>                                
                                <div class="col-4 text-right">
                                    <?php echo form_open('target/index'); ?>
                                    <div class="input-group">
                                        <input type="date" name="date" class="form-control" style="height: 33px; margin-top: 5px;" placeholder="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Find</button>
                                            <button type="button" class="btn btn-default bg-light-green" onclick="add()"><i class="zmdi zmdi-plus"></i> New</button>
                                        </div>
                                    </div>                                                   
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                            <?php echo $this->session->flashdata('msg'); ?>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>MC</th>
                                            <th>Style</th>
                                            <th>Time</th>
                                            <th>Count/Cycle</th>                                            
                                            <th>Size</th>                                            
                                            <th>Qty/Kanban</th>                                            
                                            <th>#</th>          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>MC</th>
                                            <th>Style</th>
                                            <th>Time</th>
                                            <th>Count Cycle</th>                                            
                                            <th>Size</th>                                            
                                            <th>Qty/Kanban</th>
                                            <th>#</th>                                                   
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no=1; foreach ($get as $data) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data->serial_no ?></td>
                                                <td><?php echo $data->style ?></td>
                                                <td>
                                                    <?php if ($data->end == null){ 
                                                        echo date('H:i', strtotime($data->start));
                                                    }else{
                                                        echo date('H:i', strtotime($data->start)).'-'.date('H:i', strtotime($data->end));
                                                    } ?>
                                                </td>
                                                <td><?php echo $data->cc ?></td>
                                                <td><?php echo $data->size ?></td>
                                                <td><?php echo $data->qty ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="detail('<?php echo $data->id ?>')"><i class="zmdi zmdi-zoom-in"></i></button>
                                                    <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?php echo $data->id ?>')"><i class="zmdi zmdi-edit"></i></button>
                                                    <a href="<?php echo base_url('target/delete/'.$data->id) ?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>
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
                <h5 class="title" id="defaultModalLabel">Add Plan Target</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open('target/add', array('class' => 'form-horizontal','id' => 'frm')); ?>                 
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
                            <label>Machine</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <select class="form-control show-tick ms select2" required="" name="mc">
                                    <option value="" selected="">-- Choose MC --</option>
                                    <?php foreach ($node as $data) { ?>
                                    <option value="<?php echo $data->node_id ?>"><?php echo $data->serial_no ?></option>
                                    <?php } ?>
                                </select>
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
                            <label>Style</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="style" placeholder="Style">
                            </div>
                        </div>
                    </div> 
                     <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Size</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="size" placeholder="Size">
                            </div>
                        </div>
                    </div>                          
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Colour</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="colour" placeholder="Colour">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Count/Cycle</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="number" class="form-control" name="cc" placeholder="Count/Cycle" min="0" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Qty/Kanban</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input type="number" class="form-control" name="qty" placeholder="Qty/Kanban" min="0" required="">
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            <label>Prod.Hours</label>
                        </div>
                        <div class="col-2 form-control-label">
                            <label>Start</label>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="time" class="form-control" name="start">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-4 form-control-label">
                            
                        </div>
                        <div class="col-2 form-control-label">
                            <label>End</label>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="time" class="form-control" name="end">
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
</div>
<style>
    .dt{
        font-weight: bold;
    }
</style>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Monitoring</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td width="40%" class="dt">Date</td>
                                <td><span class="date"></span></td>
                            </tr>
                            <tr>
                                <td class="dt">MC</td>
                                <td><span class="mc"></span></td>
                            </tr>
                            <tr>
                                <td class="dt">Shift</td>
                                <td><span class="shift"></span></td>
                            </tr>
                            <tr>
                                <td class="dt">Style</td>
                                <td><span class="style"></span></td>
                            </tr>
                            <tr>
                                <td class="dt">Size</td>
                                <td><span class="size"></span></td>
                            </tr>
                            <tr>
                                <td class="dt">Colour</td>
                                <td><span class="colour"></span></td>
                            </tr>
                            <tr>
                                <td class="dt">Qty/Kanban</td>
                                <td><span class="qty"></span></td>
                            </tr>
                            <tr>
                                <td class="dt">Count/Cycle</td>
                                <td><span class="cc"></span></td>
                            </tr>                            
                        </table>
                    </div>
                    <div class="col">
                        <h5 class="time"></h5>
                        <ul class="row profile_state list-unstyled">
                            <li class="col-6">
                                <div class="body bg-cyan" style="padding: 10px;">
                                    <i class="zmdi zmdi-chart"></i>
                                    <h5>Output</h5>
                                    <h5 class="output"></h5>                                                                
                                </div>
                            </li>
                            <li class="col-6">
                                <div class="body bg-orange" style="padding: 10px;">
                                    <i class="zmdi zmdi-chart-donut"></i>
                                    <h5>Eff</h5>
                                    <h5 class="eff"></h5>                                                                
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script>
    function add() {
        $("#frm")[0].reset();            
        $('#frm').attr('action','<?php echo base_url('target/add') ?>'); 
        $('.title').text('Add Plan Target');   
        $('#defaultModal').modal('show');
    }

    function edit(id) {
         $.ajax({
            url : "<?php echo base_url('target/get/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                // console.log(data);
                $('#frm').attr('action','<?php echo base_url('target/edit/') ?>'+id);
                $('[name="date"]').val(data.date);
                $('.title').text('Edit Target Plan');   
                $('[name="shift"]').val(data.shift);
                $('[name="mc"]').val(data.node_id);                
                $('[name="size"]').val(data.size);                
                $('[name="style"]').val(data.style);                
                $('[name="qty"]').val(data.qty);                
                $('[name="cc"]').val(data.cc);                
                $('[name="start"]').val(data.start);
                $('[name="end"]').val(data.end);
                $('[name="colour"]').val(data.colour);                
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

    function detail(id) {
         $.ajax({
            url : "<?php echo base_url('target/get_id/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                // console.log(data);    
                if (data.end == "00:00:00") {
                    $('.time').text('Time Plan, '+data.start);
                }else{
                    $('.time').text('Time Plan, '+data.start+'-'+data.end);
                }  
                $('.date').text(data.date);          
                $('.mc').text(data.serial_no);          
                $('.size').text(data.size);          
                $('.shift').text(data.shift);          
                $('.colour').text(data.colour);          
                $('.cc').text(data.cc);          
                $('.qty').text(data.qty);          
                $('.style').text(data.style);          
                $('#largeModal').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
         $.ajax({
            url : "<?php echo base_url('target/get_output/')?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data2)
            {
                console.log(data2);
                $('.output').text(data2.output);
                $('.eff').text(data2.eff+' %');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
</script>

