<div class="faq-banner">
    <div class="faq-img">
        <img class="img-responsive" src="<?php echo $this->request->webroot; ?>images/trust-and-safety-banner.jpg" alt="" border="0">
        <h3><?php if ($protections->title) {
    echo $protections->title;  
} ?></h3>
    </div>
</div    
   
<!-- 	--------------------------section---------------------- -->
<div class="terms">
    <div class="container">

        <div class="row">

            <div class="col-sm-12">
                <div class="cndn-txt">
                    <h4><?php if ($protections->title) {
    echo $protections->title;
} ?></h4>
                </div></div>

            <div class="col-sm-12">
<?php if ($protections->content) {
    echo $protections->content;
} ?>

            </div>
        </div>

    </div>
</div>  
