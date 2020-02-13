    
        <div class="form-group row" style="margin-bottom: 0px;">
            <label class="col-10">
                <h6 class="text-primary">Machine Information</h6>                
            </label>
        </div>
        <div class="form-group row" style="margin: 0px; padding: 0px;">
            <label class="col-5 text-left mt-2">Status</label>
            <label class="col-7 text-right"><button type="button" class="btn <?php echo $btn ?> btn-sm"><i class="zmdi zmdi-power"></i> <?php echo $sts ?></button></label>
        </div>
        <div class="form-group row" style="padding: 0px; margin: 0px;">
            <label class="col-5 text-left">Machine</label>
            <label class="col-7 text-right"><?php echo $mc->machine_category ?></label>
        </div>
        <div class="form-group row" style="padding: 0px; margin: 0px;">
            <label class="col-5 text-left">Serial No.</label>
            <label class="col-7 text-right"><?php echo $mc->serial_no ?></label>
        </div>
        <div class="form-group row" style="padding: 0px; margin: 0px;">
            <label class="col-5 text-left">Location</label>
            <label class="col-7 text-right"><?php echo $mc->location ?></label>
        </div>
        <ul class="row profile_state list-unstyled">
            <li class="col-6">
                <div class="body bg-cyan" style="padding: 5px; margin: 2px;">
                    <i class="zmdi zmdi-chart"></i>
                    <h4 style="margin-bottom: 0px;"><?php echo $morning; ?></h4><hr color="white" style="margin: 5px; padding: 1px;">
                    <h4 style="margin-top: 0px;"><?php echo round($eff1,1) ?>%</h4>
                    <span>Morning Count</span>
                </div>
            </li>
            <li class="col-6">
                <div class="body bg-blush" style="padding: 5px; margin: 2px;">
                       <i class="zmdi zmdi-chart"></i>
                    <h4 style="margin-bottom: 0px;"><?php echo $evening; ?></h4><hr color="white" style="margin: 5px; padding: 1px;">
                    <h4 style="margin-top: 0px;"><?php echo round($eff2,1) ?>%</h4>
                    <span>Evening Count</span>
                </div>
            </li>
            <li class="col-6">
                <div class="body bg-success" style="padding: 5px; margin: 2px; color: white;">
                    <i class="zmdi zmdi-chart"></i>
                    <h4><?php echo $count; ?></h4>
                    <span>Today Count</span>
                </div>
            </li>            
            <li class="col-6">
                <div class="body bg-warning" style="padding: 5px; margin: 2px; color: white;">
                    <i class="zmdi zmdi-time"></i>
                    <h4><?php echo $avg; ?>s</h4>
                    <span>Avg. Cycle Time</span>
                </div>
            </li>  
            <li class="col-12">
                <div class="body bg-primary" style="padding: 5px; margin: 2px; color: white;">
                    <i class="zmdi zmdi-flash"></i>
                    <h4><?php echo $kwh ?> Kwh</h4>
                    <span>Today Energy Consumption</span>
                </div>
            </li>                                                          
        </ul>
