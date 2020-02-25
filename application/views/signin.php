<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Molding Dashboard</title>
<!-- Favicon-->
<link rel="icon" href="<?php echo base_url() ?>assets/images/mas_icon.png" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">    
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <?php echo form_open('login/submit', array('class' => 'card auth_form')); ?>
                    <div class="header">
                        <img class="logo" src="<?php echo base_url() ?>assets/images/mas_icon.png" alt="">
                        <!-- <h5>Log in</h5> -->
                        <h5>Molding Dashboard</h5>
                    </div>
                    <div class="body">                        
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username / EPF" name="username">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>                            
                        </div>
                        <!-- <div class="checkbox">
                            <input id="remember_me" type="checkbox">
                            <label for="remember_me">Remember Me</label>
                        </div> -->
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>                        
                        <?php echo $this->session->flashdata('msg'); ?>                  
                        <div class="signin_with mt-3">
                                <!-- <p class="mb-0">or Sign Up using</p>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button> -->
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Developed by Sumbiri Autonomation</span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="<?php echo base_url() ?>assets/images/signin.svg" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo base_url() ?>assets/bundles/libscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>
</html>