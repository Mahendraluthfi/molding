<div class="row clearfix">
    <?php foreach ($node as $data) {
        
        $cek = $this->db->query("SELECT TIMESTAMPDIFF(SECOND, '".$data->last_online."', NOW()) AS now")->row();
                
        if($cek->now < 60){
          $status = '<div class="w_icon green mt-3 ml-2"><i class="zmdi zmdi-power"></i></div>';
           $text = "Online";
           $style = 'style="font-weight: bold; font-size: 30px; color: green;"';
        }
        
        if($cek->now >= 60){
          $status = '<div class="w_icon blush mt-3 ml-2"><i class="zmdi zmdi-power"></i></div>';                        
           $text = "Offline";
           $style = 'style="font-weight: bold; font-size: 30px; color: red;"';  
        }

        $sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$data->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00')")->row();


    ?>
        <div class="col-lg-2 col-md-6 col-sm-6" style="padding: 5px; ">
            <div class="card w_data_1">
               <div class="body">
                    <div class="row">
                        <div class="col-4">
                            <?php echo $status; ?>
                        </div>
                        <div class="col-8 text-center">
                            <span <?php echo $style; ?>><?php echo round($sql_today->today/$data->count_cycle,1) ?></span><br>
                            <?php echo $data->serial_no ?> <br>
                            <a class="btn btn-info btn-sm" href="<?php echo base_url('home/detail/'.$data->node_id) ?>">Details <span class="ti-stats-up"></span></a>
                        </div>
                    </div>
               </div>
            </div>
        </div>                           
    <?php } ?>            
</div>