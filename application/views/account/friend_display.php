
<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Friends</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p>Here you can see all your friends</p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->

<div class="container">
	<div class="row">
		<div class="span3 offset8">
			<form class="form-search pull-left" action="<?php echo site_url('friends/search'); ?>" method = "post">
			  <div class="input-append">
				<input type="hidden" value="<?php echo $this->session->userdata('customer_id');?>" name="customer_id" />
			    <input type="text" class="span3 search-query" name = "fname" placeholder="Search for friends ...">
			    <button type="submit" class="btn btn-nav"><i class = "icon-search"></i></button>
			  </div>
			</form>
		</div>
	</div>
	
		<div class="row">
			<div class="span12 clearfix">
				<h4 class = "span12">Friends</h4>			
				
				<?php foreach($friendlist->result() as $friend) : ?>
					<div class="friend pull-left span">
					<a href = "<?php echo site_url("user/".$friend->customer_id2); ?>">
<img class = "thumbnail" src="<?php echo site_url('uploads/'.$friend->img_path);?>" alt="<?php echo $friend->first_name.' '.$friend->last_name?>" /></a>
						<p><?php echo $friend->first_name.' '.$friend->last_name?></p>
					</div>
																
				<?php endforeach; ?>


			</div>
		</div> <!-- end of .row -->
	
	
	
</div>