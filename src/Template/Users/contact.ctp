<section class="st_content">
    <section class="cont-banner">
      <img src="<?php echo $this->request->webroot."images/contact-support.jpg";?>" alt="Contact Banner">
      <div class="clr"></div>
    </section><!-- Book Banner End Here -->
    <section class="cont-form">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 no-padding">
            <div class="col-md-8 col-sm-8">
              <div class="inner-sec">
                <div class="head-sec">
                  <h2>Submit a Request</h2>
                </div>
                 <?= $this->Flash->render() ?>
                <div class="form-sec">
                  <form class="form-horizontal" name="Contact_Form" method="post" action="" id="contact-form">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Name*</label>
                        <input type="text" class="form-control" name="name" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Email*</label>
                        <input type="email" class="form-control" name="email" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Phone*</label>
                        <input type="tel" class="form-control" name="phone" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Subject*</label>
                        <input type="tel" class="form-control" name="subject" placeholder="" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="message" placeholder="" value=""></textarea>
                    </div>
                    <input type="submit" class="btn btn-default sb-btn" value="Submit"> 
                  </form>
                </div>
              </div>
            </div><!-- Contact Form section End Here -->
            <div class="col-md-4 col-sm-4">
              <div class="inner-sec">
                <div class="head-sec">
                  <h2>Contact Us</h2>
                </div>
                <address>
                Future Work Technologies, 4th Floor, Plot No. 10, Net Smartz House, Rajiv Gandhi Technology Park Chandigarh (160101) 
                </address>
                <div class="con-ml">
                  <a href="tel:9815282351">+91 98152 - 82351</a>
                  <a href="tel:9815282351">+91 98152 - 82351</a>
                  <a href="mailto:contactsupport@domain.com">contactsupport@domain.com</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </section><!-- Contact Section End Here -->
    <section class="cont-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3429.679547866961!2d76.84327431473727!3d30.727407981639068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f92df701b13cb%3A0xc502e2bb22b11323!2sOffice+Space+for+Rent+in+IT+Park%2C+Chandigarh!5e0!3m2!1sen!2sin!4v1521109477249" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section><!-- End Here Map  Section -->
    <div class="clr"></div>
  </section><!-- Content Section End Here -->

    
<script>
$().ready(function() {
	$("#contact-form").validate({
		rules: {
			name: "required",
      phone:"required",
			subject: "required",
			message: "required",
			email: {
				required: true,
				email: true
			}
		},
		messages: {
      phone : "Please enter your phone no.",
			name: "Please enter your name",
			subject: "Please enter subject",
			email: "Please enter a valid email address",
			message: "Please enter your message"
		}
	});
});

</script>    