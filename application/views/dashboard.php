    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-10">
                    <h2>Dashboard Molding IoT</h2>                    
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-menu"></i></button>
                </div>    
                <div class="col-2 text-right">
                    <a href="<?php echo base_url('record') ?>" class="btn btn-info btn-sm"><i class="zmdi zmdi-file"></i> Data</a>
                    <a href="<?php echo base_url('setting') ?>" class="btn btn-default btn-sm"><i class="zmdi zmdi-settings"></i> Settings</a>
                </div>            
            </div>
        </div>
        <div class="container-fluid">
            <div id="machineload">
                
            </div>            
        </div>
    </div>

<script>
    var machineload = setInterval(
        function (){            
            $('#machineload').load('<?php echo base_url() ?>home/machineload').fadeIn("slow");                   
        }, 3000);
</script>