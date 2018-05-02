<section class="st_content">
    <section class="trip-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-sec">
              <div class="head-sec">
                <h2>My Favourites</h2>
              </div>
              <div class="trip-list">
              
                <ul>
                <?php if(!empty($yourfavourite)){
                        foreach($yourfavourite as $favourite){
                        ?>
                  <li>
                    <span class="img-crafting">
                    <a href="<?php echo $this->request->webroot."products/booking/" . $favourite['product']['id'];?>">
                      <img src="<?php echo $this->request->webroot."images/products/".$favourite['product']['image']; ?>"" alt="Boat Image"></a>
                    </span>
                    <h5><a href="<?php echo $this->request->webroot."products/booking/" . $favourite['product']['id'];?>"><?php echo $favourite['product']['name'] ?></a></h5>
                    <ul class="details">
                      <li>
                        <label>Description:</label> <?php echo $favourite['product']['description'] ?>
                      </li>
                    </ul>
                    <div class="star_rating">
                  <?php
                        $star =  $favourite['product']['ava_rating'];
                      for ($i=1; $i <= $star; $i++) {
                          echo "<i class='sr_icon'></i>";
                       } ?>
                      
                    </div>
                  </li>
                  <?php } } else { echo "No data available"; } ?> 
                </ul>

                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clr"></div>
    </section><!-- Contact Section End Here -->
  </section><!-- Content Section End Here -->