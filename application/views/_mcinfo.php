    
        <h5 class="text-center">Machine Information</h5>
        <div class="form-group row">
            <label class="col-5 text-left mt-2">Status</label>
            <label class="col-7 text-right"><button type="button" class="btn <?php echo $btn ?> btn-sm"><i class="zmdi zmdi-power"></i> <?php echo $sts ?></button></label>
        </div>
        <div class="form-group row">
            <label class="col-5 text-left">Machine</label>
            <label class="col-7 text-right"><?php echo $mc->machine_category ?></label>
        </div>
        <div class="form-group row">
            <label class="col-5 text-left">Serial No.</label>
            <label class="col-7 text-right"><?php echo $mc->serial_no ?></label>
        </div>
        <div class="form-group row">
            <label class="col-5 text-left">Location</label>
            <label class="col-7 text-right"><?php echo $mc->location ?></label>
        </div>
        <ul class="row profile_state list-unstyled">
            <li class="col-12" style="margin-bottom: 5px;">
                <div class="body bg-cyan" style="padding: 5px;">
                    <i class="zmdi zmdi-chart"></i>
                    <h4><?php echo $count; ?></h4>
                    <span>Today Count</span>
                </div>
            </li>
            <li class="col-12" style="margin-bottom: 5px;">
                <div class="body bg-warning" style="padding: 5px; color: white;">
                    <i class="zmdi zmdi-time"></i>
                    <h4><?php echo $avg; ?></h4>
                    <span>Average Cycle Time</span>
                </div>
            </li>                                                            
        </ul>
    