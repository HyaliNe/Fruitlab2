<div class="container">

	<div class="page-header hero">
	<h1>Payment History</h1>
	</div>
	
	<div class="row">
		<div class="span3 offset7">
			<select>
				<option value="">Sort by date</option>
				<option value="">Sort by title</option>
				<option value="">Sort by price</option>
			</select>
		</div>
	</div>
<?php	$count=0;
	foreach( $payment as $temp)
	{	?>
	<div class="row">
		<div class="span12">
			<div class="thumbnail pull-left">
				<img src="<?php echo "./img/user_add.png";?>" alt="" />
			</div>
			<div class="span4">
				<div class="row">
					<div class="span4 pull-left lead">
						<?php echo "title";?>
					</div>
				</div>
				<div class="row">
					<div class="span4 pull-left">
						$<?php echo "16.00";?>
					</div>
				</div>
				<div class="row">
					<div class="span4 pull-left">
						Date of purchase:
					</div>
					<div class="span4 pull-left">
						<?php echo "12/11/1990";?>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="row">
					<div class="span2">
						Status: 
					</div>
					<div class="span2">
						<?php echo "processing";?>
					</div>
				</div>
				<div class="row">
					<div class="span2">
						<a href="#" >Contact Seller</a>
					</div>				
				</div>
			</div>
		</div>
	</div>
	<hr>
<?php	$count++;
	}	?>

	<div class="pagination">
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