<html>
<head>
<title>Upload A Design</title>
</head>
<body>
<?php echo $error;?>
<?php echo form_open_multipart('upload');?>
    <?php if (validation_errors()): ?>
		<div class="alert alert-error">
		<a class="close" data-dismiss="alert" href="#">×</a>
		<h4 class="alert-heading">Error!</h4>
		<?php echo validation_errors(); ?>
		</div>
    <?php endif ?>
<h2> Upload a Design</h2>
<label for="title">Title:</label><input type="text" name="title" value="<?php echo set_value('title'); ?>">
<br/>
<label for="price">Price:</label><input type="text" name="price" value="<?php echo set_value('price'); ?>">
<br/>
Sales:<input type="radio" name="type" value="Sales" <?php echo set_radio('type', 'On Sales', TRUE); ?> />
Private:<input type="radio" name="type" value="Private" <?php echo set_radio('type', 'Private'); ?> />
<br/>
<label for="image_path">Upload a File:</label><input type="file" value="<?php echo set_value('userfile')?>" name="userfile" size="20" />
<br />
<input type="submit" value="Submit" />
</form>
<h2> Current Design </h2>
<table border = '1'> 
<tr><th>Titles</th><th>Image_Path</th><th>Price($)</th><th>Type</th><th>Design_ID</th><th>Action</th></tr>
<?php
    $customer_id = 1;
    $this->db->where('customer_id', 1); 
	$this->db->where('type !=', 'remove');
    $query = $this->db->get('design');
	echo "hahaha";
	echo $this->db->last_query();
	
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