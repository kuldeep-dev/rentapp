<section class="st_content">
		<section class="checkout-sec">
			<div class="container">
				<div class="row">
				<div class="sign-flash">
              <?= $this->Flash->render() ?>   
              </div>
					<div class="col-md-12">
						<div class="inner-sec">
							<div class="head-sec">
								<h2>List Your Craft</h2>
							</div>
						</div>
					</div>
                    <?php // print_r($product) ?>
                    <?= $this->Form->create($product, ['id' => 'product-form', 'enctype' => 'multipart/form-data']) ?>
					<div class="col-md-6 col-sm-6">
						<div class="image_banner">
							<img src="<?php echo $this->request->webroot; ?>images/products/<?php echo ($product->image != '') ? $product->image : 'no-image.jpg' ?>" alt="Profile-Banner" class="previewHolder">
						</div>
						<div class="avatar-wrap">
							<div class="avatar">
								<?php if($loggeduser['image'] != ""){ ?>  
					                <img src="<?php echo $this->request->webroot."images/users/".$loggeduser['image']; ?>" alt="profile image">
					                 <?php }else{ ?>
					                <img src="<?php echo $this->request->webroot."images/users/noimage.png"; ?>" class="ful_lnght">
					                 <?php } ?>
							</div>
							<div class="choose-file">
								<input type="file" class="form-control" id="productPic" name="image" value=""> 
								<span class="choose">Choose File</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-sec">
							
								<div class="row">
								<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control" value="<?php echo $product['name']; ?>" name="name" placeholder="Name">
											<?php echo $this->Form->error('name', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
                                    <div class="form-group">  
              <label>Where is your craft located?</label>

              <?php
              $lat = $product['lat'];
              $lng = trim($product['long']);
              $data = file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false&key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o");
              $output = json_decode($data);
              $status = $output->status;
              $address = ($status=="OK")?$output->results[1]->formatted_address:'';
            //  print_r($address);
              
              ?>


              <input class="form-control tlt_form_field" value="<?php echo $address; ?>"  name="address" id="txtPlaces" type="text" placeholder="Enter your location">
              <input type="hidden" id="latitude" name="lat" value="<?php echo $product['lat']; ?>" class="form-control" />
              <input type="hidden" id="longitude" name="long" value="<?php echo $product['long']; ?>" class="form-control" />
              <?php echo $this->Form->error('address', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
            </div> 
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
                                        <?php echo $this->Form->control('cat_id',['class' => 'form-control','label'=>'Category']);?>
											</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Color</label>
											<input type="text" class="form-control" value="<?php echo $product['color']; ?>" name="color" placeholder="eg. Black and Gray">
											<?php echo $this->Form->error('color', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="form-group">
											<label>Condition</label>
											<select class="form-control" name="conditions" id="conditions">
                                <option value="New" <?php if($product['conditions']=='New'){ echo "selected"; } ?>>New</option>
                                <option value="Old" <?php if($product['conditions']=='Old'){ echo "selected"; } ?>>Old</option>
                 </select>
                                            </div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Price</label>
											<input type="number" name="price" value="<?php echo $product['price']; ?>" class="form-control" min="1" step="0.01" id="price" value="0.00">
											<?php echo $this->Form->error('price', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Pick Location</label>
											<input class="form-control tlt_form_field" name="pick_location" value="<?php echo $product['pick_location']; ?>" id="pick_location" type="text" placeholder="Enter your location">
											<?php echo $this->Form->error('pick_location', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Drop Location</label>
											<input class="form-control tlt_form_field" name="drop_location" value="<?php echo $product['drop_location']  ?>" id="drop_location" type="text" placeholder="Enter your location">
											<?php echo $this->Form->error('drop_location', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
										</div>
									</div>

									<div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" <?php if($product->status==1){ echo "selected"; }?>>Active</option>
                                            <option value="0" <?php if($product->status==0){ echo "selected"; }?>>Deactive</option>
                                
                                        </select>
                                        </div> 
									</div>

									<div class="col-sm-12 col-md-12">
										<div class="form-group">
											<?php echo $this->Form->control('description', ['class' => 'form-control', 'label' => 'Description']); ?>
                                            </div>
									</div>

									<div class="col-md-6 col-sm-6">
										<input type="submit" class="btn btn-default btn-sub" value="Submit">
									</div>
								</div>
						</div>
					</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
			<div class="clr"></div>
		</section><!-- Contact Section End Here -->
	</section><!-- Content Section End Here -->

	<script>
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

//pick location 

google.maps.event.addDomListener(window, 'load', function () {
  var places = new google.maps.places.Autocomplete(document.getElementById('pick_location'));
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


//////drop location

google.maps.event.addDomListener(window, 'load', function () {
  var places = new google.maps.places.Autocomplete(document.getElementById('drop_location'));
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
<script type="text/javascript">
	$(document).ready(function() {
	var form = $("#product-form").validate({
		rules: {
			name: "required",        
			address: { required: true  },
			category_type : { required: true  },
			color : { required: true  },
			condition: { required: true  },
			price: { required: true  },
			pick_location: { required: true  },
			drop_location: { required: true  }
			
		},
		messages: {
			name: "Please enter your product name",
			address: "Please enter address",
			category_type : "Please select category",
			color : "Please enter color of your product",
			condition: "Please select condition of your product",
			price: "Please enter price",
			pick_location: "Please enter pickup location",
			drop_location: "Please enter drop location"

			
		}
	}); 
	}); 

/// image upload

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.previewHolder').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#productPic").change(function() {
  readURL(this);
});


</script>




<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
<script>
tinymce.init({
selector: 'textarea',
plugins: [
"code", "charmap", "link"
],
toolbar: [
"undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
]
});
</script> 