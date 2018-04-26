

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
              <h3>Change Password</h3>
              <div class="sign-flash">
              <?= $this->Flash->render() ?>   
              </div>
                 <?= $this->Form->create('', ['type' => 'file','class' => 'form-horizontal', 'id' => 'change-from']) ?>
                    <div class="col-md-12 col-sm-12 no-padding">
                      <div class="form-group">
                         <input type="password" placeholder="Enter Your old Password" name="opassword" class="form-control" id="opassword">
                         <?php echo $this->Form->error('opassword', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                    </div>
                    </div>

                    <div class="col-md-12col-sm-12 no-padding">
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Your New Password" name="password1" id="password1">
                        <?php echo $this->Form->error('password1', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                    </div>
                    </div>

                   <div class="col-md-12 col-sm-12 no-padding">
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password">
                        <?php echo $this->Form->error('password', null, array('class' => 'label label-block label-danger text-left', 'wrap' => 'label')); ?>
                    </div>
                    </div>

                <?= $this->Form->button(__('Change Password'),['class'=>'btn btn-success cntr_grn']); ?>
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
         $("#change-from").validate({
                 rules: { 
                         opassword: "required",
                         password1: {
				required: true,
				minlength: 8
			},
                         password: {
                                 equalTo: "#password1"
                         }
                 },
                 messages: {
                         opassword: "Please enter your old password",
                         password1: "Password must be atleast 8 character long", 
                         password: {
                                 equalTo: "Password and confirm password should be same"
                         }		
                 }
         });
 });
 </script>
