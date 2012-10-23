<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Design gallery</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p></p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->
<div class="container">

	<div class="page-header">
		<h1>Someone gallery</h1>
	</div>
	<div class="row">	
	<?php
		foreach($result->result() as $design)
		{	?>
			<div class="span3">
				<div class="row">
					<div class="span3">
					<form action="<?php echo site_url('design/'.$design->design_id);?>" method="post"/>
					<input type="image" src="<?php echo site_url('uploads/'. $design->image_path)?>">
					</form>
					</div>
				</div>
				<div class="row">
					<div class="span3" style="text-align:center; padding-left:16px;">
						<div class="row">
							<div class="span1">
							<?php echo $design->title;?>
							</div>				
						</div>
						<div class="row">
							<div class="span1">
							<?php echo $design->price;?>
							</div>				
						</div>
						<div class="row">
							<div class="span1">
							<?php echo $design->rating;?>/5.00
							</div>				
						</div>		
					</div>
				</div>
			</div>
	<?php
		}	?>
	</div>
	<hr>
	
	<div class="row">
		<div class="pagination offset4">
		  <ul>
			<li><a href="#">Prev</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">Next</a></li>
		  </ul>
		</div>
	</div>
</div>