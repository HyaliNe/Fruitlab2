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
	
	<?php if (isset($updated) && $updated == true): ?>
		<div class="row">
			<div class="span12">
				<div class="alert alert-success ?>">
				<p>Cart has been successfully updated.</p>
				</div>
			</div>
		</div>
	<?php endif; ?>


	<?php echo form_open('cart/update'); ?>

<table class="table table-hover" style="width:100%" >

<tr>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr>
	  <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if (false && $this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
						
						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="2"> </td>
  <td class="right"><strong>Total</strong></td>
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>
<p class = "pull-right">
	<div class = "btn-group">
		<input type = "submit" value = "Update Your Cart" class = "btn btn-success" />
		<a href="checkout" value = "Checkout" class = "btn btn-success">Checkout</a>
	</div>
</p>
</form>

