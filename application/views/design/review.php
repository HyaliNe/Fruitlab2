<div class="container">

	
	<div class = "page-header">
		<h1>Review testing form</h1>
	</div> <!-- end of .page-header -->		
	
	<p><h4>comment form</h4></p>
	
	<form class="form-vertical" action = "<?php echo site_url('review/comment'); ?>" method="post"/>
		
		<?php if (validation_errors()): ?>

			<div class="alert alert-error">
			  <a class="close" data-dismiss="alert" href="#">x</a>
			  <h4 class="alert-heading">Error!</h4>
				<?php echo validation_errors(); ?>
			</div>

		<?php endif ?>	
	
	<table>
	<tr>
	<td>Comment</td><td>
	<textarea name="comment" id="comment" value="<?php echo set_value('comment'); ?>" rows="5" maxlength="150" cols="40"></textarea>
	</td></tr>
	<tr><td>design id</td><td>
	<input type="text" id="design_id" name="design_id" value= "<?php echo set_value('design_id'); ?>" />
	<?php $customer_id = $this->session->userdata('customer_id');	?>
	<input type="hidden" name="customer_id" value="$customer_id" />
	</td></tr>	
	</table>
		
	<input type="submit" value="Submit" class="btn btn-info"/>
	</form>

	<p><h4>rating</h4></p>
	<form class="foraction = "<?php echo site_url('review/rate'); ?>" method = "post"/>
	
	design_id: 	<input type="text" id="design_id" name="design_id" value= "<?php echo set_value('design_id'); ?>" /></br>
		<input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('customer_id'); ?>" />
			
		<select name="rating" id="rating">
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  <option value="5">5</option>
		</select>
		</br>
	
	<input type="submit" value="Submit" class="btn btn-info"/>	
	</form>
</div>