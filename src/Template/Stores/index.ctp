<section class="st_content">
		<section class="st_banner">
			<img src="<?php echo $this->request->webroot; ?>images/home-banner.jpg" alt="Banner">
			<div class="overlay"></div>
			<div class="caption">
				<h2>Watercraft Rentals</h2>
				<p><strong>Jet Ski to Yacht</strong> Rent it your wave</p>
				<div class="sr-form">
					<form class="form-inline" name="search-form" method="post" action="#">
						<div class="form-group">
							<label>Where</label>
							<input type="text" class="form-control" name="fn" placeholder="Enter Your Address">
						</div>
						<div class="form-group">
							<label>From</label>
							<input type="text" class="form-control" id="date-start" name="fn" placeholder="02/23/2018">
						</div>
						<div class="form-group">
							<label>&nbsp;</label>
							<select class="form-control">
								<option value="01:00">01:00 AM</option>
								<option value="02:00">02:00 AM</option>
								<option value="03:00">03:00 AM</option>
								<option value="04:00">04:00 AM</option>
								<option value="05:00">05:00 AM</option>
								<option value="06:00">06:00 AM</option>
								<option value="07:00">07:00 AM</option>
								<option value="08:00">08:00 AM</option>
								<option value="09:00">09:00 AM</option>
								<option value="10:00">10:00 AM</option>
								<option value="11:00">11:00 AM</option>
								<option value="12:00">12:00 AM</option>
								<option value="13:00">01:00 PM</option>
								<option value="14:00">02:00 PM</option>
								<option value="15:00">03:00 PM</option>
								<option value="16:00">04:00 PM</option>
								<option value="17:00">05:00 PM</option>
								<option value="18:00">06:00 PM</option>
								<option value="19:00">07:00 PM</option>
								<option value="20:00">08:00 PM</option>
								<option value="21:00">09:00 PM</option>
								<option value="22:00">10:00 PM</option>
								<option value="23:00">11:00 PM</option>
								<option value="24:00">12:00 PM</option>
							</select>
						</div>
						<div class="form-group">
							<label>TO</label>
							<input type="text" class="form-control" id="date-end" name="fn" placeholder="02/23/2018">
						</div>
						<div class="form-group">
							<label>&nbsp;</label>
							<select class="form-control">
								<option value="01:00">01:00 AM</option>
								<option value="02:00">02:00 AM</option>
								<option value="03:00">03:00 AM</option>
								<option value="04:00">04:00 AM</option>
								<option value="05:00">05:00 AM</option>
								<option value="06:00">06:00 AM</option>
								<option value="07:00">07:00 AM</option>
								<option value="08:00">08:00 AM</option>
								<option value="09:00">09:00 AM</option>
								<option value="10:00">10:00 AM</option>
								<option value="11:00">11:00 AM</option>
								<option value="12:00">12:00 AM</option>
								<option value="13:00">01:00 PM</option>
								<option value="14:00">02:00 PM</option>
								<option value="15:00">03:00 PM</option>
								<option value="16:00">04:00 PM</option>
								<option value="17:00">05:00 PM</option>
								<option value="18:00">06:00 PM</option>
								<option value="19:00">07:00 PM</option>
								<option value="20:00">08:00 PM</option>
								<option value="21:00">09:00 PM</option>
								<option value="22:00">10:00 PM</option>
								<option value="23:00">11:00 PM</option>
								<option value="24:00">12:00 PM</option>
							</select>
						</div>
						<input type="submit" class="btn btn-default sr-btn" value="">
					</form>
				</div>
			</div>
			<div class="clr"></div>
		</section>
		<!-- Banner-Section End Here -->
 		<?php if(!empty($categories)){
                         foreach($categories as $cat){ 

                         ?>

		<section class="jet_sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 no-padding">
						<div class="head-sec-cr">
							<h2><?php if(isset($cat['name'])){  echo $cat['name']; } ?></h2>
							<?php if($cat['image']){ ?> 
                <img src="<?php echo $this->request->webroot."images/".$cat['image']; ?>" alt="Slide Image">
                 <?php }else{ ?>
                <img src="<?php echo $this->request->webroot."images/categories/no-image.jpg"; ?>" alt="Slide Image"><?php } ?> 
                </div>
						<div class="jet-slider slider-jet">
						<?php if(!empty($cat['products'])){
                        foreach($cat['products'] as $item){
                        ?>
							<div class="col-md-4 col-sm-4">
								<div class="inner-content">
									<a href="<?php echo $this->request->webroot."products/booking/" . $item['id'];?>">	
									<div class="img-sec">
									<?php if($item['image']){ ?> 
                <img src="<?php echo $this->request->webroot."images/products/".$item['image']; ?>" alt="Slide Image">
                 <?php }else{ ?>
                <img src="<?php echo $this->request->webroot."images/categories/no-image.jpg"; ?>" alt="Slide Image"><?php } ?> 
									</div>
									<div class="caption">
										<h5><?php if(isset($item['name'])){ echo $item['name']; } ?></h5>
										<div class="tr-star">
											<span><?php if(isset($item['trips'])){ echo $item['trips']; } ?> Booking</span>
											<div class="star">
											<?php
										    $star =  $item['ava_rating'];
											for ($i=1; $i <= $star; $i++) {
													echo "<i class='sr-icon'></i>";
											 } ?>
											</div>
										</div>
										<div class="price-sec">
											<h5>$ <?php if(isset($item['price'])){ echo $item['price']; } ?></h5>
											<span>Per Hour</span>
										</div>
									</div>
									</a>
								</div>
							</div><!-- End Here First Slide -->
							<?php } } ?> 
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- End Here Jet Section -->
		<?php } } ?> 

		<section class="video-sec gray-sec">
			<div class="overlay"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-center">
						<div class="inner-content">
							<div class="video-wrap">
								<div class="content-sec">
									<h2>The Water Crafters That Pays For Itself</h2>
									<p>Have you ever been on vacation and wanted to get out and enjoy the water whether its on a jet ski or a yacht, but all the rental places are sold out or just too busy? Jet ski to Yacht makes it easier to find great deals for renting watercraft's from local residents in your area! Not only does Jet ski to Yacht help find your next watercraft to enjoy, it also allows you the ability to rent out YOUR watercraft to make a quick buck! Simply sign up and create an account to quickly find rental deals near you or list your own to start earning now!</p>
									<a href="#" class="btn btn-default">List Like You Have</a>
									<a href="#" class="btn btn-default">Rent Your Water Crafts</a>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- End Here -->
	</section><!-- Content Section End Here -->


<!-----------footer-section-------------->
