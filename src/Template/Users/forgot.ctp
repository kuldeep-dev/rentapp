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
              <h3>Forgot Password</h3>
                <p class="mymessage"></p>  
                 <span class="req_fld">Enter Email Address to Reset Password</span>
                 <?= $this->Form->create('', ['type' => 'file','id' => 'forgot-form']) ?>
                     <div class="col-md-12 col-sm-12 no-padding">
                      <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                    </div>
                    </div>
                    
                 <?= $this->Form->button(__('Send'),['class'=>'btn btn-success cntr_grn','id'=>'forgotbutton','type'=>'button']); ?>
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
   jQuery("#forgotbutton").click(function(event) { 
            
          jQuery.ajax({
                    url: '<?php echo $this->request->webroot ;?>users/forgot', 
                    data: jQuery('#forgot-form').serialize(),
                    type: 'POST',
                    dataType: "json",
                    success: function (msg) {    
                        if (msg.response.isSucess != true) 
                        {
                            jQuery(".mymessage").html(msg.response.msg); 
                            //jQuery("#forgot-form").submit(); 
                        }
                        else
                        { 
                            event.preventDefault();
                            jQuery(".mymessage").html(msg.response.msg);
                        }
                    }
                });
  event.preventDefault();    
});
</script> 
  