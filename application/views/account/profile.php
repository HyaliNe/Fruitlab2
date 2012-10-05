<div class="container">
	
	<div class = "page-header">
		<table>
		<tr><td><img src="<?php echo site_url('img/user_add.png'); ?>" alt="user" width="124" height="124" ></td>
		<td><h1><?php echo $first_name, " " , $last_name;?></h1></td></tr>
		</table>
	</div> <!-- end of .page-header -->	
	
	<form class="form-vertical" action = "<?php echo site_url('profile'); ?>" method = "post"/>
			 	
		<?php if (validation_errors()): ?>

			<div class="alert alert-error">
			  <a class="close" data-dismiss="alert" href="#">x</a>
			  <h4 class="alert-heading">Error!</h4>
				<?php echo validation_errors(); ?>
			</div>

		<?php endif ?>
		
			
		<table class="table">
		<tr><h4>Basic info</h4></tr>
		<tr>
		<td>
			<label for="date_of_birth">Date of birth</label>					
		</td>
		<td>
			<input type="text" name = "date_of_birth" value = "<?php echo set_value('date_of_birth', $date_of_birth); ?>" />					
		</td>
		</tr>
		<tr>
		<td>
			<label class="control-label" for="country">Country</label>					
		</td>
		<td>
			<?php echo country_dropdown('country', $country); ?>					
		</td>
		</tr>
		<tr>
		<td>
			<label for="gender">Gender</label>					
		</td>
		<td>
		<?php	if($gender == 'M')
				{	?>
					<input type="radio" id="gender" name="gender" value="M" checked="checked">Male
					<input type="radio" id="gender" name="gender" value="F">Female					
		<?php	}	
				elseif($gender == "F")
				{	?>
					<input type="radio" id="gender" name="gender" value="M" >Male
					<input type="radio" id="gender" name="gender" value="F" checked="checked">Female					
		<?php	}
				else
				{	?>
					<input type="radio" id="gender" name="gender" value="M">Male
					<input type="radio" id="gender" name="gender" value="F">Female				
		<?php	}	?>
		</td>
		</tr>
		<tr>
		<td>
			<label for="about_you">About you</label>					
		</td>
		<td>
			<textarea cols="40" id="about_you" name="about_you" rows="5" maxlength="150" value= "<?php echo set_value('about_you',$about_you); ?>"><?php echo $about_you;?></textarea>
		</td>
		</tr>
		</table>

		<table class="table">
		<tr><h4>Contact info</h4></tr>
		<tr>
		<td>
			<label for="hp_no">Handphone no</label>					
		</td>
		<td>
			<input type="text" name = "hp_no" value = "<?php echo set_value('hp_no', $hp_no); ?>" />					
		</td>
		</tr>

		<tr>
		<td>
			<label for="email">Email</label>					
		</td>
		<td>
			<input type="text" name = "email" value = "<?php echo set_value('email', $email); ?>" />					
			<input type="hidden" name="first_name" value = "<?php echo $first_name; ?>" />
			<input type="hidden" name="last_name" value = "<?php echo $last_name; ?>" />
			<input type="hidden" name="customer_id" value = "<?php echo $this->session->userdata('customer_id'); ?>" />
		</td>
		</tr>	
		</table>		
				
	<input type="submit" class="btn btn-primary" value = "Submit" />

	</form>			
</div>