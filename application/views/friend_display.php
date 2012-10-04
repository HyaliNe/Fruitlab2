<html>
<head>
<title>Upload A Design</title>
</head>
<link rel="stylesheet" href="js/Alvin/themes/base/jquery.ui.all.css">
	<script src="js/Alvin/jquery-1.7.1.js"></script>
	<script src="js/Alvin/ui/jquery.ui.core.js"></script>
	<script src="js/Alvin/ui/jquery.ui.widget.js"></script>
	<script src="js/Alvin/ui/jquery.ui.datepicker.js"></script>
<script>
	 $(function() {
		//must be placed at the top of the block
		var dates = $( "#fromage, #toage" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
		    changeYear : true,
			yearRange: '1921:' + new Date().getFullYear(),
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "fromage" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
		$( "#fromage,#toage" ).datepicker( "option", "dateFormat", "yy/mm/dd");
		//$("#startdate").datepicker('setDate', new Date());//new line of code to start code
		//$("#enddate").datepicker('setDate', new Date());//new line of code to start code
	});

</script>
<body>
    <h2>Search for Friends</h2>
<?php echo $error;?>
<?php echo form_open('friends/search')?>
<label for="fname">Name:</label><input type="text" name="fname" value="<?php echo set_value('title'); ?>"/>
<label for="email">Email:</label><input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
<label for="fromage">From Age:</label><input type="text" id="fromage" name="fromage" value="<?php echo set_value('fromage'); ?>"/>
<label for="toage">To Age:</label><input type="text" id="toage" name="toage" value="<?php echo set_value('toage'); ?>"/>
<br/>
Male:<input type="radio" name="gender" value="male" <?php echo set_radio('gender', 'male'); ?> />
Female:<input type="radio" name="gender" value="female" <?php echo set_radio('gender', 'female'); ?> />
<br/>
<br/>
<input type="submit" value="Submit"><input type="Reset"/>
</form>

<?php 
    //function to check if the things are integrated already or not
    function check_friends_exist($customer_id,$customer_id2){
        
    }
?>

<table border = '1'> 
<tr><th>Name</th><th>UserName</th><th>Age</th><th>Gender</th><th>Action</th></tr>
<?php
if($resultset != null){
    foreach($resultset->result() as $row){
        echo "<tr>";
	echo "<td><a href=#>".$row->first_name."</a></td><td>".$row->email ."</td>";
	echo "<td>".$row->gender."</td><td>".$row->date_of_birth ."</td>";
	echo "<td><a href=". site_url("friends/add?id=". $customer_id) . "/>";
        echo "</a></td>";
        echo "</tr>";
}
}
?>
</table>
</body>
</html>

