<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = '';      
?>
<!DOCTYPE html>
<html lang="en">
 <head>
<?=  $this->Html->charset() ?>     
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $cakeDescription ?> Boat Rent</title>   
<link rel="icon" type="image/x-icon" href="<?php echo $this->request->webroot."images/website/favicon-32x32.png";?>" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?= $this->Html->css( array('custom/bootstrap.min.css',
                'custom/bootstrap-theme.min.css',
                'custom/jquery-ui.css',
                'custom/slick.css',
                'custom/theme.css',
                'custom/slick-theme.css',
                'docsupport/chosen.css'
                ) ) ?>  
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>  
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script type="text/javascript" src="js/assets/html5shiv.min.js"></script>
<script type="text/javascript" src="js/assets/respond.min.js"></script>
<![endif]-->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700italic,400italic,600italic,600"
          rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 
   <!-- <script src='https://www.google.com/recaptcha/api.js' async defer></script>     -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
    <?= $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'jquery-ui.min.js', 'jquery.dataTables.min', 'dataTables.bootstrap.min.js','docsupport/chosen.js')) ?>      
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>     
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>  
 <script src="https://apis.google.com/js/platform.js"></script> 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/OverlappingMarkerSpiderfier/1.0.3/oms.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js"></script>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQrWZPh0mrrL54_UKhBI2_y8cnegeex1o&sensor=false&libraries=places"></script>   
  
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <style>
      /* .alert-danger{text-align: center;}
       .alert-success{text-align: center;}
       .alert-success{
		padding: 10px;
		font-size: 15px;
		margin: 0px;
	}
	.message.error{
		background: #cc0000;
		padding: 10px;
		color: #fff;
		font-size: 15px;
		margin: 0px 0px 0px 0px;
	}
        .my-error-class{
            color:red !important;
        }
        .my-valid-class{
          color:#49BA64 !important;  
        }
        #added_items h4{text-align: center; }
        .stock {color: red;} 
            */
    </style>   
  <script>      
  // $( function() {  
  //   $( "#dob" ).datepicker({ changeYear: true });    
  // } );
  
 //  $(document).ready(function(){
	// 	$('#example2').DataTable({
	// 		'paging'      : true,
	// 		'lengthChange': false,
	// 		'searching'   : true,
	// 		'ordering'    : false,
	// 		'info'        : true,
	// 		'autoWidth'   : false,
	// 		'order'		  : [[ 1, "desc" ]]
	// 	});
	// });  
 </script>  

<!-- Google Login -->
    <script>
    var googleUser = {};
    function attachSignin(element) {
        auth2.attachClickHandler(element, {},
            function(googleUser) {
                var profile = googleUser.getBasicProfile();
                var google_id = profile.getId();
                var full_name = profile.getName();
                var image = profile.getImageUrl();
                var g_email = profile.getEmail()
                var uid = '<?php echo $loggeduser["id"]; ?>';
                if (google_id != '' && uid == '') {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $this->request->webroot ?>users/gplogin",
                        data: {
                            id: profile.getId(),
                            name: profile.getName(),
                            first_name: profile.getGivenName(),
                            last_name: profile.getFamilyName(),
                            email: profile.getEmail(),
                            action: 'gplogin'
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            //window.location.href = resdata.link;
                            if (data.isSuccess != 'true') {
                                //alert(data.msg);
                            } else {
                                location.reload();
                            }
                        },
                        error: function() {}
                    });
                }
            },
            function(error) {
                //alert(JSON.stringify(error, undefined, 2));
            });
    }
    var startApp = function() {
        gapi.load('auth2', function() {
            auth2 = gapi.auth2.init({
                client_id: '402926156603-7het1br5tplo68thq21g6sfqfdnavocn.apps.googleusercontent.com',
                cookiepolicy: 'single_host_origin',
            });
            attachSignin(document.getElementById('google_login'));
            //attachSignin(document.getElementById('customBtn1'));
        });
    };
    </script>
<!-- Google Login (End) -->

  </head>
  <body>  
