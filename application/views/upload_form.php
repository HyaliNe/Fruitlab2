<html>
<head>
<title>Upload A Design</title>
</head>
<body>
<?php echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>
<label for="title">Title:</label><input type="text" name="title">
<br/>
<label for="price">Price:</label><input type="text" name="price">
<br/>
<label for="type">Type:</label><input type="text" name="type">    
<br/>
<label for="rating">Rating:</label><input type="text" name="rating">
<br/>
<label for="image_path">Upload Design</label><input type="file" name="image_path" size="20" />
<br />
<input type="submit" value="upload" />
</form>
</body>
</html>