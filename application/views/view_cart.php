<div class="container">

	<div class="page-header">
		Your cart
	</div>
	
	<div class="row">
		<div class="span3">
		Cart Item
		</div>
	</div>
	
<?php
	for(i=1; i <3; i++)
	{	?>
		<div class="row">
			<div class="span12">
				<div class="span1">
				<?php echo i;?>
				</div>
				<div class="span2">
					<img src="http://mlb.imageg.net/graphics/product_images/pMLB2-6812907dt.jpg">
				</div>
				<div class="span2">
					Title
				</div>	
				<div class="span1">
					Quantity:
				</div>			
				<div class="span2">
					<select>
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</div>
				<div class="span1">
					<form name="remove" id="remove" action="" method="post">
						<input type="hidden" name="" id="" value=""/>
						<input type="submit" value="remove">remove</input>
					</form>
				</div>
				<div class="span1">
					Price:
				</div>	
				<div class="span2">
					<?php echo "$".i;?>
				</div>				
			</div>
		</div>
	
<?php
	}
?>	
	<div class="row">
		<div class="span4 offset7">
			<div class="span2">
				Total amount payable:
			</div>
			<div class="span2">
			<?php echo "total";?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="span2 offset8">
			<form name="" action="" method="post">
				<input type="hidden" name="price" id="price" value="" />
				<input type="submit" value="checkout"> Paypal Checkout </input>
			</form>
		</div>
	</div>
	

</div>