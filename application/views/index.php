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
<!-- Custom Css -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
<link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/select2.css" />
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

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->

<!-- Right Icon menu Sidebar -->
<!-- <div class="navbar-right">
    <ul class="navbar-nav">
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a href="<?php echo base_url('login/logout') ?>" onclick="return confirm('Are you sure ?')" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div> -->

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/images/logo-big2.png" height="30" class="ml-2" alt="Aero"></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="#"><img src="<?php echo base_url() ?>assets/images/logo-admin.png" alt="User" height="32" width="25"></a>
                    <div class="detail" style="text-align: left;">
                        <h4><?php echo strtoupper($this->session->userdata('username')); ?></h4>
                        <small><?php echo $this->session->userdata('level'); ?></small>                        
                    </div>
                </div>
            </li>
            <li><a href="<?php echo base_url('home') ?>"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="<?php echo $this->session->userdata('downtime_link') ?>"><i class="zmdi zmdi-watch"></i><span>Downtime Monitoring</span></a></li>                                
            <li><a href="#"><i class="zmdi zmdi-tag"></i><span>Output Monitoring</span></a></li>                                
            <li><a href="#"><i class="zmdi zmdi-badge-check"></i><span>Target Monitoring</span></a></li>                                
            <li><a href="<?php echo $this->session->userdata('coo_link') ?>"><i class="zmdi zmdi-assignment-account"></i><span>Coordinators</span></a></li>                                
            <li><a href="<?php echo base_url('login/logout') ?>" onclick="return confirm('Are you sure ?')"><i class="zmdi zmdi-power"></i><span>Logout</span></a></li>
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li> -->
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>                
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox rtl_support">
                                <input id="checkbox1" type="checkbox" value="rtl_view">
                                <label for="checkbox1">RTL Version</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox ms_bar">
                                <input id="checkbox2" type="checkbox" value="mini_active">
                                <label for="checkbox2">Mini Sidebar</label>
                            </div>
                        </li>                       
                    </ul>
                </div>                
            </div>                
        </div>           
    </div>
</aside>

<!-- Main Content -->
<section class="content">
    <?php $this->load->view($content); ?>
</section>
<!-- Jquery Core Js --> 
<script src="<?php echo base_url() ?>assets/bundles/libscripts.bundle.js"></script> 
<script src="<?php echo base_url() ?>assets/bundles/vendorscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/bundles/datatablescripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js"></script> 

<script src="<?php echo base_url() ?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>

<script src="<?php echo base_url() ?>assets/js/pages/forms/advanced-form-elements.js"></script> 
    <script src="<?php echo base_url() ?>assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
<!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 
    <script>
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'YYYY-MM-DD',
            // clearButton: true,
            weekStart: 1,
            nowButton: true,
            time: false
        });
    </script>
</body>
</html>