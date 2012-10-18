<div class="container">
	
	<div class = "page-header">
		<table>
		<tr><td><img src="<?php echo site_url('img/user_add.png'); ?>" alt="user" width="124" height="124" ></td>
		<td><h1><?php echo $first_name, " " , $last_name;?></h1></td></tr>
		</table>
	</div> <!-- end of .page-header -->
			 	
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
			<?php echo $date_of_birth; ?>			
		</td>
		</tr>
		<tr>
		<td>
			<label class="control-label" for="country">Country</label>					
		</td>
		<td>
			<?php echo value_of_country($country); ?>					
		</td>
		</tr>
		<tr>
		<td>
			<label for="gender">Gender</label>					
		</td>
		<td>
			<?php
			if( $gender = 'M' )
			{
				echo "Male";
			}
			else
			{
				echo "Female";
			}	?>
		</td>
		</tr>
		<tr>
		<td>
			<label for="about_you">About you</label>					
		</td>
		<td>
			<?php echo $about_you;?>
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
			<?php echo $hp_no; ?>			
		</td>
		</tr>

		<tr>
		<td>
			<label for="email">Email</label>					
		</td>
		<td>
			<?php echo $email; ?>
		</td>
		</tr>	
		</table>		
		
		<!-- testing area to retrieve activity -->
		<table>
		<?php foreach($activity as $singleactivity):?>

		<tr>
		<td><?php echo $singleactivity->message;?></td>
		</tr>	

		<?php endforeach;?>
		</table>
		<!-- testing area to retrieve design -->
		
</div>