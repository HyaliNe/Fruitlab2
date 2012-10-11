<div class="container">
	
	<div class = "page-header">
		<h1>Settings</h1><br>
	</div> <!-- end of .page-header -->	
	
	<form class="form-vertical" action = "<?php echo site_url('setting'); ?>" method = "post"/>
			 	
		<?php if (validation_errors()): ?>

			<div class="alert alert-error">
			  <a class="close" data-dismiss="alert" href="#">x</a>
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
						<input type="text" name = "first_name" value = "<?php echo set_value('first_name', $first_name); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->

			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="last_name">Last name</label>					
					</div>
					<div class="controls">
						<input type="text" name = "last_name" value = "<?php echo set_value('last_name', $last_name); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->
		</div> <!-- end of .row -->


		<div class="row">
			<div class="span3">

				<div class="control-group">
			      <label class="control-label" for="email">Email</label>
			      <div class="controls">
			        <input type="text" id="email" readonly="readonly" name = "email" value = "<?php echo $email; ?>" />	<!-- email should not be allowed to change, if want to change, can create new account -->
			      </div>
				</div> <!-- end of .control-group -->
			</div> <!-- end of .span3 -->
			
			<div class="span3">				
				<div class="control-group">
					<label class="control-label" for="country">Country</label>
			     	<div class="controls">
						<?php echo country_dropdown('country', $country); ?>
			         </div> <!-- .controls -->
				 </div> <!-- .control-group -->				
			</div> <!-- end of .span3 -->
			
		</div> <!-- end of .row -->

		<div class="row">
			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="password">Old password</label>					
					</div>
					<div class="controls">
						<input type="password" name = "oldpassword" value = "<?php echo set_value('oldpassword'); ?>" />
						<input type="hidden" name="dbpassword" value="<?php echo $password; ?>" />
						<?php	if(!$result)
								{
								?>
								<label style="color:red">Incorrect password</label>
						<?php	}
						?>

					</div>
				</div> <!-- end of .control-group -->					
			</div>		
			
			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="password">New password</label>					
					</div>
					<div class="controls">
						<input type="password" name = "password" value = "<?php echo set_value('password'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->

			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="password2">Confirm Password</label>					
					</div>
					<div class="controls">
						<input type="password" name = "password2" value = "<?php echo set_value('password2'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->
		</div> <!-- end of .row -->
				
			<input type="submit" class="btn btn-primary" value = "Submit" />

	</form>			
</div>