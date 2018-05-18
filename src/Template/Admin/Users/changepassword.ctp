<section class="content-header">
    <h1>
    Users
    <small></small>
    </h1>
     
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password <strong>(ID: <?php echo $user->id; ?>)</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($user, ['id' => 'user-form', 'enctype' => 'multipart/form-data']) ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <?php echo $this->Form->control('password', ['class' => 'form-control', 'value' => '', 'label' => false, 'required' => 'required']); ?>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
              </div>
            <?= $this->Form->end() ?>
          </div>
        </div>
    </div>
</section> 

<script>

$().ready(function() {
	var form = $("#user-form").validate({
		rules: {
			password: { 
				required: true,
				minlength: 8
			}
		},
		messages: {
			password: "Password must be atleast 8 character long"	
		}
	});
});

// $().ready(function() {
// 	$("#user-form").validate();
// });


</script>      