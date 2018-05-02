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
              <form class="form-inline" name="search-form" id="search-form" method="post">
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
                  <input class="form-control tlt_form_field" required="required" name="search" id="txtPlaces" type="text" placeholder="Enter your location">
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
                <input type="button" id="srch-button" class="btn btn-default sr-btn" value="">
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
                  <label class="totalresult"><?php echo count($products); ?> Result</label>
                  <button type="button" id="resetfilter" class="btn btn-default">Reset Filter</button>
                </div>
                <div class="left_form">
                  <form class="form-horizontal" name="Filter_Form" method="post" action="#">
                    <div class="form-group">                    
                      <label>Sort By</label>
                      <select class="form-control" id="pricehighlow">
                        <option value="" disabled="disabled" selected="selected">Select</option>
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
                      <select class="form-control" id="vehicletype">
                        <option value="" disabled="disabled" selected="selected">Select</option>
                        <option value="Old">Old</option>
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
                      <select class="form-control" id="coloroption">
                        <option value="" disabled="disabled" selected="selected">Select</option>
                        <?php foreach($color as $coloroption) {?>
                          <option value="<?php echo $coloroption['color'] ?>"><?php echo $coloroption['color']?></option>
                        <?php } ?>
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
                <?php } } else { echo  " No data found";} ?>
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
            if (addressType == 'country') {
                var val = place.address_components[i].long_name;
                $('.sel-country option[value="'+val+'"]').attr("selected",true);
            }
        }
    
  });
});


//// show map listing

    /*** Google Map ***/
    
var host =  window.location.origin;

$(document).ready(function(){
      // cluster marker
      var allocation = $.parseJSON('<?php echo json_encode($products) ?>');  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    });
  
/*** Google Map (END) ***/  


/// search ajax
var valueSelected = "";
var alldata= "";
var totalresult ="";

var alldata = $.parseJSON('<?php echo json_encode($products) ?>');

jQuery("#srch-button").click(function(event) {
          $.ajax({
            url: '<?php echo $this->request->webroot; ?>products/searchajax', 
            data: $('#search-form').serialize(),
            method: 'post',
            dataType: 'json',
            success: function (res) {    
                       if (res.status == 'true') 
                       {
                        var html = "";
                        totalresult = res.data.length;
                        alldata = res.data;
                        for(var i=0; i < res.data.length; i++ )
                        {
                        
                        html += '<div class="list_wrap">'
                        html += '<a href="'+ host +'/rentapp/products/booking/'+ res.data[i].id +'">' 
                        html += '<div class="img_sec">'
                        html += '<img src="'+ host +'/rentapp/images/products/'+ res.data[i].image +' " alt="Slide Image">'
                        html += '</div>'
                        html += '<div class="caption">'
                        html += '<h5><a href="'+ host +'/rentapp/products/booking/'+ res.data[i].id +'"></a>'+ res.data[i].name +'</h5>'
                        html += '<div class="tr_rating">'
                        html += '<span>'+ res.data[i].trips +' Booking</span>'
                        html += '<div class="rating">'
                        html += '</div>'
                        html += '</div>'
                        html += '<div class="price">'
                        html += '<h5>$'+ res.data[i].price +'</h5>'
                        html += '<span>Per Hour</span>'
                        html += '</div>'
                        html += '</div>'
                        html += '</a>  '
                        html += '</div>'
                      }
                      $('.sr-inner_wrap').html(html);
                      $('.totalresult').html(totalresult +" "+"Result");
//// show map listing

    /*** Google Map ***/
    
$(document).ready(function(){
      // cluster marker
      var allocation = alldata;  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    })
  
/*** Google Map (END) ***/  
                            
                       }
                      
                   }
        });           
});



