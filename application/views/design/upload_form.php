<html>
<head>
<title>Create New Design</title>
</head>
<body>
<?php echo $error;?>
<?php echo form_open_multipart('upload'); ?>
    <?php if (validation_errors()): ?>
		<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading">Error!</h4>
		<?php echo validation_errors(); ?>
		</div>
    <?php endif ?>

<legend>Create New Design</legend>
<div class="row">
	<div class="span5 offset1">
		<div class="row">
			<div class="span4">
				<div class="row">
					<div class="span2">
						<label>Title</label>
						<input type="text" name="title" value="<?php echo set_value('title'); ?>">
					</div>		
				</div>		
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="row">
					<div class="span2">
						<label>Price</label>
						<input type="text" name="price" value="<?php echo set_value('price'); ?>">
					</div>		
				</div>		
			</div>
		</div>
		<div class="row">
			<div class="span2">
				<label>Type</label>
				<label class="radio inline">
					<input type="radio" name="type" value="Sales" <?php echo set_radio('type', 'On Sales', TRUE); ?> />Sales
				</label>

				<label class="radio inline">
					<input type="radio" name="type" value="Private" <?php echo set_radio('type', 'Private'); ?> />Private
				</label>
			</div>
		</div>
		<div class="row">
			<div class="span4">
					</label>Image</label>
					<span class="add-on"><i class="icon-envelope"></i></span>
					<input type="file" value="<?php echo set_value('userfile')?>" name="userfile" />
			</div>
		</div>
		<div class="row">
			<div class="span2">
				<input type="submit" value="Create" class="btn btn-large btn-info" />
			</div>
		</div>
	</div>


	</form>
	<div class="span5">
		<img src="./img/shirt.jpg" alt="">	<!-- this part will be changing -->
	</div>
</div>
<h2> Current Design </h2>
<table border = '1'> 
<tr><th>Title</th><th>Image_Path</th><th>Price($)</th><th>Type</th><th>Design_ID</th><th>Action</th></tr>
<?php
    $customer_id = $this->session->userdata('customer_id');
    $this->db->where('customer_id', $customer_id)->where('type !=', 'remove'); 
    $query = $this->db->get('design');
    echo "Total Record Returned: " .  $query->num_rows();
    if ($query->num_rows() > 0)
    {
    foreach ($query->result() as $row)
    {
       if($row->type != 'remove'){
       echo "<tr>";
       echo "<td>". $row->title . "</td>";
       echo "<td><img src='" . $row->image_path . "' width=42' height='42'/></td>";
       echo "<td>" . $row->price . "</td>";
       echo "<td>" . $row->type . "</td>";
       echo "<td>". $row->design_id . "</td>";
       $design_id = $row->design_id;
       echo "<td><a href=" . site_url("upload/remove?id=". $design_id) ." onclick=\"return confirm('Are you sure you want to delete the remove this design')\">[Remove]</a></td>";
       echo "</tr>";
       }
    }
    }
?>
 </table>
</body>
<!-- to add to the models to others-->

</html>