<header class="st_header">
		<nav class="navbar navbar-default st_nav">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" area-expanded="false">
								<span class="sr-only">Toggle Navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- <a href="index.html" class="navbar-brand">Logo</a> -->
							<a class="navbar-brand" href="<?php echo $this->request->webroot ?>stores/index">Logo</a> 
						</div><!-- Navbar Logo Section End Here -->
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="<?php echo $this->request->webroot . "staticpages/makemoneywatercrafts"; ?>">List Your Water Crafts</a></li>
								<li><a href="#">Learn More</a>
									<ul class="sub-menu">
	<!-- <li class="<?php  if($this->request->params['action'] == 'search' ) { echo "active"; }?>"> <a href="<?php echo $this->request->webroot; ?>products/search"><i class="fa fa-search" aria-hidden="true"></i>Search</a></li> -->								

										<li><a href="booking.html">Booking Watercrafts</a></li>
										<li><a href="rent-a-craft.html">Renting Watercrafts</a></li>
										<li><a href="list-your-craft.html">Make Money From Your Car</a></li>
										<li><a href="<?php echo $this->request->webroot . "staticpages/trustandsafety"; ?>">Trust & Safety</a></li>
										<li class="<?php  if($this->request->params['action'] == 'contact' ) { echo "active"; }?>"><a href="<?php echo $this->request->webroot; ?>users/contact">Contact Us</a></li>
									</ul>
								</li>
								
                     <?php if(!$loggeduser){ ?>  
                    <li class="sgn_rht active"><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li> 
                    <li class="<?php  if($this->request->params['action'] == 'add' ) { echo "active"; }?>"><a href="#" data-toggle="modal" data-target="#signup"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Up</a></li>
                    <?php }else{ ?>
                    <li><a href="#">Dashboard</a>
									<ul class="sub-menu">
										<li class="<?php  if($this->request->params['action'] == 'history' ) { echo "active"; }?>">    
                     					<a href="<?php echo $this->request->webroot; ?>orders/orderhistory">History</a>  
                    					</li>

                    					<li class="<?php  if($this->request->params['action'] == 'favourite' ) { echo "active"; }?>">    
                     					<a href="<?php echo $this->request->webroot; ?>favourites/favourite">My Favourites</a>  
                    					</li>

                    					<li class="<?php  if($this->request->params['action'] == 'upcoming' ) { echo "active"; }?>">    
                     					<a href="<?php echo $this->request->webroot; ?>orders/upcoming">My Upcoming Trips</a>  
                    					</li>

									</ul>
					</li>
                    <li><a href="#">Profile</a>
									<ul class="sub-menu">
										<li class="<?php  if($this->request->params['action'] == 'changepassword' ) { echo "active"; }?>"> <a href="<?php echo $this->request->webroot; ?>users/changepassword"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
										<li class="<?php  if($this->request->params['action'] == 'myaccount' ) { echo "active"; }?>"> <a href="<?php echo $this->request->webroot; ?>users/myaccount"><i class="fa fa-key" aria-hidden="true"></i>My Profile</a></li>
					                    <li class=""><a class="" href="<?php echo $this->request->webroot ?>users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
									</ul>
					</li>
					<?php } ?>  
            	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="clr"></div>
	</header><!-- Header Section End Here -->
      <script>startApp();</script>
      <!--------banner section------->
 <?= $this->fetch('content') ?>       
      
<!-----------footer-section--------------> 

