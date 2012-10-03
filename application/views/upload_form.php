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
    
<label for="title">Title:</label><input type="text" name="title" value="<?php echo set_value('title'); ?>">
<br/>
<label for="price">Price:</label><input type="text" name="price" value="<?php echo set_value('price'); ?>">
<br/>
Sales:<input type="radio" name="type" value="Sales" <?php echo set_radio('type', 'On Sales', TRUE); ?> />
Private:<input type="radio" name="type" value="Private" <?php echo set_radio('type', 'Private'); ?> />
<br/>
<label for="image_path">Upload Design:</label><input type="file" value="<?php echo set_value('userfile')?>" name="userfile" size="20" />
<br />
<input type="submit" value="Submit" />
</form>
<table border = '1'> 
<tr><th>Title</th><th>Price($)</th><th>Type</th><th>Image_Path</th></tr>
<?php
    $customer_id = 1;
    $query = $this->db->get('design',$customer_id);
    if ($query->num_rows() > 0)
    {

    foreach ($query->result() as $row)
    {
       echo "<tr>";
       echo "<td>". $row->title . "</td>";
       echo "<td>" . $row->price . "</td>";
       echo "<td>" . $row->type . "</td>";
       echo "<td><img src=" . $row->image_path . "/></td>";
       echo "</tr>";
   
    }
    }
?>
 </table>
</body>
<!-- to add to the models to others-->

</html>