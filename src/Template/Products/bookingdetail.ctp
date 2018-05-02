<section class="st_content">
		<section class="checkout-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="inner-sec">
							<div class="head-sec">
								<h2>Booking Detail</h2>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6">
						<div class="image_banner">
							<img src="<?php echo $this->request->webroot."images/products/".$bookingdetail['image']; ?>" alt="Profile-Banner">
						</div>
						<div class="avatar-wrap">
							<div class="avatar">
								<img src="<?php echo $this->request->webroot."images/users/".$bookingdetail['user']['image']; ?>" alt="Slide Image"" alt="avatar">
							</div>
							<h5><?php echo $bookingdetail['name']; ?></h5>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="text-sec">
							<h5>Trip Summary</h5>
							<ul>
								<li><?php echo date("d-M-Y", strtotime($this->request->query['startdate'])); ?>
									<span><?php echo $this->request->query['timestart']; ?></span>
								</li>
								<li><?php echo date("d-M-Y", strtotime($this->request->query['enddate'])); ?>
									<span><?php echo $this->request->query['timestop']; ?></span>
								</li>
								<li>Meeting Location
									<span><?php echo $this->request->query['pick_location']; ?></span>
								</li>
								<li>
									<span></span>
								</li>
								<li>Hourly Price
									<span><?php echo $this->request->query['hourly_price']; ?>/ hr</span>
								</li>
								<li>Total Hours
									<span><?php echo $this->request->query['total_hours']; ?></span>
								</li>
								<li>Total Price
									<span>$<?php echo $this->request->query['total_price']; ?></span>
								</li>
							</ul>

							<form method="post" action="<?php echo $this->request->webroot."orders/payment";?>" >
							<input type="hidden" name="user_id" value="<?php echo $this->request->query['user_id']; ?>"/>
							<input type="hidden" name="product_id" value="<?php echo $this->request->query['product_id']; ?>"/>
							<input type="hidden" name="start_date" value="<?php echo $this->request->query['startdate']; ?>"/>
							<input type="hidden" name="start_time" value="<?php echo $this->request->query['timestart']; ?>"/>
							<input type="hidden" name="end_date" value="<?php echo $this->request->query['enddate']; ?>"/>
							<input type="hidden" name="end_time" value="<?php echo $this->request->query['timestop']; ?>"/>
							<input type="hidden" name="hourly_price" value="<?php echo $this->request->query['hourly_price']; ?>"/>
							<input type="hidden" name="total_hours" value="<?php echo $this->request->query['total_hours']; ?>"/>
							<input type="hidden" name="total_price" value="<?php echo $this->request->query['total_price']; ?>"/>

							<div class="btn-sec">
							<button type="submit" id="Favourites" class="btn btn-primary btn-pay">Pay Now</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- Contact Section End Here -->
	</section><!-- Content Section End Here -->