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
<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>friends display</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p></p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->

<div class="container">
	<div class="row">
		<form class="navbar-form form-search pull-left offset2" action="<?php echo site_url('friends/search'); ?>" method="post">
			<div class="input-append">
			<input type="hidden" value="<?php echo $this->session->userdata('customer_id');?>" name="customer_id" />
			<input type="text" class="span4 search-query" name="fname" placeholder="Search for friends ..."/>
			<button type="submit" class="btn"><i class = "icon-search"></i></button>		
		  </div>
		</form>
	</div>
	<p></p>
	<div class="row">
		<?php
		foreach($friendlist->result() as $friend)
		{	?>
		<div class="span3">
			<div class="row">
				<form action="<?php echo site_url('user/'.$friend->customer_id2);?>" method="post">
					<input type="image" src="<?php echo site_url('uploads/'.$friend->img_path);?>"/>
				</form>
			</div>
			<div class="row">
				<div class="span2">
					<?=$friend->first_name.' '.$friend->last_name?>
				</div>
			</div>
		</div>		
	 <?php	
		}
		?>
	</div>
</div>
