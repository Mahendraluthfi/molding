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
    <!-- <h5><?php echo $shift->morning ?></h5> -->
    <div class="row">
        <div class="col-xs-11">
            <table border="1" style="border-collapse: collapse;" width="100%">                
                 <tr style="text-align: center; font-weight: bold;">
                    <td width="1%">No</td>
                    <td>MC</td>
                    <td>Morning(<?php echo $morning ?>)</td>
                    <td>Evening(<?php echo $evening ?>)</td>
                    <td>Total</td>                                                                                                      
                </tr>
                    <?php $no=1; 
                        $tm = 0;
                        $te = 0;
                        $tall = 0;
                    foreach ($get as $data) { ?>
                        <tr style="text-align: center;">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->serial_no ?></td>                                            
                            <td><?php echo $data->morning->today/$data->count_cycle ?></td>
                            <td><?php echo $data->evening->today/$data->count_cycle ?></td>
                            <td><?php echo ($data->morning->today/$data->count_cycle)+($data->evening->today/$data->count_cycle) ?></td>
                        </tr>
                    <?php 
                        $tm = $tm + ($data->morning->today/$data->count_cycle);
                        $te = $te + ($data->evening->today/$data->count_cycle);
                        $tall = $tall + (($data->morning->today/$data->count_cycle)+($data->evening->today/$data->count_cycle));
                } ?>
                    <tr style="text-align: center; font-weight: bold;">
                        <td colspan="2">Total</td>                        
                        <td><?php echo $tm ?></td>
                        <td><?php echo $te ?></td>
                        <td><?php echo $tall ?></td>                        
                    </tr>                
            </table>
        </div>
    </div>
</body>
</html>