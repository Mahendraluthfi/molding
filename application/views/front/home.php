<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Dashboard IoT Molding</title>
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
                <div class="col-10">
                    <h2>Dashboard Molding IoT</h2>                                        
                </div>    
                <div class="col-2 text-right">
                    <a href="<?php echo base_url('login') ?>" class="btn btn-success"><i class="zmdi zmdi-sign-in"></i> Login</a>
                </div>            
            </div>
        </div>
        <div class="container-fluid">
             <div id="machineload">
                
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
</body>
</html>