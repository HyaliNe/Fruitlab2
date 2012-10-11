<div class="container">
	
	<div class = "page-header">
		<h1>Register an account</h1><br>
		<p>Please register an account before proceeding or <?php echo anchor('login', 'Log in here'); ?></p>
	</div> <!-- end of .page-header -->	
	
	<form class="form-vertical" action = "<?php echo site_url('register'); ?>" method = "post"/>
			 	
		<?php if (validation_errors()): ?>

			<div class="alert alert-error">
			  <a class="close" data-dismiss="alert" href="#">×</a>
			  <h4 class="alert-heading">Error!</h4>
				<?php echo validation_errors(); ?>
			</div>

		<?php endif ?>
			
			
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="first_name">First name</label>					
					</div>
					<div class="controls">
						<input type="text" name = "first_name" value = "<?php echo set_value('first_name'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->

			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="last_name">Last name</label>					
					</div>
					<div class="controls">
						<input type="text" name = "last_name" value = "<?php echo set_value('last_name'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->
		</div> <!-- end of .row -->


		<div class="row">
			<div class="span3">

				<div class="control-group">
			      <label class="control-label" for="email">Email</label>
			      <div class="controls">
			        <input type="text" id="email" name = "email" value = "<?php echo set_value('email'); ?>" />
			      </div>
				</div> <!-- end of .control-group -->
			</div> <!-- end of .span3 -->
			
			<div class="span3">				
				<div class="control-group">
					<label class="control-label" for="country">Country</label>
			     	<div class="controls">
						<?php echo country_dropdown('country', 'Singapore'); ?>
			         </div> <!-- .controls -->
				 </div> <!-- .control-group -->				
			</div> <!-- end of .span3 -->
			
		</div> <!-- end of .row -->

		<div class="row">
			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="password">Password*</label>					
					</div>
					<div class="controls">
						<input type="password" name = "password" value = "<?php echo set_value('password'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->

			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="password2">Confirm Password*</label>					
					</div>
					<div class="controls">
						<input type="password" name = "password2" value = "<?php echo set_value('password2'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->
		</div> <!-- end of .row -->
				
			<input type="submit" class="btn btn-primary" value = "Register" />

	</form>			
</div>