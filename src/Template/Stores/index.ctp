<?php
function create_time_range($start, $end, $interval = '60 mins', $format = '12') {
    $startTime = strtotime($start); 
    $endTime   = strtotime($end);
    $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';

    $current   = time(); 
    $addTime   = strtotime('+'.$interval, $current); 
    $diff      = $addTime - $current;

    $times = array(); 
    while ($startTime < $endTime) { 
        $times[] = date($returnTimeFormat, $startTime); 
        $startTime += $diff; 
    } 
    $times[] = date($returnTimeFormat, $startTime); 
    return $times; 
}

//$times = create_time_range('0:00', '24:00', '30 mins');
$times = create_time_range('0:00', '24:00');
?>
<section class="st_content">
		<section class="st_banner">
			<img src="<?php echo $this->request->webroot; ?>images/home-banner.jpg" alt="Banner">
			<div class="overlay"></div>
			<div class="caption">
				<h2>Watercraft Rentals</h2>
				<p><strong>Jet Ski to Yacht</strong> Rent it your wave</p>
				<div class="sr-form">
					<form class="form-inline" name="search-form" method="get" action="<?php echo $this->request->webroot; ?>products/search">
						<div class="form-group">
							<label>Where</label>
							<input class="form-control tlt_form_field" name="search" id="txtPlaces" type="text" placeholder="Enter your location">
		                  <input type="hidden" id="latitude" name="latitude" class="form-control" />
		                  <input type="hidden" id="longitude" name="longitude" class="form-control" />
						</div>
						<div class="form-group">
							<label>From</label>
							<input type="text" class="form-control" id="srchdate_start" placeholder="Select Date" name="srchdate_start" value="">
						</div>
						<div class="form-group">
							<label>&nbsp;</label>
							<select name="srchtimestart" id="srchtimestart" class="form-control">
                    <option value="">Select Time</option>
                        <?php foreach($times as $key=>$val){ ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option> 
                        <?php } ?>
                  </select>
						</div>
						<div class="form-group">
							<label>TO</label>
							<input type="text" class="form-control" id="srchdate_end" placeholder="Select Date" name="srchdate_end" value="">
						</div>
						<div class="form-group">
							<label>&nbsp;</label>
							<select name="srchtimestart" id="srchtimestart" class="form-control">
                    <option value="">Select Time</option>
                        <?php foreach($times as $key=>$val){ ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option> 
                        <?php } ?>
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
											<span><?php  echo count($item['orders']); ?> Booking</span>
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
									<a href="<?php echo $this->request->webroot; ?>favourites/favourite" class="btn btn-default">List Like You Have</a>
									<a href="<?php echo $this->request->webroot . "products/addyourcraft"; ?>" class="btn btn-default">Rent Your Water Crafts</a>
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

<script>
$(function() {
    var fromDate = $("#srchdate_start").datepicker({
        changeMonth: true,
        minDate: 0,
        minDate: new Date(),
        onSelect: function(selectedDate) {
            var instance = $(this).data("datepicker");
            var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            toDate.datepicker("option", "minDate", date);
        }
    });

    var toDate = $("#srchdate_end").datepicker({
    	minDate: 0,
        minDate: new Date(),
        changeMonth: true
    });
});

/// google location search

google.maps.event.addDomListener(window, 'load', function () {
  var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
  google.maps.event.addListener(places, 'place_changed', function () {
    var place = places.getPlace();
    var address = place.formatted_address;
    var latitude = place.geometry.location.lat();
    var longitude = place.geometry.location.lng();
    $("#latitude").val(latitude);
    $("#longitude").val(longitude);
    
    for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            // console.log("addressType:" + addressType);
            if (addressType == 'country') {
                var val = place.address_components[i].long_name;
                // console.log("val:" + val);
                $('.sel-country option[value="'+val+'"]').attr("selected",true);
            }
        }
    
  });
});


</script>
