<html>
<head>
<title>Create New Design</title>
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
<h2> Create New Design</h2>

<div class="row">
	<div class="span4 offset1">
		<div class="row">
			<div class="span2">
				Title
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<input type="text" name="title" value="<?php echo set_value('title'); ?>">
			</div>		
		</div>		
	</div>
</div>

<div class="row">
	<div class="span4 offset1">
		<div class="row">
			<div class="span2">
				Price
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<input type="text" name="price" value="<?php echo set_value('price'); ?>">
			</div>		
		</div>		
	</div>
</div>
<div class="row">
	<div class="span4 offset1">
		<div class="row">
			<div class="span2">
				Type:
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<input type="radio" name="type" value="Sales" <?php echo set_radio('type', 'On Sales', TRUE); ?> />Sales
				<input type="radio" name="type" value="Private" <?php echo set_radio('type', 'Private'); ?> />Private
			</div>		
		</div>		
	</div>
</div>

<?php
   /*
    * insert everything into the taglist
    * send to guoliang the updated database to insert intot the atag list from the current database
    * get the last insert id from the database to the inser into the database
    * create the tag cloud for jason to integrate into the database
    * write a foreach method to insert each into the database
    * after which insert the column into the database
    * @todo create a search by tag cloud options in deshun tag cloud
    */
?>
<br/>
Assign a Tag to your Clothes:<br/>
<?php
   $query =  $this->db->query('Select tag_id,name from tag');
   foreach ($query->result() as $row){
     echo  $row->name . " " ."<input type='checkbox' name='tag[]' value=". $row->tag_id .">";
   }
?>
<br/>
<br/>
 
<div class="row">
	<div class="span12 offset1">
		<div class="row">
			<div class="span1">
				Upload Image:
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input type="file" value="<?php echo set_value('userfile')?>" name="userfile" />
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="span2 offset1">
		<input type="submit" value="Create" />
	</div>
</div>
</form>
<h2> Current Design </h2>
<table border = '1'> 
<tr><th>Title</th><th>Image_Path</th><th>Price($)</th><th>Type</th><th>Design_ID</th><th>Action</th></tr>
<?php
    $customer_id = $this->session->userdata('customer_id');
    echo $customer_id;
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