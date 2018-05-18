<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RentApp</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet"> 
<meta name="viewport" content="width">
</head>
	<body style="padding:15px 0; background: url(https://gurpreet.gangtask.com/rentapp/img/bgplait.png) repeat #dddddd;
		margin:0px auto;
		font-family: 'Roboto', sans-serif;
		font-weight:400;
		background-size: 160px;">
		
		<table width="600" border="0" cellpadding="10" cellspacing="0" style="margin:0px auto; background:#fffefb; text-align:center;">
				<tr style="background:#fff;">
					<td style="text-align:center; padding-top:2px; padding-bottom:2px; border-bottom:2px solid #5786a6; padding:0;">
						<img src="<?php echo $logoimage; ?>" alt="img" />
					</td>
				</tr>  
				<tr>
					<td style="text-align:right;">
						<h1 style="font-size:16px; margin:0;  color:#487697; font-weight:600;">Booking Confirmed</h1>    
						<h2 style="font-size:12px; margin:0; color:#4a4a4a; font-weight:normal;">Booking No:- <?php if(isset($order['id'])){ echo $order['id']; } ?></h2>
					</td>
				</tr>
				<tr>
					<td style="padding:15px 0; ">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="f4f4f4"; style="background-color:#f4f4f4;">
					  <tr>
						 <td style="text-align:left; padding: 10px;"><h3 style="margin:0; font-size:15px; font-weight:600">Booking Delivery</h3></td>
					  </tr>
					  <tr>
						<td style="text-align:left; padding: 10px;"><p style="margin:0; font-size:13px"><?php if(isset($address)){ echo $address; } ?></p></td>
					  </tr>
					</table>
					</td>
				</tr>
				 <tr>  
					<td style="padding:0 0 10px 0;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr style="text-align:left; padding-left:10px;">
								  <th style="padding-left:10px;">Image</th>
								  <th>Start date</th>
								  <th>End date</th>
								  <th>Hourly price</th>
								  <th>Hours</th>
								  <th>Total price</th>
								</tr>
								<tr>
									<td>
										<div style="width:100%;">  
											
											<?php if($order['product']['image']){ ?> 
												<img src="<?php echo $productimage?>" alt="img"style="width:80px; height:auto; float: left; padding-left:5px; padding-top:10px;" />
											   <?php }else{ ?>
											  <img src="<?php echo $noimage; ?>" alt="img"style="width:80px; height:auto; float: left; padding-left:5px; padding-top:10px;"/>
											   <?php } ?>    
										</div>
									</td>
									<td>
										<div style="text-align:left;">  
											<h3 style="margin:0; font-size:14px; font-weight:400;"><?php if(isset($order['start_date'])){ echo $order['start_date']; echo '<br>'; echo $order['start_time'];  } ?></h3>  
										</div>
									</td>
									<td>
										<div style="text-align:left;">  
											<h3 style="margin:0; font-size:14px; font-weight:400;"><?php if(isset($order['end_date'])){ echo $order['end_date']; echo '<br>'; echo $order['end_time'];  } ?></h3> 
										</div>
									</td>
									<td>
										<div style="text-align:left;">  
											<h3 style="margin:0; font-size:14px; font-weight:400;">$<?php if(isset($order['hourly_price'])){ echo $order['hourly_price'];  } ?></h3>  
										</div>
									</td> 
									<td>
										<div style="text-align:left;">  
											<h3 style="margin:0; font-size:14px; font-weight:400;"><?php if(isset($order['total_hours'])){ echo $order['total_hours'];  } ?></h3>  
										</div>
									</td>
									<td>
										 <div style="text-align:left;">  
											<h3 style="margin:0; font-size:14px; font-weight:400;">$<?php if(isset($order['total_price'])){ echo $order['total_price'];  } ?></h3>  
										</div>
									</td> 
								</tr>
						</table>
					</td>  
				</tr>
			<tr>
				<td style="padding:0;"><p style="padding:10px 10px; font-size:14px; text-align:left; font-weight:600;">Thank you  <br><span style=" font-size:12px; font-weight:400;">Team RentApp</span></p></td>   
			</tr>
		</table> 
	</body>  
</html>

    