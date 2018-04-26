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
    <section class="search_banner">
      <img src="<?php echo $this->request->webroot; ?>images/search_banner.jpg" alt="Banner">
      <div class="overlay"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="sr-form">
              <form class="form-inline" name="search-form" method="post" action="#">
                <div class="form-group">
                  <label>Select Yacht</label>
                  <select class="form-control" name="category_type">
                  <option value="" selected="disabled">Select Type</option>
                  <?php if(!empty($categories)){
                        foreach($categories as $option){
                        ?>
                    <option value="<?php echo $option['id']; ?>"><?php echo $option['name']; ?></option>
                    <?php } }?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Where</label>
                  <!-- <input type="text" class="form-control" name="fn" placeholder="Enter Your Address"> -->
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
                  <select name="srchtimestop" id="srchtimestop" class="form-control">
                    <option value="">Select Time</option>
                        <?php foreach($times as $key=>$val){ ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option> 
                        <?php } ?>
                  </select>
                </div>
                <input type="submit" class="btn btn-default sr-btn" value="">
              </form>
            </div><!-- Form Section End Here -->
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </section><!-- End Here Search Banner Section -->

    <section class="searching_sec">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="left_inner">
              <div class="tab_sec">
                <a href="#" class="active change" id="list"><img src="<?php echo $this->request->webroot; ?>images/list.png" alt="List"> List</a>
                <a href="#" class="change" id="map"><img src="<?php echo $this->request->webroot; ?>images/map.png" alt="Map"> Map</a>
              </div>
              <div class="content_left">
                <div class="result">
                  <label><?php echo count($products); ?> Result</label>
                  <button type="button" class="btn btn-default">Reset Filter</button>
                </div>
                <div class="left_form">
                  <form class="form-horizontal" name="Filter_Form" method="post" action="#">
                    <div class="form-group">                    
                      <label>Sort By</label>
                      <select class="form-control">
                        <option value="" disabled="disabled">Select</option>
                        <option value="price_low">Price: low to high</option>
                        <option value="price_high">Price: high to low</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input class="value" type="text" id="amount1" readonly>
                      <input class="value" type="text" id="amount2" readonly>
                      <div id="price-range"></div>
                    </div>
                    <!-- <div class="checkbox">
                      <label>Book instantly</label>
                      <label class="label_nm">
                        <input type="checkbox" value="">
                        <span class="check-box"></span>
                        Reserve the Yacht without waiting for 
                        owner approval.
                      </label>
                    </div> -->
                    <!-- <div class="checkbox">
                      <label class="label_nm">Book instantly</label>
                      <label>
                        <input type="checkbox" value="">
                        <span class="check-box"></span>
                        Get the Yacht delivered directly to you.
                      </label>
                    </div> -->
                    <!-- <div class="form-group">
                      <label>Distance Included</label>
                      <input class="value" type="text" id="distance" readonly>
                      <div id="distance-range"></div>
                    </div> -->
                    <!-- <div class="form-group">
                      <label>Features</label>
                      <select class="form-control">
                        <option>Select</option>
                      </select>
                    </div> -->
                    <!-- <div class="form-group">
                      <label>Vehicle Type</label>
                      <select class="form-control">
                        <option>Select</option>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label>Vehicle Type</label>
                      <select class="form-control">
                        <option value="" disabled="disabled">Select</option>
                        <option value="old">Old</option>
                        <option value="New">New</option>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                      <label>All Years</label>
                      <input class="value" type="text" id="year1" readonly>
                      <input class="value" type="text" id="year2" readonly>
                      <div id="years"></div>
                    </div> -->
                    <!-- <div class="form-group">
                      <label>Category</label>
                      <select class="form-control">
                        <option>Select</option>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label>Vehicle Color</label>
                      <select class="form-control">
                        <option value="" disabled="disabled">Select</option>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                      <label>Transmission</label>
                      <select class="form-control">
                        <option>Select</option>
                      </select>
                    </div> -->
                  </form>
                </div>
              </div>  
            </div>
          </div><!-- End Here Left Section -->
          <div class="col-md-8 col-sm-8">

            <div class="sr-inner_wrap">

              <?php if(!empty($products)){
                        foreach($products as $item){
                        ?>
              <div class="list_wrap"><!-- start Here -->
              <a href="<?php echo $this->request->webroot."products/booking/" . $item['id'];?>">  
                <div class="img_sec">
                  <?php if($item['image']){ ?> 
                <img src="<?php echo $this->request->webroot."images/products/".$item['image']; ?>" alt="Slide Image">
                 <?php }else{ ?>
                <img src="<?php echo $this->request->webroot."images/categories/no-image.jpg"; ?>" alt="Slide Image"><?php } ?> 
                </div>
                <div class="caption">
                  <h5><a href="<?php echo $this->request->webroot."products/booking/" . $item['id'];?>"><?php if(isset($item['name'])){ echo $item['name']; } ?></a></h5>
                  <div class="tr_rating">
                    <span><?php if(isset($item['trips'])){ echo $item['trips']; } ?> Booking</span>
                    <div class="rating">
                      <?php
                        $star =  $item['ava_rating'];
                      for ($i=1; $i <= $star; $i++) {
                          echo "<i class='sr_icon'></i>";
                       } ?>
                      </div>
                  </div>
                  <div class="price">
                    <h5>$ <?php if(isset($item['price'])){ echo $item['price']; } ?></h5>
                    <span>Per Hour</span>
                  </div>
                </div>
                </a>  
              </div><!-- End Here -->
                <?php } } ?>
            </div>
            <!-- Map Section Start Here -->
              <div class="sr-map_sec" id="mapview" style="min-height: 550px;">
              </div>
            <!-- Map Section End Here -->
          </div><!-- End Here Right Section -->
        </div>
      </div>
    </section><!-- End Here Searching Section -->
    <div class="clr"></div>
  </section><!-- Content Section End Here -->

  <script>
  $(function() {
    var fromDate = $("#srchdate_start").datepicker({
        defaultDate: "+1w",
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
        defaultDate: "+1w",
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


//// show map listing

    /*** Google Map ***/
    
var allocation = $.parseJSON('<?php echo json_encode($products) ?>');  
console.log("location",allocation);
var alllocations = [];
var i;  
for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long']] );
    }    
}
  var map = new google.maps.Map(document.getElementById('mapview'), {
    zoom: 10,
    center: new google.maps.LatLng(alllocations[0][1], alllocations[0][2]),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  
  var infowindow = new google.maps.InfoWindow();
  var marker, i;
  for (i = 0; i < alllocations.length; i++) {  
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(alllocations[i][1], alllocations[i][2]),
      map: map
    });
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(alllocations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
  
/*** Google Map (END) ***/  
    
</script>