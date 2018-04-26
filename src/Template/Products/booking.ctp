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
        <section class="book-banner">
            <div class="img-wrap">
                <img src="<?php echo $this->request->webroot; ?>images/booking-banner.jpg" alt="Slider-Image">
            </div>
            <div class="img-wrap">
                <img src="<?php echo $this->request->webroot; ?>images/booking-banner.jpg" alt="Slider-Image">
            </div>
            <div class="img-wrap">
                <img src="<?php echo $this->request->webroot; ?>images/booking-banner.jpg" alt="Slider-Image">
            </div>
        </section><!-- Book Banner End Here --> 
        <?php //print_r ($watercraft); ?>
        <section class="desc-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="col-md-8 col-md-8">
                            <div class="inner-content">
                                <div class="head-sec">
                                    <h2><?php if(isset($watercraft['name'])){ echo $watercraft['name']; } ?></h2>
                                    <div class="tr-star">
                                        <span><?php if(isset($watercraft['trips'])){ echo $watercraft['trips']; } ?> Booking</span>
                                        <div class="star">
                                            <?php
                                            $star =  $watercraft['ava_rating'];
                                            for ($i=1; $i < $star; $i++) {
                                                    echo "<i class='sr-icon'></i>";
                                             } ?>
                                            </div>
                                    </div>
                                </div>
                                <div class="description-sec">
                                    <h5>Description</h5>
                                    <p><?php echo html_entity_decode($watercraft['description'], ENT_QUOTES, "UTF-8"); ?></p>
                                </div>
                                <div class="review-sec">
                                    <h5>Reviews</h5>
                                    <?php if(!empty($watercraft['reviews'])){
                                     foreach($watercraft['reviews'] as $reviews){ 
                                     ?>
                                    <div class="wrap">
                <div class="avatar">
                <?php if($watercraft['user']['image'] != ""){ ?>  
                <img src="<?php echo $this->request->webroot."images/users/".$watercraft['user']['image']; ?>" alt="profile image">
                 <?php }else{ ?>
                <img src="<?php echo $this->request->webroot."images/users/noimage.png"; ?>" class="ful_lnght">
                 <?php } ?>

                                        </div>
                                        <h5 class="name"><?php echo $reviews['user']['name']; ?></h5>
                                        <div class="star">
                                            <?php
                                            $star =  $reviews['rating'];
                                            for ($i=1; $i <= $star; $i++) {
                                                    echo "<i class='sr-icon'></i>";
                                             } ?>
                                        </div>
                                        <p><?php echo html_entity_decode($reviews['review'], ENT_QUOTES, "UTF-8"); ?></p>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div><!-- Left Section End Here -->
                        <div class="col-md-4 col-sm-4">
                            <div class="inner-sec">
                                <div class="price-sec">
                                    <h5>$<?php echo $watercraft['price']; ?></h5>
                                    <span>Per Hour</span>
                                </div>
                                <div class="form-sec">
                                
                                    <form class="form-horizontal" name="sr-form" method="get" action="<?php echo $this->request->webroot."products/bookingdetail"; ?>">
                                        <div class="form-group">
                                            <label>Trip Start</label>
                                            <div class="field-group">
                                                <input type="text" class="form-control" id="trip_start" placeholder="Select Date" name="startdate" value="">
                                                <select name="timestart" id="timestart" class="form-control">
                                                    <option value="">Select Time</option>
                                                    <?php foreach($times as $key=>$val){ ?>
                                                    <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Trip End</label>
                                            <div class="field-group">
                                                <input type="text" class="form-control" id="trip_end" placeholder="Select Date" name="enddate" value="">
                                                <select  name="timestop" id="timestop" class="form-control">
                                                    <option value="">Select Time</option>
                                                    <?php foreach($times as $key=>$val){ ?>
                                                    <option value="<?php echo $val; ?>"><?php echo $val; ?></option> 
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="price-desc">
                                             <label>Pick Location <span class="not-desc"><?php echo $watercraft['pick_location']; ?></span></label>
                                             <input type="hidden" name="pick_location" value="<?php echo $watercraft['pick_location']; ?>"/>
                                            <label>Drop Location <span class="not-desc"><?php echo $watercraft['drop_location']; ?></span></label>
                                            <input type="hidden" name="drop_location" value="<?php echo $watercraft['drop_location']; ?>"/>
                                            <input type="hidden" name="product_id" value="<?php echo $watercraft['id']; ?>"/>
                                            <input type="hidden" name="user_id" value="<?php echo $watercraft['user']['id']; ?>"/>


                                        </div>
                                        <div class="price-desc">
                                            <label>Hourly Price <span class="not-desc">$<span class="not-desc" id="pro_price"><?php echo $watercraft['price']; ?></span></span></label>
                                            <input type="hidden" name="hourly_price" value="<?php echo $watercraft['price']; ?>"/>

                                            <label>Total Hours<span class="not-desc"><p id="diff">0</p></span></label>
                                            <input type="hidden" name="total_hours"/>

                                            <label>Total Price <span class="not-desc"><p id="totalamount">$0</p></span></label>
                                            <input type="hidden" name="total_price"/>
                                          
                                            <!-- <label>Weekly Discount Applied <span>15%</span></label> -->
                                        </div>
                                        <?php if(!$loggeduser){ ?>
                                        <a href="#" data-toggle="modal" data-target="#login" class="log_in"> Go To Checkout</a>
                                        <?php }else{ ?>
                                        <input type="submit" disabled="disabled" id="submitform" class="btn btn-default btn-check" value="Go To Checkout">
                                        <?php } ?>  
                                    </form>
                                </div><!-- Form Section End Here -->
                                <div class="owned-sec">
                                    <h5>Owned By</h5>
                                    <div class="list">
                                        <h5 class="owner_nm"><?php echo $watercraft['user']['name']?><?php echo " "; ?><?php echo $watercraft['user']['last_name']; ?></h5>
                                        <div class="avtar">
                                            <?php if($watercraft['user']['image']){ ?> 
                <img src="<?php echo $this->request->webroot."images/users/".$watercraft['user']['image']; ?>" alt="Slide Image">
                 <?php }else{ ?>
                <img src="<?php echo $this->request->webroot."images/users/noimage.png"; ?>" alt="Slide Image"><?php } ?> 
                                        </div>
                                    </div>                                    
                                    <div class="rt_time">
                                    </div>
                                    <p class="alert-box2" style="color: red;"></p>
                                    <?php if($loggeduser){ ?>
                                    <?php if(!$check){?>
                                    <button type="button" id="Favourites" class="btn btn-default btn-fav">Add To Favourite</button>
                                    <?php } else {?>
                                    <p class="fav_btn">Already favourite.</p>
                                    <?php } ?>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </section><!-- End Here Description Section -->
        <section class="map-sec">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3429.679547866961!2d76.84327431473727!3d30.727407981639068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f92df701b13cb%3A0xc502e2bb22b11323!2sOffice+Space+for+Rent+in+IT+Park%2C+Chandigarh!5e0!3m2!1sen!2sin!4v1521109477249" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section><!-- End HEre Map Section-->
        <div class="clr"></div>
    </section><!-- Content Section End Here -->


<!-- Login Modal HTML Include Here -->
    <div id="login" class="modal fade account-md" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <p class="alert-box1" style="color: red;"></p>
                <div class="modal-body">
                    <form class="form-horizontal login-fm" id="login-form" name="Login-Form" action="" method="post" >
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" id="email" class="form-control" name="username" placeholder="" required="required">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password"  required="required">
                        </div>
                        <input type="button" id="loginbutton" class="btn btn-default btn-login" value="Login">
                    </form>
                    <a class="forgot-pass" href="<?php echo $this->request->webroot; ?>users/forgot">Forgot Password?</a> 
                </div>
                <div class="modal-footer">
                    <span>OR</span>
                    <a href="#" class="btn btn-default btn-fb fb_login"><img src="images/fb-btn.png" alt="Icon">Login With Facebook</a>
                    <a href="javascript:void(0)" class="btn btn-default btn-gg" id="google_login"><img src="images/gg-btn.png" alt="Icon">Login With Google Plus</a>
                    <a href="#" class="btn btn-default btn-ac" data-toggle="modal" data-target="#signup">Don't Have an Account?</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal HTML End Here -->




    <script>   
    function calculateTime() {
            //get values
            var valuestart = $("select[name='timestart']").val();
            var valuestop = $("select[name='timestop']").val();
            //date
            var valuedatestart = $("input[name='startdate']").val(); 
            var valuedateend = $("input[name='enddate']").val(); 
            //price

            var price = $("#pro_price").text();

            //create date format          
            var timeStart = new Date(valuedatestart +' '+ valuestart);
            var timeEnd = new Date(valuedateend +' '+ valuestop);

            var hourDiff = ((timeEnd - timeStart)/1000/60/60);  
             var diff= parseInt(hourDiff)
            var total_price=parseInt(hourDiff*price);  

            if (total_price > 0) {
               $("#totalamount").html('$'+total_price)  
               $("input[name='total_price']").val(total_price);
            }
            else
            {
               // alert ("correct time");
                total_price= 0;
                $("#totalamount").html('$'+total_price)
            }
            
            if (diff > 0) {
               $("#diff").html(diff) 
               $("input[name='total_hours']").val(diff); 
            }
            else
            {
                //alert ("correct time..");
                diff= 0;
                $("#diff").html(diff);
            }

            if (total_price <= 0) {
             $("#submitform").attr("disabled", "disabled");
}
            else{
                $("#submitform").removeAttr("disabled");
            
            }




    }

    $("select").change(function(){
            calculateTime();
    });

$(function() {
    var fromDate = $("#trip_start").datepicker({
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

    var toDate = $("#trip_end").datepicker({
        defaultDate: "+1w",
        changeMonth: true
    });
});

             
$().ready(function() {               
 // login

    var formlogin = $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            
        },
        messages: {
            email: "Please enter a valid email address",
            password: "Password must be atleast 8 character long"
            
        }
    });


    jQuery("#loginbutton").click(function(event) {
          $.ajax({
            url: '<?php echo $this->request->webroot; ?>users/login',
            data: $('#login-form').serialize(),
            method: 'post',
            dataType: 'json',
           beforeSend: function(){ 
                var info_html = '<div class="alert alert-info"><strong>Please Wait...</strong></div>';
                $('.alert-box1').html(info_html).css('display', 'block');
            },
            success: function(d){ 
                
                if (d.response.isSucess == 'false') {
                     $('.alert-box1').html(d.response.msg).css('display', 'block');   
                } else {
                    $('.alert-box1').html(d.response.msg).css('display', 'block'); 
                        location.reload();
                }
            }
        });           
});



/// add fav

jQuery("#Favourites").click(function(event) {
          $.ajax({
            url: '<?php echo $this->request->webroot; ?>favourites/add',
            data: {user_id: '<?php echo $loggeduser["id"] ?>',product_id : '<?php echo $watercraft["id"];?>'},
            method: 'post',
            dataType: 'json',
            success: function(msg){ 
                if (msg.isSuccess == 'false') {
                     $('.alert-box2').html(msg.msg).css('display', 'block');   
                } else {
                    $('.alert-box2').html(msg.msg).css('display', 'block'); 
                        
                }
            }
        });           
});

    
});      
   

    </script>