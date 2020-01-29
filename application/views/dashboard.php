
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-12">
                    <h2>Dashboard IoT</h2>                    
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
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