$('#pricehighlow').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    valueSelected = this.value;
    if (valueSelected == "price_low" )
    {
       alldata.sort(function(a, b) {
          return parseFloat(a.price) - parseFloat(b.price);
        });
       var html = "";
       totalresult = alldata.length;
       for(var i=0; i < alldata.length; i++ )
              {
              
              html += '<div class="list_wrap">'
              html += '<a href="'+ host +'/rentapp/products/booking/'+ alldata[i].id +'">' 
              html += '<div class="img_sec">'
              html += '<img src="'+ host +'/rentapp/images/products/'+ alldata[i].image +' " alt="Slide Image">'
              html += '</div>'
              html += '<div class="caption">'
              html += '<h5><a href="'+ host +'/rentapp/products/booking/'+ alldata[i].id +'"></a>'+ alldata[i].name +'</h5>'
              html += '<div class="tr_rating">'
              html += '<span>'+ alldata[i].trips +' Booking</span>'
              html += '<div class="rating">'
              html += '</div>'
              html += '</div>'
              html += '<div class="price">'
              html += '<h5>$'+ alldata[i].price +'</h5>'
              html += '<span>Per Hour</span>'
              html += '</div>'
              html += '</div>'
              html += '</a>  '
              html += '</div>'
            }
            $('.sr-inner_wrap').html(html);
            $('.totalresult').html(totalresult +" "+"Result");

           //// show map listing

    /*** Google Map ***/
    
$(document).ready(function(){
      // cluster marker
      var allocation = alldata;  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    })
  
/*** Google Map (END) ***/  

    }
    else if (valueSelected == "price_high")
    {
      alldata.sort(function(a, b) {
          return parseFloat(b.price) - parseFloat(a.price);
        });
       var html = "";
       totalresult = alldata.length;
       for(var i=0; i < alldata.length; i++ )
              {
              
              html += '<div class="list_wrap">'
              html += '<a href="'+ host +'/rentapp/products/booking/'+ alldata[i].id +'">' 
              html += '<div class="img_sec">'
              html += '<img src="'+ host +'/rentapp/images/products/'+ alldata[i].image +' " alt="Slide Image">'
              html += '</div>'
              html += '<div class="caption">'
              html += '<h5><a href="'+ host +'/rentapp/products/booking/'+ alldata[i].id +'"></a>'+ alldata[i].name +'</h5>'
              html += '<div class="tr_rating">'
              html += '<span>'+ alldata[i].trips +' Booking</span>'
              html += '<div class="rating">'
              html += '</div>'
              html += '</div>'
              html += '<div class="price">'
              html += '<h5>$'+ alldata[i].price +'</h5>'
              html += '<span>Per Hour</span>'
              html += '</div>'
              html += '</div>'
              html += '</a>  '
              html += '</div>'
            }
            $('.sr-inner_wrap').html(html);
            $('.totalresult').html(totalresult +" "+"Result");

//// show map listing

    /*** Google Map ***/
    
$(document).ready(function(){
      // cluster marker
      var allocation = alldata;  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    })
  
/*** Google Map (END) ***/  

    }

});


$('#vehicletype').on('change', function (e) {
    var optionSelected1 = $("option:selected", this);
    valueSelected1 = this.value;
    if (valueSelected1 == "Old" )
    {
     alldataold= alldata.filter(function(hero) {
        return hero.conditions == "Old";
      });
       var html = "";
       totalresult = alldataold.length;
       for(var i=0; i < alldataold.length; i++ )
              {
              html += '<div class="list_wrap">'
              html += '<a href="'+ host +'/rentapp/products/booking/'+ alldataold[i].id +'">' 
              html += '<div class="img_sec">'
              html += '<img src="'+ host +'/rentapp/images/products/'+ alldataold[i].image +' " alt="Slide Image">'
              html += '</div>'
              html += '<div class="caption">'
              html += '<h5><a href="'+ host +'/rentapp/products/booking/'+ alldataold[i].id +'"></a>'+ alldataold[i].name +'</h5>'
              html += '<div class="tr_rating">'
              html += '<span>'+ alldataold[i].trips +' Booking</span>'
              html += '<div class="rating">'
              html += '</div>'
              html += '</div>'
              html += '<div class="price">'
              html += '<h5>$'+ alldataold[i].price +'</h5>'
              html += '<span>Per Hour</span>'
              html += '</div>'
              html += '</div>'
              html += '</a>  '
              html += '</div>'
            }
            $('.sr-inner_wrap').html(html);
            $('.totalresult').html(totalresult +" "+"Result");

            //// show map listing

    /*** Google Map ***/
    
$(document).ready(function(){
      // cluster marker
      var allocation = alldataold;  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    })
  
/*** Google Map (END) ***/   
          

    }
    else if (valueSelected1 == "New")
    {
     alldatanew = alldata.filter(function(hero) {
        return hero.conditions == "New";
      });
       var html = "";
       totalresult = alldatanew.length;
       for(var i=0; i < alldatanew.length; i++ )
              {
              html += '<div class="list_wrap">'
              html += '<a href="'+ host +'/rentapp/products/booking/'+ alldatanew[i].id +'">' 
              html += '<div class="img_sec">'
              html += '<img src="'+ host +'/rentapp/images/products/'+ alldatanew[i].image +' " alt="Slide Image">'
              html += '</div>'
              html += '<div class="caption">'
              html += '<h5><a href="'+ host +'/rentapp/products/booking/'+ alldatanew[i].id +'"></a>'+ alldatanew[i].name +'</h5>'
              html += '<div class="tr_rating">'
              html += '<span>'+ alldatanew[i].trips +' Booking</span>'
              html += '<div class="rating">'
              html += '</div>'
              html += '</div>'
              html += '<div class="price">'
              html += '<h5>$'+ alldatanew[i].price +'</h5>'
              html += '<span>Per Hour</span>'
              html += '</div>'
              html += '</div>'
              html += '</a>  '
              html += '</div>'
            }
            $('.sr-inner_wrap').html(html);
            $('.totalresult').html(totalresult +" "+"Result");

//// show map listing

    /*** Google Map ***/
    
$(document).ready(function(){
      // cluster marker
      var allocation = alldatanew;  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    })
  
/*** Google Map (END) ***/  


    }

});


