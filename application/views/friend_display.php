<html>
<head>
<title>Upload A Design</title>
</head>
<body>
<?php echo $error;?>
<?php echo form_open('friend/search')?>
<label for="fname">Name</label><input type="text" name="fname" value="<?php echo set_value('title'); ?>"/>
<label for="username">UserName</label><input type="text" name="username" value="<?php echo set_value('username'); ?>"/>
<label for="age">Age</label><input type="text" name="age" size="2" maxlength="2" value="<?php echo set_value('age'); ?>"/>
<br/>
Male:<input type="radio" name="type" value="Sales" <?php echo set_radio('type', 'On Sales'); ?> />
Female:<input type="radio" name="type" value="Private" <?php echo set_radio('type', 'Private'); ?> />
<br/>
<input type="submit" value="Submit"><input type="Reset">
</form>
<table border = '1'> 
<tr><th>Name</th><th>UserName</th><th>Age</th><th>Gender</th></tr>
</table>
</body>
</html>