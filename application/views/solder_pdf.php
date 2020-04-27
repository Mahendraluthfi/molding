<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Soldering Report</title>
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
            font-size: 16px;
            /*font-weight: 500;*/
            font-family: Ubuntu;
        }        
    /*}*/    
</style>
<body>
    <span class="font-content">Soldering Report, <?php echo $date; ?></span>
    <!-- <h5><?php echo $shift ?></h5> -->
    <div class="row">
        <div class="col-xs-11">
            <table border="1" cellpadding="5" style="border-collapse: collapse; font-size: 12px;" width="100%">                
                 <tr style="text-align: center; font-weight: bold; background-color: #cfcfcf;">
                    <td width="1%">No</td>
                    <td>Name</td>
                    <td>1st</td>
                    <td>2nd</td>
                    <td>3rd</td>                                            
                    <td>4th</td>                                            
                    <td>5th</td>                                            
                    <td>6th</td>                                            
                    <td>7th</td>                                            
                    <td>8th</td>                                            
                    <td>9th</td>                                            
                    <td>10th</td>                                            
                    <td>11th</td>                                            
                    <td>Total</td>                                            
                </tr>                
                    <?php
                    $tjam1 = 0;
                    $tjam2 = 0;
                    $tjam3 = 0;
                    $tjam4 = 0;
                    $tjam5 = 0;
                    $tjam6 = 0;
                    $tjam7 = 0;
                    $tjam8 = 0;
                    $tjam9 = 0;
                    $tjam10 = 0;
                    $tjam11 = 0;
                    $ttl = 0;
                     $no=1; foreach ($get as $data) { ?>
                    <tr class="text-center">
                        <td><?php echo $no++; ?></td>    
                        <td><?php echo $data->nama ?></td>    
                        <td><?php echo $data->jam1 ?></td> 
                        <td><?php echo $data->jam2 ?></td> 
                        <td><?php echo $data->jam3 ?></td> 
                        <td><?php echo $data->jam4 ?></td> 
                        <td><?php echo $data->jam5 ?></td> 
                        <td><?php echo $data->jam6 ?></td> 
                        <td><?php echo $data->jam7 ?></td> 
                        <td><?php echo $data->jam8 ?></td> 
                        <td><?php echo $data->jam9 ?></td> 
                        <td><?php echo $data->jam10 ?></td> 
                        <td><?php echo $data->jam11 ?></td> 
                        <td><?php echo $data->jam1+$data->jam2+$data->jam3+$data->jam4+$data->jam5+$data->jam6+$data->jam7+$data->jam8+$data->jam9+$data->jam10+$data->jam11 ?></td>                                                
                    </tr>
                    <?php
                    $tjam1 = $tjam1 + $data->jam1;
                    $tjam2 = $tjam2 + $data->jam2;
                    $tjam3 = $tjam3 + $data->jam3;
                    $tjam4 = $tjam4 + $data->jam4;
                    $tjam5 = $tjam5 + $data->jam5;
                    $tjam6 = $tjam6 + $data->jam6;
                    $tjam7 = $tjam7 + $data->jam7;
                    $tjam8 = $tjam8 + $data->jam8;
                    $tjam9 = $tjam9 + $data->jam9;
                    $tjam10 = $tjam10 + $data->jam10;
                    $tjam11 = $tjam11+ $data->jam11;
                     } ?>
                    <tr class="text-center" bgcolor="cfcfcf">
                        <td colspan="2">Total</td>
                        <td><?php echo $tjam1 ?></td>
                        <td><?php echo $tjam2 ?></td>
                        <td><?php echo $tjam3 ?></td>
                        <td><?php echo $tjam4 ?></td>
                        <td><?php echo $tjam5 ?></td>
                        <td><?php echo $tjam6 ?></td>
                        <td><?php echo $tjam7 ?></td>
                        <td><?php echo $tjam8 ?></td>
                        <td><?php echo $tjam9 ?></td>
                        <td><?php echo $tjam10 ?></td>
                        <td><?php echo $tjam11 ?></td>
                        <td><?php echo $tjam1+$tjam2+$tjam3+$tjam4+$tjam5+$tjam6+$tjam7+$tjam8+$tjam9+$tjam10+$tjam11 ?></td>
                    </tr>                

            </table>
        </div>
    </div>
</body>
</html>