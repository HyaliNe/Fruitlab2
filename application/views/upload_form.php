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
</body>
<!-- to add to the models to others-->

</html>