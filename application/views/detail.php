<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<div class="body_scroll">
   <div class="block-header">
    <div class="row">
        <div class="col-12">
            <h2>Detail node</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="zmdi zmdi-home"></i> Dashbaord</a></li>
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
                    <div class="body">
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

<script>
var id = "<?php echo $this->uri->segment(3); ?>";

var chart = setInterval(
    function (){            
    $('#chart').load('<?php echo base_url() ?>home/chart/'+id).fadeIn("slow");                   
}, 3000);

var mc_info = setInterval(
    function (){            
    $('#mc_info').load('<?php echo base_url() ?>home/mcinfo/'+id).fadeIn("slow");                   
}, 3000);

</script>