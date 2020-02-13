<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Home</title>
<!-- Favicon-->
<!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
<link rel="icon" href="<?php echo base_url() ?>assets/images/mas_icon.png" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
</head>

<body class="theme-cyan right_icon_toggle">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo base_url() ?>assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Main Content -->
<section class="content" style="margin: 10px;">
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
                    <div class="body" style="padding: 3px;">
                        <div id="chart">
                                                        
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>

</section>
<script>
    var machineload = setInterval(
        function (){            
            $('#machineload').load('<?php echo base_url() ?>front/machineload').fadeIn("slow");                   
        }, 3000);
</script>
<!-- Jquery Core Js --> 
<script src="<?php echo base_url() ?>assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="<?php echo base_url() ?>assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="<?php echo base_url() ?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/exporting.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/export-data.js"></script>
<script src="<?php echo base_url() ?>assets/highchart/drilldown.js"></script>
<script>
    function set() {
        $('#defaultModal').modal('show');
    }
var id = "<?php echo $this->uri->segment(3); ?>";

var chart = setInterval(
    function (){            
    $('#chart').load('<?php echo base_url() ?>front/chart/'+id).fadeIn("slow");                   
}, 5000);

var mc_info = setInterval(
    function (){            
    $('#mc_info').load('<?php echo base_url() ?>front/mcinfo/'+id).fadeIn("slow");                   
}, 3000);

</script>
</body>
</html>
