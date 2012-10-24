<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Create New Design</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p>Let your creative juice flow and make some design!</p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->

<div class="container">
	
	<div class="row">
		<div class="span12">
			<h3>Manage your own design!</h3>			
		</div>
	</div>
	
	<?php if (!empty($data)): 
			$alert_type = ($data['result']) ? 'alert-success' : 'alert-error';
			$alert_heading = ($data['result']) ? 'Success' : 'Error';
	?>
		<div class="row">
			<div class="span12">
				<div class="alert <?php echo $alert_type; ?>">
				<a class="close" data-dismiss="alert" href="#">×</a>
				<h4 class="alert-heading"><?php echo $alert_heading ?></h4>
				<p><?php echo $data['message']; ?></p>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="row">
		<div class="span8">
			<table class = "table table-hover table-bordered">
				<tr><th>Title</th><th>Image_Path</th><th>Price($)</th><th>Action</th></tr>
				<?php foreach($designs->result() as $design): ?>
					<tr>
						<td><?php echo $design->title ?></td>
						<td><img class="thumbnail" src = "<?php echo site_url('uploads/'.$design->image_path); ?>" /></td>
						<td>$<?php echo $design->price ?></td>
						<td>
							<?php if ($design->type !== 'remove'): ?>
							<a href = "<?php echo site_url('design/remove/'. $design->design_id) ?>" class = "btn"><i class = "icon-trash"></i></a>
							<?php endif; ?>
						</td>
					<tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	
	
</div>