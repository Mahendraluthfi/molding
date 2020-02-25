<div class="row clearfix">
<?php foreach ($node as $data) { ?>
     <div class="col-6" style="padding: 5px; ">
            <div class="card w_data_1">
               <div class="body" style="padding-bottom: 0px;">            
                        <h6 class="text-center">Molding MC/<?php echo $data->line ?></h6>
                        <div class="row clearfix">
                            
                        
                        <?php 
                            $get = $this->db->query("SELECT * FROM node_data WHERE line='".$data->line."' ORDER BY position ASC")->result();
                            foreach ($get as $key) { 
                                 $cek = $this->db->query("SELECT TIMESTAMPDIFF(SECOND, '".$key->last_online."', NOW()) AS now")->row();
                
                                if($cek->now < 60){
                                  $status = '<div class="w_icon green mt-3"><i class="zmdi zmdi-power"></i></div>';
                                   $text = "Online";
                                   $style = 'style="font-weight: bold; font-size: 30px; color: green;"';
                                }

                                if($cek->now >= 60){
                                  $status = '<div class="w_icon blush mt-3"><i class="zmdi zmdi-power"></i></div>';                        
                                   $text = "Offline";
                                   $style = 'style="font-weight: bold; font-size: 30px; color: red;"';  
                                }

                                $sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$key->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY) AND ts >= TIME('05:30:00')")->row();
                            ?>
                             <div class="col" style="padding: 5px; ">
                                <div class="card w_data_1">
                                   <div class="body">
                                        <div class="row">
                                            <div class="col-3">
                                                <?php echo $status; ?>
                                            </div>
                                            <div class="col-9 text-center">
                                                <span <?php echo $style; ?>><?php echo round($sql_today->today/$key->count_cycle,1) ?></span><br>
                                                <?php echo $key->serial_no ?> <br>
                                                <a class="btn btn-info btn-sm" href="<?php echo base_url('home/detail/'.$key->node_id) ?>">Details <span class="ti-stats-up"></span></a>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                            </div>      
                        <?php } ?>
                     </div>
                </div>
            </div>
        </div>      
<?php } ?>
</div>