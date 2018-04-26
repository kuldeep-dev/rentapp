<section class="yacht_banner trust_banner">
	<img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/trust-and-safety-banner.jpg" alt="" border="0">
	<div class="overlay"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="wrap_outer">						
						<div class="head-sec">
							<h2>
								<?php if ($term->title) {
									echo $term->title;  
								} ?>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="clr"></div>
</section>
<section class="terms-sec">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="head-sec">					
					<h2>
						<?php if ($term->title) {
							echo $term->title;
						} ?>
					</h2>
				</div>
				<div class="cndn-txt">
				</div>
			</div>
			<div class="col-sm-12">
				<?php if ($term->content) {
					echo $term->content;
				} ?>
			</div>
		</div>

	</div>
</section>  
