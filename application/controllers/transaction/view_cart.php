<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Deshun's cart</h1>						
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
	
	<div class="row">
		<div class="span3">
		<h4>Cart Item</h4><hr>
		</div>
	</div>
	<?php print_r($this->cart->contents()); echo form_open('path/to/controller/update/function'); ?>
<?php
	for($i=1; $i <3; $i++)
	{	?>
		<div class="row">
			<div class="span12">
				<div class="span1">
				<?php echo $i;?>
				</div>
				<div class="span2">
					<img src="http://mlb.imageg.net/graphics/product_images/pMLB2-6812907dt.jpg">
				</div>
				<div class="span1">
					Title
				</div>	
				<div class="span1">
					Quantity:
				</div>			
				<div class="span3">
					quantity
				</div>
				<div class="span1">
					<form name="remove" id="remove" action="" method="post">
						<input type="hidden" name="" id="" value=""/>
						<input type="submit" value="remove" class="btn btn-warning"/>
					</form>
				</div>
				<div class="span1">
					Price:
				</div>	
				<div class="span2">
					<?php echo "$".$i;?>
				</div>				
			</div>
		</div>
		<hr>
<?php
	}
?>	
	<div class="row">
		<div class="span4 offset7">
			<div class="span2">
				Total amount payable:
			</div>
			<div class="span1 lead">
			<?php echo "$2.00";?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="span2 offset8">
			<form name="" action="" method="post">
				<input type="hidden" name="price" id="price" value="" /><br>
				<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" alt="Paypal checkout" align="left" style="margin-right:7px;">
			</form>
		</div>
	</div>
	

</div>