$('#coloroption').on('change', function (e) {
    var optionSelected1 = $("option:selected", this);
    valueSelected1 = this.value;
    if (valueSelected1 != "" )
    {
     alldatacolor= alldata.filter(function(hero) {
        return hero.color == valueSelected1;
      });
       var html = "";
       totalresult = alldatacolor.length;
       for(var i=0; i < alldatacolor.length; i++ )
              {
              html += '<div class="list_wrap">'
              html += '<a href="'+ host +'/rentapp/products/booking/'+ alldatacolor[i].id +'">' 
              html += '<div class="img_sec">'
              html += '<img src="'+ host +'/rentapp/images/products/'+ alldatacolor[i].image +' " alt="Slide Image">'
              html += '</div>'
              html += '<div class="caption">'
              html += '<h5><a href="'+ host +'/rentapp/products/booking/'+ alldatacolor[i].id +'"></a>'+ alldatacolor[i].name +'</h5>'
              html += '<div class="tr_rating">'
              html += '<span>'+ alldatacolor[i].trips +' Booking</span>'
              html += '<div class="rating">'
              html += '</div>'
              html += '</div>'
              html += '<div class="price">'
              html += '<h5>$'+ alldatacolor[i].price +'</h5>'
              html += '<span>Per Hour</span>'
              html += '</div>'
              html += '</div>'
              html += '</a>  '
              html += '</div>'
            }
            $('.sr-inner_wrap').html(html);
            $('.totalresult').html(totalresult +" "+"Result");


            //// show map listing

    /*** Google Map ***/
    
$(document).ready(function(){
      // cluster marker
      var allocation = alldatacolor;  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    })
  
/*** Google Map (END) ***/  
          
}
    

});


////// range slider
// var min = 0;
// var max = 800;

