<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Settings</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p>Edit all settings from here.</p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->

<div class="container">
	
	<ul class="nav nav-tabs" id="tab_section">
	  <li class="active"><a href="#general">General</a></li>
	  <li><a href="#change_password">Change Password</a></li>
	  <li><a href="#upload_avatar">Upload Avatar</a></li>
	</ul>
	
	<div class="tab-content">

		<div class="tab-pane fade active in" id="general">

			<div class="row">
				<form class = "well span6" action = "<?php echo site_url('setting'); ?>" method = "post"/>
					<legend><?php echo $email;?></legend>

					<?php if (validation_errors()): ?>

						<div class="alert alert-error">
						  <a class="close" data-dismiss="alert" href="#">x</a>
						  <p><h4 class="alert-heading">Error</h4></p>
							<?php echo validation_errors(); ?>
						</div>

					<?php endif ?>					
					
					<div class="row">
						<div class="span2">
							<label>First Name</label>
							<input type="text" class="span2" name = "first_name" id="first_name" value = "<?php echo set_value('first_name', $first_name); ?>" />
						</div>
						
						<div class="span2">
							<label>Last Name</label>
							<input type="text" class="span2" name = "last_name" id="last_name" value = "<?php echo set_value('last_name', $last_name); ?>" />
						</div>
					</div>
					
					<div class="row">
						<div class="span2">
							<label>Country</label>
								<?php echo country_dropdown('country', value_of_country($country), 2); ?>
						</div>
						
						<div class="span2">
							<label>Date Of Birth</label>
							<input type="text" id="date_of_birth" class="span2" name = "date_of_birth" value = "<?php echo $date_of_birth; ?>" />
						</div>

					</div>
					
					<div class="row">

						<div class="span2">
							<label>Contact No.</label>
							<input type="text" id="hp_no" class="span2"  name = "hp_no" value = "<?php echo $hp_no; ?>" />
						</div>
						
						<div class="span2">
							<label>Gender</label>
							<label class="radio inline">
								<input type="radio" id="gender" name="gender" value="M" <?php echo ($gender == 'M') ? "checked" : "";?> >
								Male
							</label>

							<label class="radio inline">
								<input type="radio" id="gender" name="gender" value="F" <?php echo ($gender == 'F') ? "checked" : "";?>>Female				
							</label>						
						
						</div>

					</div>
					
					<div class="row">
						<div class="span6">
							<label>Brief description about yourself</label>
							<textarea rows="5" class = "span6" id="about_you" name="about_you" maxlength="150" value= "<?php echo set_value('about_you',$about_you); ?>"><?php echo $about_you;?></textarea>							
							<input type="hidden" value="generalform" name="formtype"/>
							<input type="hidden" value="<?php echo $email;?>" name="email"/>
							<input type="hidden" value="<?php echo $password;?>" name="dbpassword"/>
							<input type="hidden" value="<?php echo $img_path;?>" name="img_path"/>
						</div>
					</div>
					
					<hr>
					
					<button type="submit" class="btn btn-block btn-large btn-success">Save Settings</button>
				</form>
			</div>

		</div>

		<div class="tab-pane fade in" id="change_password">
			<div class="row">
				<form class = "well span6" action = "<?php echo site_url('setting'); ?>" method = "post"/>

					<?php if (validation_errors()): ?>

						<div class="alert alert-error">
						  <a class="close" data-dismiss="alert" href="#">x</a>
						  <p><h4 class="alert-heading">Error</h4></p>
							<?php echo validation_errors(); ?>
						</div>

					<?php endif ?>
					
					<div class="row">
						<div class="span2">
							<label>Old Password</label>
							<input type="password" class = "span2" name = "oldpassword" id="oldpassword" value = "<?php echo set_value('oldpassword'); ?>" />
							<input type="hidden" name="dbpassword" value="<?php echo $password; ?>" />		
							<input type="hidden" value="passwordform" name="formtype"/>
							<input type="hidden" value="<?php echo $email;?>" name="email"/>
							<input type="hidden" value="<?php echo $first_name;?>" name="first_name"/>
							<input type="hidden" value="<?php echo $last_name;?>" name="last_name"/>
							<input type="hidden" value="<?php echo $hp_no;?>" name="hp_no"/>
							<input type="hidden" value="<?php echo $country;?>" name="country"/>
							<input type="hidden" value="<?php echo $date_of_birth;?>" name="date_of_birth"/>
							<input type="hidden" value="<?php echo $gender;?>" name="gender"/>
							<input type="hidden" value="<?php echo $about_you;?>" name="about_you"/>
							<input type="hidden" value="<?php echo $img_path;?>" name="img_path"/>
						</div>
					</div>
					
					<div class="row">
						<div class="span2">
							<label>New Password</label>
							<input type="password" class="span2" name = "password" id="password" value = "<?php echo set_value('password'); ?>" />	
						</div>

						<div class="span2">
							<label>Confirm New Password</label>
							<input type="password" class="span2" name = "password2" id="password2" value = "<?php echo set_value('password2'); ?>" />
						</div>
					</div> <!-- end of .row -->

					<hr>

					<button type="submit" class="btn btn-block btn-large btn-success">Submit</button>

				</form>
			</div>
		</div>	

		<div class="tab-pane fade" id="upload_avatar">
			<div class="row">
				<?php $attributes = array('class' => 'well span6');
					echo form_open_multipart('setting',$attributes); ?>

					<!-- to echo out error if present -->
					<?php	if($error != null)
							{
								echo $error;
							}
					?>	
					
					<?php if (validation_errors()): ?>

						<div class="alert alert-error">
						  <a class="close" data-dismiss="alert" href="#">x</a>
						  <p><h4 class="alert-heading">Error</h4></p>
							<?php echo validation_errors(); ?>
						</div>

					<?php endif ?>
					
					<legend>Current Avatar</legend>
					<div class="row">
						<div class="span3">
							<img src = "<?php echo site_url('uploads/'.$img_path); ?>" class="thumbnail" style = "background-color: #FFFFFF">								
							<input type="hidden" value="avatarform" name="formtype"/>
							<input type="hidden" value="<?php echo $email;?>" name="email"/>
							<input type="hidden" value="<?php echo $first_name;?>" name="first_name"/>
							<input type="hidden" value="<?php echo $last_name;?>" name="last_name"/>
							<input type="hidden" value="<?php echo $hp_no;?>" name="hp_no"/>
							<input type="hidden" value="<?php echo $country;?>" name="country"/>
							<input type="hidden" value="<?php echo $date_of_birth;?>" name="date_of_birth"/>
							<input type="hidden" value="<?php echo $gender;?>" name="gender"/>
							<input type="hidden" value="<?php echo $about_you;?>" name="about_you"/>
							<input type="hidden" value="<?php echo $password;?>" name="dbpassword"/>
							<input type="hidden" value="<?php echo $img_path;?>" name="img_path"/>
						</div>
						<div class="span3">

							<label>Upload Avatar</label>
							<input type="file" class="span3" value="<?php echo set_value('userfile')?>" accept="image/*" name="userfile" />
							<hr>
							<button type="submit" class="btn btn-block btn-large btn-success">Upload</button>
							
						</div>

					</div>
				</form>				
			</div>
		</div>

	</div>
	
</div> <!-- end of .container -->

<script>
head(function() {
	$('#tab_section a').click(function(e) {
		e.preventDefault();
		$(this).tab('show');
	})
});
</script>