<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Soldering Monitoring</h2>    
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Soldering Record</li>
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
                                    <h5>Date, <?php echo $date ?></h5>
                                </div>
                                <div class="col text-right">
                                    <div class="row clearfix">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <button type="button" class="btn btn-primary mb-3" onclick="add()"><i class="zmdi zmdi-plus"></i> Add TM</button>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <?php echo form_open('soldering/submit'); ?>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" placeholder="Date" name="date" required="">
                                                    <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Find</button>
                                                    </div>
                                                </div>                                                                                       
                                            <?php echo form_close(); ?>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th width="1%">No</th>
                                            <th>TM</th>
                                            <th>1st</th>
                                            <th>2nd</th>
                                            <th>3rd</th>                                            
                                            <th>4th</th>                                            
                                            <th>5th</th>                                            
                                            <th>6th</th>                                            
                                            <th>7th</th>                                            
                                            <th>8th</th>                                            
                                            <th>9th</th>                                            
                                            <th>10th</th>                                            
                                            <th>11th</th>                                            
                                            <th>Total</th>                                            
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                        <?php
                                        $tjam1 = 0;
                                        $tjam2 = 0;
                                        $tjam3 = 0;
                                        $tjam4 = 0;
                                        $tjam5 = 0;
                                        $tjam6 = 0;
                                        $tjam7 = 0;
                                        $tjam8 = 0;
                                        $tjam9 = 0;
                                        $tjam10 = 0;
                                        $tjam11 = 0;
                                        $ttl = 0;
                                         $no=1; foreach ($get as $data) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>    
                                            <td><?php echo $data->nama ?></td>    
                                            <td contenteditable="true" onblur="savethis(this,'jam1','<?php echo $data->id ?>')"><?php echo $data->jam1 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam2','<?php echo $data->id ?>')"><?php echo $data->jam2 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam3','<?php echo $data->id ?>')"><?php echo $data->jam3 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam4','<?php echo $data->id ?>')"><?php echo $data->jam4 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam5','<?php echo $data->id ?>')"><?php echo $data->jam5 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam6','<?php echo $data->id ?>')"><?php echo $data->jam6 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam7','<?php echo $data->id ?>')"><?php echo $data->jam7 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam8','<?php echo $data->id ?>')"><?php echo $data->jam8 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam9','<?php echo $data->id ?>')"><?php echo $data->jam9 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam10','<?php echo $data->id ?>')"><?php echo $data->jam10 ?></td> 
                                            <td contenteditable="true" onblur="savethis(this,'jam11','<?php echo $data->id ?>')"><?php echo $data->jam11 ?></td> 
                                            <td><?php echo $data->jam1+$data->jam2+$data->jam3+$data->jam4+$data->jam5+$data->jam6+$data->jam7+$data->jam8+$data->jam9+$data->jam10+$data->jam11 ?></td>                                                
                                        </tr>
                                        <?php
                                        $tjam1 = $tjam1 + $data->jam1;
                                        $tjam2 = $tjam2 + $data->jam2;
                                        $tjam3 = $tjam3 + $data->jam3;
                                        $tjam4 = $tjam4 + $data->jam4;
                                        $tjam5 = $tjam5 + $data->jam5;
                                        $tjam6 = $tjam6 + $data->jam6;
                                        $tjam7 = $tjam7 + $data->jam7;
                                        $tjam8 = $tjam8 + $data->jam8;
                                        $tjam9 = $tjam9 + $data->jam9;
                                        $tjam10 = $tjam10 + $data->jam10;
                                        $tjam11 = $tjam11+ $data->jam11;
                                         } ?>
                                        <tr>
                                            <td class="text-center" colspan="2">Total</td>
                                            <td><?php echo $tjam1 ?></td>
                                            <td><?php echo $tjam2 ?></td>
                                            <td><?php echo $tjam3 ?></td>
                                            <td><?php echo $tjam4 ?></td>
                                            <td><?php echo $tjam5 ?></td>
                                            <td><?php echo $tjam6 ?></td>
                                            <td><?php echo $tjam7 ?></td>
                                            <td><?php echo $tjam8 ?></td>
                                            <td><?php echo $tjam9 ?></td>
                                            <td><?php echo $tjam10 ?></td>
                                            <td><?php echo $tjam11 ?></td>
                                            <td><?php echo $tjam1+$tjam2+$tjam3+$tjam4+$tjam5+$tjam6+$tjam7+$tjam8+$tjam9+$tjam10+$tjam11 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="<?php echo base_url('soldering/download/'.$date) ?>" class="btn btn-primary" target="_blank"><i class="zmdi zmdi-print"></i> Print PDF</a>      
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
                <h4 class="title" id="defaultModalLabel">Add Team Member</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('class' => 'form-horizontal','id' => 'frm')); ?>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label>EPF</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control epf" placeholder="EPF Number" name="epf">
                                <input type="hidden" name="date" value="<?php echo $date ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-3 form-control-label">
                            <label>Name</label>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control name" placeholder="Name" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-9 offset-sm-3"></div>
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect btn-act">Save</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered js-basic-example dataTable">
                        <thead>
                            <tr class="active">
                                <th>EPF</th>
                                <th>Name</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tm as $data) { ?>
                            <tr>
                                <td><?php echo $data->epf ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" onclick="edit('<?php echo $data->epf ?>','<?php echo $data->nama ?>')"><i class="zmdi zmdi-edit"></i></button>
                                    <a href="<?php echo base_url('soldering/deltm/'.$data->epf) ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
               <!--  <button type="button" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    function add() {
        $('#frm')[0].reset();
        $('#frm').attr('action','<?php echo base_url('soldering/add') ?>');
        $('.epf').removeAttr('readonly','');
        $('.btn-act').text('Save');
        $('.btn-act').removeClass('btn-success');
        $('.btn-act').addClass('btn-primary');
        $('#defaultModal').modal('show');
    }

    function edit(epf,name) {
        $('.epf').val(epf);
        $('.name').val(name);
        $('#frm').attr('action','<?php echo base_url('soldering/edit') ?>');        
        $('.epf').attr('readonly','');
        $('.btn-act').text('Edit');
        $('.btn-act').removeClass('btn-primary');
        $('.btn-act').addClass('btn-success');

    }

   function savethis(obj,column,id) {
       // alert(obj.innerHTML);
       $.ajax({
            url : "<?php echo base_url('soldering/update/')?>"+obj.innerHTML+'/'+column+'/'+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {                                    
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
   }
</script>
