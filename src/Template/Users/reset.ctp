
<section class="st_content">
    <section class="profile_banner">
      <img src="<?php echo $this->request->webroot."images/profile-banner.jpg"; ?>" alt="Banner">
      <div class="overlay"></div>
      <div class="clr"></div>
    </section><!-- Banner Section End Here -->
    <section class="profile_sec">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-md-12">
            <div class="profile_outer">
              <div class="profile_wrap forgot-pass">
              <h3>Reset your password</h3>
              <div class="sign-flash">
              <?= $this->Flash->render() ?>   
              </div>
                 <?= $this->Form->create('', ['type' => 'file', 'class' => 'form-horizontal','id' => 'reset-form']) ?>

                    <div class="col-md-12 col-sm-12 no-padding">
                      <div class="form-group">
                         <input type="password" class="form-control" name="password1" id="password1" placeholder="New Password" required="required">
                         <?php echo $this->Form->error('password1', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                    </div>
                    </div>

                    <div class="col-md-12 col-sm-12 no-padding">
                      <div class="form-group">
                         <input type="password" class="form-control" name="password" placeholder="Confirm Password" required="required">
                         <?php echo $this->Form->error('password', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                    </div>
                    </div>
                     <p class="mymessage"></p>     
               
                 <?= $this->Form->button(__('Reset Password'),['class'=>'btn btn-success cntr_grn','id'=>'resetbutton','type'=>'submit']); ?>
                 <?= $this->Form->end() ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="clr"></div>
  </section><!-- Content Section End Here -->

<script> 
$(document).ready(function() {
	$("#reset-form").validate({ 
		rules: {
			password1: {
				required: true,
				minlength: 8
			},

			password: {
				equalTo: "#password1"
			}
		},
		messages: {
			password1: {
				required: "Password must be atleast 8 character long",
				minlength: "Password must be atleast 8 character long"
			},

			password: {
				equalTo: "Password and confirm password should be same"
			}		
		}
	});
        
         
//        jQuery("#resetbutton").click(function(event) { 
            
//           jQuery.ajax({
//                     url: '<?php echo $this->request->webroot ;?>users/reset', 
//                     data: jQuery('#reset-form').serialize(),
//                     type: 'POST',
//                     dataType: "json",
//                     success: function (msg) {    
//                         if (msg.response.isSucess != true) 
//                         {
//                             jQuery(".mymessage").html(msg.response.msg); 
//                            // jQuery("#reset-form").submit();  
//                         }
//                         else
//                         { 
//                               event.preventDefault();
//                             jQuery(".mymessage").html(msg.response.msg);
//                         }
//                     }
//                 });
//   event.preventDefault();     
// });   
        
});
</script>