<footer class="st-footer">
		<div class="top-sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 no-padding">
						<div class="col-md-3 col-sm-3">
							<div class="foot-link">
								<div class="head-sec">
									<h5>Get Started</h5>
								</div>
								<ul>
									<li><a href="#">Get The Iphone app</a></li>
									<li><a href="#">Get The Android app</a></li>
									<li><a href="<?php echo $this->request->webroot . "staticpages/rentwatercrafts"; ?>">Rent a Water Crafts</a></li>
									<li><a href="<?php echo $this->request->webroot . "staticpages/makemoneywatercrafts"; ?>">Make money with your Water Crafts</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="foot-link">
								<div class="head-sec">
									<h5>Learn More</h5>
								</div>
								<ul>
									<li><a href="<?php echo $this->request->webroot . "staticpages/howweworks"; ?>">How we Works</a></li>
									<li><a href="<?php echo $this->request->webroot . "staticpages/protections"; ?>">Protection</a></li>
									<li><a href="<?php echo $this->request->webroot . "staticpages/privacy"; ?>">Policies</a></li>
									<li><a href="<?php echo $this->request->webroot . "staticpages/trustandsafety"; ?>">Trust & Safety</a></li>
									<li><a href="<?php echo $this->request->webroot . "staticpages/ownertools"; ?>">Owner tools</a></li>
									<li><a href="<?php echo $this->request->webroot . "staticpages/faq"; ?>">Traveler FAQ's</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="foot-link">
								<div class="head-sec">
									<h5>Learn More</h5>
								</div>
								<ul class="citiz">
									<li><a href="#">Atlanta</a></li>
									<li><a href="#">Montreal</a></li>
									<li><a href="#">Boston</a></li>
									<li><a href="#">San Diego</a></li>
									<li><a href="#">Chicago</a></li>
									<li><a href="#">San Francisco</a></li>
									<li><a href="#">Denver</a></li>
									
									<li><a href="#">Seattle</a></li>
									<li><a href="#">Honolulu</a></li>
									<li><a href="#">Toronto</a></li>
									<li><a href="#">Houston</a></li>
									<li><a href="#">Washington, DC</a></li>
									<li><a href="#">Los Angeles</a></li>
									<li><a href="#">View airports</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
							<div class="foot-link">
								<div class="head-sec">
									<h5>Talk To Us</h5>
								</div>
								<ul class="social-list">
									<li><a href="#"><img src="<?php echo $this->request->webroot ?>images/fb.png" alt="Facebook"></a></li>
									<li><a href="#"><img src="<?php echo $this->request->webroot ?>images/tw.png" alt="Twitter"></a></li>
									<li><a href="#"><img src="<?php echo $this->request->webroot ?>images/gg.png" alt="Google Plus"></a></li>
									<li><a href="#"><img src="<?php echo $this->request->webroot ?>images/pn.png" alt="Pintrest"></a></li>
								</ul>
								<ul>
									<li><a href="#">Read Our Blog</a></li>
									<li><a href="<?php echo $this->request->webroot; ?>users/contact"">Contact Customer Support</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</div><!-- Top Sec End Here -->
		<div class="copyright">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<ul class="menu-list">
							<li><a href="<?php echo $this->request->webroot . "staticpages/aboutus"; ?>">About Us</a></li>
							<!-- <li><a href="<?php echo $this->request->webroot . "staticpages/trustandsafety"; ?>">Press</a></li> -->
							<!-- <li><a href="<?php echo $this->request->webroot . "staticpages/trustandsafety"; ?>">Team</a></li> -->
							<!-- <li><a href="<?php echo $this->request->webroot . "staticpages/trustandsafety"; ?>">Jobs</a></li> -->
							<!-- <li><a href="<?php echo $this->request->webroot . "staticpages/trustandsafety"; ?>">Open</a></li> -->
							<!-- <li><a href="<?php echo $this->request->webroot . "staticpages/trustandsafety"; ?>">Roady</li> -->
							<li><a href="<?php echo $this->request->webroot . "staticpages/term"; ?>">Terms</a></li>
							<li><a href="<?php echo $this->request->webroot . "staticpages/privacy"; ?>">Privacy</a></li>
						</ul>
						<p class="right-sec">&copy; 2018 Logo</p>
					</div>
				</div>
			</div>
			<div class="clr"><div>
		</div><!-- End Here Copyright Section -->
	</footer>

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
					<a href="#" class="btn btn-default btn-fb fb_login"><img src="<?php echo $this->request->webroot; ?>images/fb-btn.png" alt="Icon">Login With Facebook</a>
					<a href="javascript:void(0)" class="btn btn-default btn-gg" id="google_login"><img src="<?php echo $this->request->webroot; ?>images/gg-btn.png" alt="Icon">Login With Google Plus</a>
					<a href="#" class="btn btn-default btn-ac" data-toggle="modal" data-target="#signup">Don't Have an Account?</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Login Modal HTML End Here -->
        
        <!-- Sign Up Modal HTML Include Here -->
	<div id="signup" class="modal fade account-md" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Let's Get Started</h4>
				</div>
				<p class="mymessage" style="color: red;"></p>
				<div class="modal-body">
                                    <form class="form-horizontal login-fm" id="user-form" name="Login-Form"  method="post" >
						<div class="form-group">
							<label>First Name</label>
                                                        <?php echo $this->Form->control('name', [
                                                        'label' => false,
                                                        'class' => 'form-control'
                                                    ]); ?>
                           <?php echo $this->Form->error('name', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<?php echo $this->Form->control('last_name', [
                                                        'label' => false,
                                                        'class' => 'form-control'
                                                    ]); ?>
                            <?php echo $this->Form->error('last_name', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>                        
						</div>
						<div class="form-group">
							<label>Email</label>
            <input name="email" class="form-control" placeholder="" type="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>">
           
          <?php echo $this->Form->error('email', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
    
						</div>
						<div class="form-group">
							<label>Password</label>
							<input name="password1" class="form-control ctrl_smn" placeholder="" id="password1" type="password">
               <?php echo $this->Form->error('password1', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
      
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input name="password" class="form-control ctrl_smn" placeholder="" id="password2" type="password">
   
    <?php echo $this->Form->error('password', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
    </div>
						<div class="checkbox">
							<label><input type="checkbox" name="tnc" required="required" value=""> <span class="check-box"></span> I agree to the <a href="<?php echo $this->request->webroot . "staticpages/term"; ?>">terms and conditions</a></label>

							<?php echo $this->Form->error('tnc', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
						</div>

						<input type="button" id="signupbutton" class="btn btn-default btn-login" value="Sign Up">
                                                
					</form>
				</div>
				<div class="modal-footer">
					<span>OR</span>
					<a href="#" class="btn btn-default btn-fb fb_login"><img src="<?php echo $this->request->webroot; ?>images/fb-btn.png" alt="Icon">Login With Facebook</a>
					<a href="#" class="btn btn-default btn-gg"><img src="<?php echo $this->request->webroot; ?>images/gg-btn.png" alt="Icon">Login With Google Plus</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Sign Up HTML End Here -->



    <!-- <script type="text/javascript" src="<?php echo $this->request->webroot;?>js/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo $this->request->webroot;?>js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?php echo $this->request->webroot;?>js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo $this->request->webroot;?>js/slick.js"></script>
    <script type="text/javascript" src="<?php echo $this->request->webroot;?>js/custom.js"></script>
    
    <script>
$().ready(function() {
	var form = $("#user-form").validate({
		rules: {
			name: "required",
            last_name: "required",
			email: {
				required: true,
				email: true
			},
			password1: { 
				required: true,
				minlength: 8
			},
			password: {
				equalTo: "#password1"
			},
			tnc:"required",
			
		},
		messages: {
			name: "Please enter your name",
			last_name: "Please enter your last name",
			tnc:"Terms and Condition not selected",
			email: "Please enter a valid email address",
			password1: "Password must be atleast 8 character long",
			password: {
				equalTo: "Password and confirm password should be same"
			}
		}
	});

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
        

  jQuery("#signupbutton").click(function(event) {
         if(form.form()){  
         jQuery.ajax({
                   url: '<?php echo $this->request->webroot ;?>users/signup', 
                   data: jQuery('#user-form').serialize(),
                   type: 'POST',
                   dataType: "json",
                   success: function (msg) {    
                       if (msg.status === true) 
                       {
                           jQuery(".mymessage").html(msg.msg); 
                           // jQuery("#user-form").submit();
                       }
                       else
                       { 
                             event.preventDefault();
                           jQuery(".mymessage").html(msg.msg);
                           location.reload();
                       } 
                   }
               });
               }                 
 event.preventDefault();    
});
   
jQuery("#password2").keyup(function(event) {
    if (event.keyCode === 13) {
        jQuery("#signupbutton").click(); 
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


 
 
});
</script>









<!---Start-Facebook Login-->
    <script type="text/javascript">
        function testAPI() {
            FB.api('/me?fields=id,email,name,birthday,locale,age_range,gender,first_name,last_name,picture', function(response) {  
                data = {
                    myid : response,
                    action:'fblogin'
                }
                $.ajax({
                    url: '<?php echo $this->request->webroot ?>users/fblogin',
                    data: data,
                    method: 'post',
                    dataType: 'json',
                    success: function(resdata){
                        console.log(resdata);
                        //window.location.href = resdata.link;
                        if(resdata.isSuccess != 'true'){                        	
                            alert(resdata.msg);
                            print_r(resdata);
                        }else{
                            location.reload();
                            print_r(resdata);
                        }
                    }
                });
            });
        }
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                testAPI();
            } else {
                console.log('Please log ') ;
            }
        }
        $(document).ready(function(){
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '125592314769501',
                    cookie     : true,  
                    xfbml      : true, 
                    version    : 'v2.10' 
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            $(function() {
                $('.fb_login').on('click', function (e) {
                    e.preventDefault();
                    FB.login(function(response) {
                        checkLoginState();
                    }, {scope: 'email'});
                });
            });
        })
    </script>
<!--End-Facebook Login-->

    
    
</body>
</html> 


