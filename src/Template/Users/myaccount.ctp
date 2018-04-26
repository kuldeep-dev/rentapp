<section class="st_content">
        <section class="profile_banner">
            <img src="<?php echo $this->request->webroot."images/profile-banner.jpg"?>" alt="Banner">
            <div class="overlay"></div>
            <div class="clr"></div>
        </section><!-- Banner Section End Here -->
        <section class="profile_sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile_outer">
                            <div class="profile_wrap">
                                <div class="profile_left">
                                    <div class="avatar">
                                        <?php if($userdata->image != ""){  ?>    
                                        <img src="<?php echo $this->request->webroot."images/users/".$userdata->image; ?>">
                                        <?php }else{  ?>
                                        <img src="<?php echo $this->request->webroot?>images/users/noimage.png">
                                        <?php } ?>
                                    </div>
                                    <a href="<?php echo $this->request->webroot; ?>users/edit" class="btn btn-default">Edit Profile</a>
                                </div>
                                <div class="profile-right">
                                    <h3 class="pn"><?php if(isset($userdata->name)){ echo $userdata->name; } ?> <?php echo ' ';?> <?php if(isset($userdata->last_name)){ echo $userdata->last_name; } ?></h3>
                                    <div class="dob details">
                                        <strong>DOB:</strong> 
                                        <?php if(!empty($userdata->dob)){ echo $userdata->dob; } else { echo "N/A"; }?>
                                    </div>
                                    <div class="address details">
                                        <strong>Address:</strong> <?php if(!empty($userdata->address)){ echo $userdata->address; }else { echo "N/A"; } ?>
                                    </div>
                                    <div class="email details">
                                        <strong>Email:</strong> <?php if(!empty($userdata->email)){ echo $userdata->email; } else { echo "N/A"; }?>
                                    </div>
                                    <div class="phone details">
                                        <strong>Phone:</strong> <?php if(!empty($userdata->phone)){ echo $userdata->phone; } else { echo "N/A"; }?>
                                    </div>
                                    <div class="about details">
                                        <strong>About:</strong> <?php if(!empty($userdata->about)){ echo $userdata->about; } else { echo "N/A"; }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clr"></div>
    </section><!-- Content Section End Here -->


