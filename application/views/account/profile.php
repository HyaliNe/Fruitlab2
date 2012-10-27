<div class="hero-unit">
	<div class="row-fluid">
		
		<div class="span2">
			<img src="<?php echo site_url('uploads/'.$img_path); ?>" alt="<?= $first_name ?> <?= $last_name ?> " class = "pull-left" />
		</div>
		
		<div class="span2">
			<h2><?php echo $first_name, " " , $last_name;?></h2>
		</div>		

		<div class="span4 profile_info">
			<div class = "profile_ribbon"><img src="<?php echo site_url(); ?>img/profile_ribbon.png" alt="" /></div>
			<dl class="dl-horizontal well">
			  <dt>Date Of Birth</dt>
			  <dd><?php echo $date_of_birth; ?></dd>
			  <dt>Gender</dt>
			  <dd><?php echo ( $gender == 'M' ) ? "Male" : "Female";?></dd>
			  <dt>About Me</dt>
			  <dd><?php echo $about_you;?> &nbsp; </dd>
			  <dt>Contact Num</dt>
			  <dd><?php echo $hp_no; ?></dd>
			  <dt>Email</dt>
			  <dd><?php echo $email; ?></dd>
			</dl>
		</div>

		<div class="span2 profile_action">
		
			<!-- need to implement changig button, if already friend then take away the add friend button -->
			<form action="<?php echo site_url('friends/add');?>" method="post"/>
				<input type="hidden" value="<?php echo $customer_id;?>" name="potential_friend_id"/>
				<input type="hidden" value="<?php echo $this->session->userdata('customer_id');?>" name="customer_id" />
				<input type="submit" class = "btn-large btn btn-block" value="Add Friend"/>			
			</form>
		</div>
			
	</div>
</div> <!-- end of .hero-unit -->

<div class="container">
	
	<?php
	
	// echo "<pre>";
	// print_r($designs);
	// echo "</pre>";
	// 
	?>
	
	<div class="row">
		<div class="span10">
			<div class="row">
				<div class="span12">
					<h3>Seller Gallery</h3>
				</div>
			</div>
			
			
			<div class="row">
				<div class="span12">
					<div class="designs clearfix">
						<?php if (empty($designs)): ?>

							Empty Gallery

							<?php else: ?>
						
						<?php foreach ($designs as $design): ?>
						
						<figure class="design">
							<img src="<?php echo site_url('uploads/'.$design->image_path); ?>" class = "thumbnail" alt="" />									
							<div class="design_overlay">
								<p><a href = "<?php echo site_url('design/'.$design->design_id); ?>" ><?php echo $design->title; ?></a></p>
							</div>
						</figure>
						
						<?php endforeach; ?>
						<?php endif; ?>
						
					</div>
				</div>
			</div>
			
						
		</div>
	</div>	
	
</div>
