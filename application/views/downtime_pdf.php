<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Downtime Report</title>
    <!-- Latest compiled and minified CSS -->
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
	<span style="font-size: 30px; font-family: Ubuntu;">Downtime Report / <?php echo $d1.'-'.$d2; ?></span><hr>
	<div class="row font-content">
		<div class="col-xs-2">
			<span>Total Result</span>
		</div>	
		<div class="col-xs-3">
			<span class="text-primary"><?php echo $num; ?> Downtime</span>
		</div>	
	</div>
	<div class="row font-content">
		<div class="col-xs-2">
			<span>Total Downtime</span>
		</div>	
		<div class="col-xs-3">
			<span class="text-primary"><?php echo $total->total; ?> Minutes</span>
		</div>	
	</div><br>
	<table class="table table-bordered">		
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Date</th>
                <th>MC</th>
                <th width="1%">Shift</th>
                <th>Time</th>
                <th width="1%">Prod.Hours</th>
                <th>Reason</th>                                            
                <th>Input by</th>                                                                                        
            </tr>
        </thead>        
        <tbody>
            <?php $no=1; foreach ($get as $data) { ?>
                 <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo date('d M Y', strtotime($data->date)); ?></td>
                    <td><?php echo $data->mc; ?></td>
                    <td><?php echo $data->shift; ?></td>
                    <td><?php echo $data->time ?> Minutes</td>
                    <td><?php echo $data->prd_hours ?></td>
                    <td><?php echo $data->reason ?></td>
                    <td><?php echo $data->name ?></td>                                               
                </tr>
            <?php } ?>
        </tbody>                               
	</table>
</body>
</html>