$(function() {
var min = parseInt('<?php echo round($productsprice[0]["minprice"]);?>');
var max = parseInt('<?php echo round($productsprice[0]["maxprice"]);?>');
var minvalue = "";
$( "#price-range" ).slider({
    range: true,
    min: min,
    max: max,
    values: [ min, max ],
    slide: function( event, ui ) {
    $("#amount1").val( "$" + ui.values[ 0 ]);
    $("#amount2").val( "$" + ui.values[ 1 ]); 
    },
    change: function(event, ui) {
        minvalue = $("#amount1").val();
        maxvalue = $("#amount2").val();
        var minvalue1 = minvalue.split('$');
        var maxvalue1 = maxvalue.split('$');
        var alldatavalue =$.grep(alldata,function(val,i){
          return parseFloat(val.price) >= minvalue1[1] && parseFloat(val.price) <= maxvalue1[1];
          });
          var html = "";
          totalresult = alldatavalue.length;
          for(var i=0; i < alldatavalue.length; i++ )
              {
              html += '<div class="list_wrap">'
              html += '<a href="'+ host +'/rentapp/products/booking/'+ alldatavalue[i].id +'">' 
              html += '<div class="img_sec">'
              html += '<img src="'+ host +'/rentapp/images/products/'+ alldatavalue[i].image +' " alt="Slide Image">'
              html += '</div>'
              html += '<div class="caption">'
              html += '<h5><a href="'+ host +'/rentapp/products/booking/'+ alldatavalue[i].id +'"></a>'+ alldatavalue[i].name +'</h5>'
              html += '<div class="tr_rating">'
              html += '<span>'+ alldatavalue[i].trips +' Booking</span>'
              html += '<div class="rating">'
              html += '</div>'
              html += '</div>'
              html += '<div class="price">'
              html += '<h5>$'+ alldatavalue[i].price +'</h5>'
              html += '<span>Per Hour</span>'
              html += '</div>'
              html += '</div>'
              html += '</a>  '
              html += '</div>'
            }
            $('.sr-inner_wrap').html(html);
            $('.totalresult').html(totalresult +" "+"Result");

 //// show map listing

    /*** Google Map ***/
    
$(document).ready(function(){
      // cluster marker
      var allocation = alldatavalue;  
      var alllocations = [];
      var clusterMarker = []; 
      var sampleData  = [];
      for(i=0; i<Object.keys(allocation).length; i++){
    if(allocation[i]['lat'] != ''){
        alllocations.push([allocation[i]['name'],allocation[i]['lat'],allocation[i]['long'], allocation[i]['id'],allocation[i]['image'],allocation[i]['price'],allocation[i]['trips']] );
    } 
      
      sampleData.push({
          lat:allocation[i].lat,
          lng:allocation[i].long,
          name:allocation[i].name,
          id:allocation[i].id,
          image:allocation[i].image,
          price:allocation[i].price,
          trips:allocation[i].trips,
          }); 
}

      var map = new google.maps.Map(document.getElementById('mapview'), {
        center: new google.maps.LatLng(sampleData[0].lat,sampleData[0].lng),
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

      

      // Create infowindow
      var infoWindow = new google.maps.InfoWindow();
      //var marker, i;

       // Create OverlappingMarkerSpiderfier instsance
      var oms = new OverlappingMarkerSpiderfier(map,
        {markersWontMove: true, markersWontHide: true}); 

      // This is necessary to make the Spiderfy work
      oms.addListener('click', function(marker) {
        infoWindow.setContent(marker.desc);
        infoWindow.open(map, marker);
      });


      for (var i = 0; i < sampleData.length; i ++) {

        var point = sampleData[i];
        var location = new google.maps.LatLng(point.lat, point.lng);

        // create marker at location


       var marker = new google.maps.Marker({
          position: location,
          map: map
        });

         // text to appear in window
        marker.desc = '<div class="list_wrap">'+
          '<a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+  
                '<div class="img_sec">'+
                  '<img src="'+ host +'/rentapp/images/products/'+ point.image +' " alt="Image">'+
                '</div>'+
                '<div class="caption">'+
                  '<h5><a href="'+ host +'/rentapp/products/booking/'+ point.id +' ">'+ point.name +'</a></h5>'+
                  '<div class="tr_rating">'+
                    '<span>'+ point.trips +' Trips</span>'+
                  '</div>'+
                  '<div class="price">'+
                    '<h5>$ '+ point.price +'</h5>'+
                      '<span>Per Hour</span>'+
                  '</div>'+
                '</div>'+
                '</a>'+
              '</div>';

        // needed to make Spiderfy work
        oms.addMarker(marker);

        // needed to cluster marker
        clusterMarker.push(marker);
      }

      new MarkerClusterer(map, clusterMarker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m', maxZoom: 10});
    })
  
/*** Google Map (END) ***/  


    }
  });
  $( "#amount1" ).val( "$" + $( "#price-range" ).slider( "values", 0 ) );
  $( "#amount2" ).val( "$" + $( "#price-range" ).slider( "values", 1 ) );

  });


$('#resetfilter').click(function() {
    location.reload();
});

</script>
