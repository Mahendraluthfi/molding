<script src="<?php echo base_url() ?>assets/highchart/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/exporting.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/export-data.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/drilldown.js"></script>
<div class="body_scroll">
   <div class="block-header">
    <div class="row">
        <div class="col-12">
            <h2>Detail node</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Detail Node</li>
            </ul>
            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3" style="padding: 5px;">
                <div class="card">
                    <div class="body" style="padding: 10px;">
                        <div id="mc_info">
                            
                        </div>
                    </div>
                </div>                
            </div>
            <div class="col-9" style="padding: 5px;">
                <div class="card">
                    <div class="body">
                        <div id="chart">
                                                        
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
                <h5 class="title" id="defaultModalLabel">Machine Information</h5>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect">Save</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function set() {
        $('#defaultModal').modal('show');
    }
var id = "<?php echo $this->uri->segment(3); ?>";

var chart = setInterval(
    function (){            
    $('#chart').load('<?php echo base_url() ?>home/chart/'+id).fadeIn("slow");                   
}, 5000);

var mc_info = setInterval(
    function (){            
    $('#mc_info').load('<?php echo base_url() ?>home/mcinfo/'+id).fadeIn("slow");                   
}, 3000);

</script>