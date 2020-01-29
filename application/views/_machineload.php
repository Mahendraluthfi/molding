<div class="row clearfix">
    <?php foreach ($node as $data) {
        
        $waktu_awal     = strtotime($data->last_online);
        $waktu_akhir    = strtotime(date('Y-m-d H:i:s')); // bisa juga waktu sekarang now()        
        //menghitung selisih dengan hasil detik
        $diff =  $waktu_awal - $waktu_akhir;           
        if($diff >= 21545){                  
           $status = '<div class="w_icon green mt-3 ml-2"><i class="zmdi zmdi-power"></i></div>';
        }else{
           $status = '<div class="w_icon blush mt-3 ml-2"><i class="zmdi zmdi-power"></i></div>';                        
        } 

        $sql_today = $this->db->query("SELECT COUNT(DISTINCT time) AS today FROM realtime_data WHERE node_id=".$data->node_id." AND function='d2' AND time >= DATE(NOW()) AND time <= DATE_ADD(NOW(),INTERVAL 1 DAY)")->row();


    ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card w_data_1">
               <div class="body">
                    <div class="row">
                        <div class="col-4">
                            <?php echo $status; ?>
                        </div>
                        <div class="col-8 text-center">
                            <span style="font-weight: bold; font-size: 30px; color: green;"><?php echo round($sql_today->today/$data->count_cycle,1) ?></span><br>
                            <?php echo $data->serial_no ?> <br>
                            <?php echo $data->machine_category ?>        
                        </div>
                    </div>
               </div>
            </div>
        </div>                           
    <?php } ?>            
</div>