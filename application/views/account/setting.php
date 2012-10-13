<head>

<script>
function enableform()
{
document.getElementById("first_name").readOnly=false;
document.getElementById("last_name").readOnly=false;
document.getElementById("country").readOnly=false;
document.getElementById("date_of_birth").readOnly=false;
document.getElementById("gender").readOnly=false;
document.getElementById("hp_no").readOnly=false;
document.getElementById("about_you").readOnly=false;
document.getElementById("oldpassword").readOnly=false;
document.getElementById("password").readOnly=false;
document.getElementById("password2").readOnly=false;
}
</script>

</head>

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
						<input type="text" name = "first_name" id="first_name" readonly="readonly" value = "<?php echo set_value('first_name', $first_name); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->

			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="last_name">Last name</label>					
					</div>
					<div class="controls">
						<input type="text" name = "last_name" id="last_name" readonly="readonly" value = "<?php echo set_value('last_name', $last_name); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->
			
			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<button type="button" class="btn btn-primary" onClick="enableform()" id="edit" name="edit">Edit</button>
					</div>
				</div>
			</div>
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
						<input name="country" readonly="readonly" id="country" <?php echo country_dropdown('country', $country); ?>
			         </div> <!-- .controls -->
				 </div> <!-- .control-group -->				
			</div> <!-- end of .span3 -->
			
		</div> <!-- end of .row -->
		
		<div class="row">
			<div class="span3">

				<div class="control-group">
			      <label class="control-label" for="date_of_birth">Date of birth</label>
			      <div class="controls">
			        <input type="text" id="date_of_birth" readonly="readonly" name = "date_of_birth" value = "<?php echo $date_of_birth; ?>" />
			      </div>
				</div> <!-- end of .control-group -->
			</div> <!-- end of .span3 -->
			
			<div class="span3">

				<div class="control-group">
			      <label class="control-label" for="gender">Gender</label>	
			      <div class="controls">
					<?php	if($gender == 'M')
							{	?>
								<input type="radio" id="gender" readonly="readonly" name="gender" value="M" checked="checked">Male
								<input type="radio" id="gender" readonly="readonly" name="gender" value="F">Female					
					<?php	}	
							elseif($gender == "F")
							{	?>
								<input type="radio" id="gender" readonly="readonly" name="gender" value="M" >Male
								<input type="radio" id="gender" readonly="readonly" name="gender" value="F" checked="checked">Female					
					<?php	}
							else
							{	?>
								<input type="radio" id="gender" readonly="readonly" name="gender" value="M">Male
								<input type="radio" id="gender" readonly="readonly" name="gender" value="F">Female				
					<?php	}	?>			        
			      </div>
				</div> <!-- end of .control-group -->
			</div> <!-- end of .span3 -->			
		</div>			

		<div class="row">
			<div class="span3">

				<div class="control-group">
			      <label class="control-label" for="hp_no">Handphone no</label>
			      <div class="controls">
			        <input type="text" id="hp_no" name = "hp_no" readonly="readonly" value = "<?php echo $hp_no; ?>" />
			      </div>
				</div> <!-- end of .control-group -->
			</div> <!-- end of .span3 -->			
		
			<div class="span3">

				<div class="control-group">
			      <label class="control-label" for="about_you">About you</label>
			      <div class="controls">
			        <textarea cols="40" id="about_you" readonly="readonly" name="about_you" rows="2" maxlength="150" value= "<?php echo set_value('about_you',$about_you); ?>"><?php echo $about_you;?></textarea>
			      </div>
				</div> <!-- end of .control-group -->
			</div> <!-- end of .span3 -->
		</div>			
		
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="password">Old password</label>					
					</div>
					<div class="controls">
						<input type="password" name = "oldpassword" id="oldpassword" readonly="readonly" value = "<?php echo set_value('oldpassword'); ?>" />
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
						<input type="password" name = "password" id="password" readonly="readonly" value = "<?php echo set_value('password'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->

			<div class="span3">
				<div class="control-group">
					<div class="control-label">
						<label for="password2">Confirm Password</label>					
					</div>
					<div class="controls">
						<input type="password" name = "password2" id="password2" readonly="readonly" value = "<?php echo set_value('password2'); ?>" />					
					</div>
				</div> <!-- end of .control-group -->					
			</div> <!-- end of .span3 -->
		</div> <!-- end of .row -->
				
			<input type="submit" class="btn btn-primary" value = "Submit" />

	</form>			
</div>