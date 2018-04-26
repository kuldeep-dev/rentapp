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
              <div class="profile_wrap">
              <div class="sign-flash">
              <?= $this->Flash->render() ?>   
              </div>
                <!-- <form class="form-horizontal" method="Post" action="#" name="Edit-Profile"> -->
                <?= $this->Form->create($user, ['id' => 'edit-form','class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) ?>
                  <div class="profile_left">
                    <div class="avatar">
                      <?php if($user['image']){ ?>
                        <img class="currentimg" src="<?php echo $this->request->webroot."images/users/".$user['image']; ?>">
                        <?php }else{ ?>
                        <img class="currentimg" src="<?php echo $this->request->webroot."images/users/noimage.png"; ?>">
                        <?php } ?>
                    </div>
                    <?php echo $this->Form->control('image', ['class' => 'form-control ctrl_smn smm_alg','type'=>'file','id'=>'img' ,'label' => false]); ?>
                    <!-- <input type="button" class="btn btn-default" value="Save" name=""> -->
                     <?= $this->Form->button(__('Save'), ['class' => 'btn btn-default']) ?>
                  </div>
                  <div class="profile-right">
                    <div class="col-md-6 col-sm-6 left-pad">
                      <div class="form-group no-padding">
                        <!-- <input type="text" name="name" class="form-control" placeholder="First Name" value=""> -->
                        <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false,'placeholder'=>'Name']); ?>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 right-pad">
                      <div class="form-group no-padding">
                        <!-- <input type="text" name="last_name" class="form-control" placeholder="Last Name" value=""> -->
                        <?php echo $this->Form->control('last_name', ['class' => 'form-control', 'label' => false,'placeholder'=>'Last Name']); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label><img src="<?php echo $this->request->webroot."images/calender.png"; ?>" alt="Calender"></label>
                      <!-- <input type="date" name="dob" class="form-control" placeholder="10/02/1995" value=""> -->
                      <?php echo $this->Form->control('dob', ['type' => 'text','class' => 'form-control', 'label' => false,'placeholder'=>'Date of birth','id'=>'dob']); ?>
                    </div>
                    <div class="form-group">
                      <label><img src="<?php echo $this->request->webroot."images/home.png";?>" alt="Home"></label>
                      <!-- <input type="text" name="address" class="form-control" placeholder="Address" value=""> -->
                      <?php echo $this->Form->control('address', ['class' => 'form-control', 'label' => false,'placeholder'=>'Address']); ?>
                    </div>
                    <div class="col-md-6 col-sm-6 left-pad">
                      <div class="form-group">
                        <label><img src="<?php echo $this->request->webroot."images/email.png";?>" alt="Email"></label>
                        <!-- <input type="email" name="email" class="form-control" placeholder="Email" value=""> -->
                      <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false,'placeholder'=>'Email']); ?>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 right-pad">
                      <div class="form-group">
                        <label><img src="<?php echo $this->request->webroot."images/phone.png";?>" alt="Phone"></label>
                        <!-- <input type="tel" name="phone" class="form-control" placeholder="Phone" value=""> -->
                      <?php echo $this->Form->control('phone', ['type' => 'text','class' => 'form-control', 'label' => false,'placeholder'=>'123-123-1234','maxlength'=>12]); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label><img src="<?php echo $this->request->webroot."images/user-i.png";?>" alt="User"></label>
                      <!-- <textarea class="form-control" name="about" placeholder="About You" value=""></textarea> -->
                      <?php echo $this->Form->control('about', ['type' => 'textarea', 'class' => 'form-control', 'label' => false,'placeholder'=>'About']); ?>
                    </div>
                    
                  </div>
                <!-- </form> -->
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

$( "#dob").datepicker({ maxDate: '0' });


     function contactFormat(number){   
  if(number.length == 3){
      number = number+'-'
  } else if (number.length == 7){
      number = number+'-';
  }
  return number;
}  
   
$("#phone").keyup(function(){ 
var num = contactFormat($(this).val()); 
 $(this).val(num)  ; 
});  
   $(document).ready(function() {
  $("#edit-form").validate({  
    ignore: "",
    rules: {
      email: {
        required: true,
        email: true
      },   
      name: {required:true},
      dob: {required:true},
      phone: { 
          required:true, 
      }
    },
    messages: {
      name: {required: "Please enter your Name"}, 
      last_name: {required: "Please enter your Last Name"},      
      dob: "Please select date of Birth",
      email: "Please enter a valid email address",
      about: "Please enter about you"
      
    }
  });
}); 

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.currentimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function(){
    readURL(this);
});
</script>     