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
                        <h5 class="text-center">Machine Information</h5>
                        <ul class="row profile_state list-unstyled">
                            <li class="col-12" style="margin-bottom: 5px;">
                                <div class="body bg-cyan" style="padding: 5px;">
                                    <i class="zmdi zmdi-chart"></i>
                                    <h4>2,365</h4>
                                    <span>Today Count</span>
                                </div>
                            </li>
                            <li class="col-12" style="margin-bottom: 5px;">
                                <div class="body bg-warning" style="padding: 5px; color: white;">
                                    <i class="zmdi zmdi-time"></i>
                                    <h4>2,365</h4>
                                    <span>Average Cycle Time</span>
                                </div>
                            </li>                                                            
                        </ul>
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

var chart = setInterval(
    function (){            
    $('#chart').load('<?php echo base_url() ?>home/chart').fadeIn("slow");                   
}, 3000);

</script>