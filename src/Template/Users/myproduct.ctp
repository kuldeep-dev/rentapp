<section class="st_content">
        <section class="trip-sec list-craft-sh">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-sec">
                            <div class="head-sec">
                                <h2>List Crafts</h2>
                            </div>
                            <div class="trip-list">
                                <ul>
                                 <?php if(!empty($userdata['products'])){
                        foreach($userdata['products'] as $product){
                        ?>
                                    <li>
                                        <span class="img-crafting">
                                            <?php if($product['image']){ ?>  
                                        <img src="<?php echo $this->request->webroot."images/products/".$product['image']; ?>">
                                         <?php }else{ ?> 
                                        <img src="<?php echo $this->request->webroot."images/products/no-image.jpg"; ?>">
                                         <?php } ?> 
                                        </span>
                                        <h5><?php echo $product['name'];?></h5>
                                        <p><?php  
                                        $string = strip_tags($product['description']);
                                        if (strlen($string) > 30) {
                                            $stringCut = substr($string, 0, 30);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                        }
                                        ?><?php if(isset($string)){ echo $string; } ?></p>
                                        <ul class="details">
                                            <li>
                                                <label>Location:</label> <?php echo $product['city'];?>
                                            </li>
                                            <li>
                                                <label>Category:</label> <?php echo $product['category']['name'];?>
                                            </li>
                                            <li>
                                                <label>Color:</label> <?php echo $product['color'];?>
                                            </li>
                                            <li>
                                                <label>Price:</label> $<?php echo $product['price'];?>
                                            </li>
                                            <li>
                                                <label>Pick Location:</label> <?php echo $product['pick_location'];?>
                                            </li>
                                            <li>
                                                <label>Drop Location:</label> <?php echo $product['drop_location'];?>
                                            </li>
                                            <li>
                                                <label>Status:</label> <?php if ($product['status'] == 1) { echo "Active";} else { echo "Deactive";} ?>
                                            </li>
                                            <li>
                                               <!--  <a href="#">Edit Details</a> -->
                                            </li>
                                        </ul>
                                    </li>
                                    <?php } } ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </section><!-- Contact Section End Here -->
    </section><!-- Content Section End Here -->