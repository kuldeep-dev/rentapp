<section class="st_content">
		<section class="yacht_banner">
			<img src="<?php echo $this->request->webroot ?>images/list-your-craft-banner.jpg" alt="Banner">
			<div class="overlay"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap_outer">						
							<div class="head-sec">
								<h2>Be Your Own Boss</h2>
								<p>List your watercraft, Starting earning fast!</p>
								<a href="<?php echo $this->request->webroot . "products/addyourcraft"; ?>" class="btn btn-default rent">List Your Water Crafts</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- Banner Section End Here -->
		<section class="how_much-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12 no-padding">
						<div class="head-sec">
							<h2>How much could i earn?</h2>
						</div>
						<div class="col-md-6 col-sm-6 no-padding">
							<div class="md-10 col-sm-10 col-center">
								<div class="inner-sec">
									<label>Market value of your yacht</label>
									<div id="sliderOne"></div>
									<!-- <div id="sliderOne"></div> -->
									<!-- <input type="text" id="paraOne"  readonly> -->
									<span id="paraOne">1</span><br>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 no-padding">
							<div class="md-10 col-sm-10 col-center">
								<div class="inner-sec">
									<label>Days per month your yacht is rented</label>
									<div id="sliderTwo"></div>
									<!-- <div id="sliderTwo"></div> -->
									<!-- <input type="text" id="paraTwo" readonly> -->
									<span id="paraTwo">1</span><br>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="solution_sec">
								<label>You Could Earn</label>
								<h2 class="solution" id="paraTotal">$0</h2>
								<!-- <span id="paraTotal">2</span><br> -->
								<label>Per Year</label>
							</div>
						</div>
					</div>
				</div>
			</div>

<!-- Slider 1: <span id="paraOne">1</span><br>
Slider 2: <span id="paraTwo">1</span><br>
Total: <span id="paraTotal">2</span><br>
<br><br>
<div id="sliderOne"></div>
<br><br>
<div id="sliderTwo"></div> -->



		</section><!-- End Here -->
		<section class="covered_sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 no-padding">
						<div class="head_sec">
							<h2>Your earning</h2>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="col-inner">
								<div class="img_sec">
									<img src="<?php echo $this->request->webroot ?>images/pricing.png" alt="Image">
								</div>
								<div class="text_sec">
									<h2>Pricing</h2>
									<p>Lorem Ipsum is simply dummy text of the<br /> 
										printing and typesetting industry. </p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="col-inner">
								<div class="img_sec">
									<img src="<?php echo $this->request->webroot ?>images/earning.png" alt="Image">
								</div>
								<div class="text_sec">
									<h2>Payment</h2>
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

	<script>
	$("#sliderOne").slider({
    range: "min",
    value: 1,
    min: 1,
    max: 20000,
    slide: function(event, ui) {
        $("#paraOne").text(ui.value);
        $('#paraTotal').text('$' + ui.value + $('#sliderTwo').slider("value"));
    }

});

$("#sliderTwo").slider({
    range: "min",
    value: 1,
    min: 1,
    max: 31,
    slide: function(event, ui) {
        $("#paraTwo").text(ui.value);
        $('#paraTotal').text('$' + ui.value + $('#sliderOne').slider("value"));
    }
});

		</script>