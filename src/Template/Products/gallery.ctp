<section class="content-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="gallry-box-1">
					<h1>
					Gallery   <?= $this->Html->link(__('Add Gallery'), ['action' => 'addgallery/'.$productid], ['class' => 'btn btn-warning']) ?>
					<small></small>  
					</h1>

					<ol class="breadcrumb">
						<li class="active">Gallery</li>
					</ol>
					
					 <?php echo $this->Flash->render(); ?>
				 </div>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			
			<div class="box gal-box">

				<div class="list-group gallery">
				<?php foreach ($gallery['galleries'] as $image): ?>
						<div class="col-sm-4 col-xs-6 col-md-3 col-lg-3">
						<img class="img-responsive" alt="" src="<?php echo $this->request->webroot."images/gallery/".$image->image; ?>">
						<div class="icon-img">
						<a href="<?php echo $this->request->webroot ?>products/gallerydelete/<?php echo $image->id ?>/<?php echo $productid ?>">
						<img class="img-responsive" alt="" src="https://image.flaticon.com/icons/png/128/59/59836.png"></a>
						</div>	
						</div>
						<?php endforeach; ?>    						
				</div>
			
				<!--<div class="box-header">
				  <h3 class="box-title">Hover Data Table</h3>
				</div>-->
				<!-- /.box-header -->
				
				<!-- /.box-body -->
			 
			
			
			
			</div>  
		</div>
	</div>
</section>  
<script>
    $(document).ready(function() {  
        
    $('#gallery').DataTable();
     });   
</script>