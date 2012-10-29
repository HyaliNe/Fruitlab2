<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Upload Success</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
		
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->
<div class="container">
	<div class="row">
		<div class="span12">
			<h3>Your file was successfully uploaded!</h3>
		</div>
	</div>

<div class="row">
	<div class="span6">
		<table class = "table table-hover table-bordered">
			<tr><th>Title</th><th>Image_Path</th><th>Price($)</th><th>Type</th></tr>
				<tr>
					<td><?php echo $user_data['title'] ?></td>
					<td><img class="thumbnail" src = "<?php echo site_url('uploads/'.$user_data['image_path']); ?>" /></td>
					<td>$<?php echo $user_data['price'] ?></td>
					<td><?php echo $user_data['type'] ?></td>
				<tr>
		</table>		
	</div>
</div>


<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</div>