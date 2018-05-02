<section class="st_content">
		<section class="profile_banner">
			<img src="<?php echo $this->request->webroot ?>images/profile-banner.jpg" alt="Banner">
			<div class="overlay"></div>
			<div class="clr"></div>
		</section><!-- Banner Section End Here -->
		<section class="profile_sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="profile_outer">
							<div class="profile_wrap order-success">
								<div class="col-sm-6 col-sm-offset-3">
					                    <?php if ($response == 'success') { ?>
					                    <div class="order-img">
									<img src="<?php echo $this->request->webroot ?>images/order-success.png" alt="Order Success Image">
									</div>
					                    <h3>Booking Successful</h3>
					                    <div class="order_completed">
					                        <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
					                    </div>
					                    <h5>Success!</h5>
										<h6><span>Transation ID:</span><?php echo $_GET['tx']; ?></h6>
										<p>You paid <?php echo $order['total_price'] ?> USD to rentapp.com<br/> We'll notify you when we receive the funds</p>
					                    <?php } else { ?>
					                    <h3>Booking Unsuccessful</h3>
					                    <div class="order_completed">
					                        <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
					                    </div>
					                    <?php } ?>

					            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="clr"></div>
	</section><!-- Content Section End Here -->