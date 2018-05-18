<section class="st_content">
		<section class="yacht_banner">
			<img src="<?php echo $this->request->webroot ?>images/Rent-a-Craft-banner.jpg" alt="Banner">
			<div class="overlay"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap_outer">						
							<div class="head-sec">
								<h2>Rent the perfect Yacht</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- Banner Section End Here -->
		<section class="why_yacht">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 no-padding">
						<div class="inner_sec">
							<div class="head_sec">
								<h2>Why Yacht?</h2>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="col_inner">
									<h2>Choice</h2>
									<p>Lorem Ipsum is simply dummy text of the<br /> printing and typesetting industry. </p>
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="col_inner">
									<h2>Value</h2>
									<p>Lorem Ipsum is simply dummy text of the<br /> printing and typesetting industry. </p>
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="col_inner">
									<h2>Accessibility</h2>
									<p>Lorem Ipsum is simply dummy text of the<br /> printing and typesetting industry. </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- End Here Why Yacht Section -->
		<section class="covered_sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 no-padding">
						<div class="head_sec">
							<h2>Your’re Covered</h2>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="col-inner">
								<div class="img_sec">
									<img src="<?php echo $this->request->webroot ?>images/insurance.png" alt="Image">
								</div>
								<div class="text_sec">
									<h2>Insurance Coverage</h2>
									<p>Lorem Ipsum is simply dummy text of the<br /> 
										printing and typesetting industry. </p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="col-inner">
								<div class="img_sec">
									<img src="<?php echo $this->request->webroot ?>images/man.png" alt="Image">
								</div>
								<div class="text_sec">
									<h2>Assistance & Support</h2>
									<p>Lorem Ipsum is simply dummy text of the<br /> 
										printing and typesetting industry. </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- End Here -->
		<section class="testimonial_sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="head_sec">
							<h2>Testimonial's</h2>
						</div>
						<div class="inner_sec test_inner">
						<?php foreach($review as $testinomial){ ?>
							<div class="wrap_test">
								<div class="avatar">
								<?php if($testinomial['user']['image'] != ""){ ?>  
		<img src="<?php echo $this->request->webroot."images/users/".$testinomial['user']['image']; ?>" alt="profile image">
		<?php }else{ ?>
		<img src="<?php echo $this->request->webroot."images/users/noimage.png"; ?>" class="ful_lnght">
		<?php } ?>
								</div>
								<div class="text_sec">
									<p> <?php echo $testinomial['review'] ?></p>
									<span class="name"><?php echo $testinomial['user']['name'] ?></span>
								</div>
							</div>
						<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- Content Section End Here -->