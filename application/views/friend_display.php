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
<?php
    function check_friend_exist($customer_id2){
        $customer_id = $this->session->userdata("customer_id");
        $result = FALSE;
        $this->session->userdata('customer_id');
        $this->db->select('customer_id');
        $this->db->where('customer_id2', $customer_id2);
        $this->db->get('is_friends_with',1);
        if($query->num_row == 1){
            $row = $query->row();
            if($row->customer_id == $customer_id){
                $result = TRUE;
            }
        }
        return $result;
    }
?>
<body>
    <h2>Current Friends</h2>
    <table border='1'> 
        <tr><th>Name</th><th>Email</th><th>Country</th><th>Telephone</th></tr>
    <?php
    for($i = 1;$i < sizeof($friendlist);$i++){
        if(isset($friendlist[$i])){
        $friend = $friendlist[$i];
    ?>    
        <tr><td><a href=<?=  site_url('user/'.$friend['customer_id'])?>><?=$friend['first_name'].' '.$friend['last_name']?></a></td><td><?=$friend['email']?></td><td><?=$friend['country']?></td><td><?=$friend['hp_no']?></td></tr>
    <?
        }
    }
    ?>
    </table>
    <h2>Find People</h2>
<?php echo $error;?>
<?php echo form_open('friends/search')?>
<label for="fname">Name:</label><input type="text" name="fname" value="<?php echo set_value('title'); ?>"/>
<label for="email">Email:</label><input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
<br/>
<label>Age Range:</label><input type="text" id="fromage" name="fromage" value="<?php echo set_value('fromage'); ?>"/>
- <input type="text" id="toage" name="toage" value="<?php echo set_value('toage'); ?>"/>
<br/>
Male:<input type="radio" name="gender" value="male" <?php echo set_radio('gender', 'male'); ?> />
Female:<input type="radio" name="gender" value="female" <?php echo set_radio('gender', 'female'); ?> />
<br/>
<br/>
<input type="submit" value="Submit"><input type="Reset"/>
</form>
<table border = '1'> 
<tr><th>Name</th><th>Email</th><th>Gender</th><th>Date of Birth</th><th>Status</th></tr>
<?php
if($resultset != null){
    foreach($resultset->result() as $row){
        echo "<tr>";
        $profilelink = "user/" . $row->customer_id;        
	echo "<td><a href=" .site_url($profilelink) .">".$row->first_name."</a></td><td>".$row->email ."</td>";
	echo "<td>".$row->gender."</td><td>".$row->date_of_birth ."</td>";
            $customer_id2 = $row->customer_id;
            $this->db->select('customer_id');
            $this->db->where('customer_id2', $customer_id2);
            $query = $this->db->get('is_friends_with',1);
            $result = false;//check if the results if works or not
            if ($query->num_rows() > 0)
            {
                //check if the customer id already existed or not
                $customer_id = $this->session->userdata('customer_id');
                if($customer_id == $row->customer_id){
                    $result = true;
                }
            }
            if($result){
                  //echo "<td><a href=". site_url("friends/remove?id=". $row->customer_id) . ">[Remove]</td>";
                  echo "<td><a href='#'>[Is already friend]</td>";
            }else{
                  //echo "<td><a href=". site_url("friends/add?id=". $row->customer_id) . ">[Add]</td>";
                  echo "<td><a href='#'>[Can be added]</td>";
            }
         
        echo "</a></td>";
        echo "</tr>";
}
}
?>
</table>
</body>
</html>

