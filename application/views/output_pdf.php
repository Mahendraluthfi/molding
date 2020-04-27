<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Output Report</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<style>
    @page { 
        /*margin: 0px; */
    }
    body { 
        margin: 0px; 
        /*margin-left: 30px;*/
        margin-top: -30px;
        margin-right: : 50px;
        font-size: 11px;
    }

    /*@media print {*/
        .page-break {
            page-break-before: always;
        }
        .font-content{
            font-size: 12px;
            font-family: Ubuntu;
        }
    /*}*/    
</style>
<body>
    <h4>Output, Date. <?php echo $date; ?></h4>
    <h5><?php echo $morning ?></h5>
    <div class="row">
        <div class="col-xs-11">
            <table border="1" style="border-collapse: collapse;" width="100%">                
                 <tr style="text-align: center; font-weight: bold;">
                    <td width="1%">No</td>
                    <td>MC</td>
                    <td>1st</td>
                    <td>2nd</td>
                    <td>3rd</td>                                            
                    <td>4th</td>                                            
                    <td>5th</td>                                            
                    <td>6th</td>                                            
                    <td>7th</td>                                            
                    <td>8th</td>                                            
                    <td>Total</td>                                            
                </tr>
                    <?php $no=1; 
                        $jam1 = 0;
                        $jam2 = 0;
                        $jam3 = 0;
                        $jam4 = 0;
                        $jam5 = 0;
                        $jam6 = 0;
                        $jam7 = 0;
                        $jam8 = 0;
                        $total = 0;
                    foreach ($get as $data) { ?>
                        <tr style="text-align: center;">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->serial_no ?></td>
                            <td><?php echo $data->jam1->op1/$data->count_cycle ?></td>
                            <td><?php echo $data->jam2->op2/$data->count_cycle ?></td>
                            <td><?php echo $data->jam3->op3/$data->count_cycle ?></td>
                            <td><?php echo $data->jam4->op4/$data->count_cycle ?></td>
                            <td><?php echo $data->jam5->op5/$data->count_cycle ?></td>
                            <td><?php echo $data->jam6->op6/$data->count_cycle ?></td>
                            <td><?php echo $data->jam7->op7/$data->count_cycle ?></td>
                            <td><?php echo $data->jam8->op8/$data->count_cycle ?></td>
                            <td><?php echo $data->morning->today/$data->count_cycle ?></td>
                        </tr>
                    <?php
                        $jam1 = $jam1 + ($data->jam1->op1/$data->count_cycle);
                        $jam2 = $jam2 + ($data->jam2->op2/$data->count_cycle);
                        $jam3 = $jam3 + ($data->jam3->op3/$data->count_cycle);
                        $jam4 = $jam4 + ($data->jam4->op4/$data->count_cycle);
                        $jam5 = $jam5 + ($data->jam5->op5/$data->count_cycle);
                        $jam6 = $jam6 + ($data->jam6->op6/$data->count_cycle);
                        $jam7 = $jam7 + ($data->jam7->op7/$data->count_cycle);
                        $jam8 = $jam8 + ($data->jam8->op8/$data->count_cycle);
                        $total = $total + ($data->morning->today/$data->count_cycle);
                     } ?>
                    <tr style="text-align: center; font-weight: bold;">
                        <td colspan="2">Total</td>                        
                        <td><?php echo $jam1; ?></td>
                        <td><?php echo $jam2; ?></td>
                        <td><?php echo $jam3; ?></td>
                        <td><?php echo $jam4; ?></td>
                        <td><?php echo $jam5; ?></td>
                        <td><?php echo $jam6; ?></td>
                        <td><?php echo $jam7; ?></td>
                        <td><?php echo $jam8; ?></td>
                        <td><?php echo $total; ?></td>
                    </tr>                
            </table>
        </div>
    </div>
</body>
</html>