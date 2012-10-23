<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Design Your Shirt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 80px;
      }
    </style>

    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
	
	<?php if ($css): ?>
		<?php foreach ($css as $key => $value): ?>
		<link href="<?php echo base_url(); ?>css/<?php echo $value; ?>.css" rel="stylesheet">
		<?php endforeach ?>		
	<?php endif ?>
	<script src = "<?php echo base_url(); ?>js/head.load.min.js"></script>
	
	<script>
	head.js("<?php echo base_url(); ?>js/jquery-1.8.2.min.js")
	     .js("<?php echo base_url(); ?>js/bootstrap.min.js")
		<?php //Load additional javascript. Everything is inline to format the output of the code.
		 if ( !empty($js) ) : ?><?php foreach ($js as $key => $value) : ?>.js("<?php echo base_url(). 'js/' .$value.'.js'; ?>")<?php endforeach ?><?php endif ?>;
	</script>
	
	<!-- include facebook SDK -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=231963610242030";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
	      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		  <!-- pressing this brand should redirect to the customer dashboard(if logged in) else go to main page, refer to facebook -->
          <a class="brand" href="<?php if($this->session->userdata('email') != null)
										{	
											echo site_url("dashboard");
										}
										else
										{
											echo site_url();
										}		?>"><img src = "<?php echo site_url(); ?>img/logo.png" /></a>
			<form class="navbar-form form-search pull-left" action="<?php echo site_url('design/searchDesign'); ?>" method="post">
			  <div class="input-append">
			    <input type="text" class="span4 search-query" name="search_clause" placeholder="Search for design ..."/>
			    <button type="submit" class="btn"><i class = "icon-search"></i></button>
			  </div>
			</form>
    										
				<?php if ( $this->session->userdata('email') ) : ?>
		<div class="nav-collapse collapse pull-right">
			<ul class="nav">
				<li>
				<a href="#"><i class="icon-user"></i>Friends</a>
				</li>			
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Design
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<a href="<?php echo site_url('upload');?>">Create New Design</a>
						<?php $retrieveDesign = 'retrieveDesign/' . $this->session->userdata('customer_id'); ?>
						<a href="<?php echo site_url($retrieveDesign);?>">Manage Designs</a>
					</ul>
				</li>
				<li style = "margin-right: 30px; position: relative;">
							<div class="btn-group">
								<a href = "#" class = "btn btn-link" data-toggle="dropdown"><i class = "icon-eye-close"></i> </a>
								<ul class="dropdown-menu">
								<li><a href="#">1 friend request</a></li>        
								<li><a href="#">No New Notification</a></li>
							  </ul>
							  
							</div>
							<div class="badge badge-important" style = "position: absolute; top:3px; left:30px; z-index:99">3</div>
						</li>
				<li>
				<a href="<?php echo site_url('dummycartcontroller');?>"><i class="icon-shopping-cart"></i>Cart</a>
				</li>						
			
				<li>
					<div class="btn-group">
			          <a class="btn btn-nav" href="#"><i class="icon-user"></i> <?php echo $this->session->userdata('email'); ?></a>
			          <a class="btn dropdown-toggle btn-nav" data-toggle="dropdown" href="#"><span class="caret" style = "border-top-color: #000000; border-bottom-color: #000000;"></span></a>
			          <ul class="dropdown-menu">
						<?php $profile = 'user/' . $this->session->userdata('customer_id'); ?>
						<li><a href="<?php echo site_url($profile); ?>"><i class="icon-home"></i> Profile</a></li>
							<!-- added a a href for settings, this will redirect to the correct settings page -->
			            <li><a href="<?php echo site_url('setting/retrieve'); ?>"><i class="icon-wrench"></i> Settings</a></li>
			            <li><a href="<?php echo site_url('logout'); ?>"><i class="icon-off"></i> Logout</a></li>
			          </ul>
			        </div>
				</li>
			</ul>

				<?php else: ?>
				<div class="nav-collapse collapse pull-right">
	            <ul class="nav">				
					<li>
						<div class="btn-group">
							<a class="btn btn-info " href="<?php echo site_url('register'); ?>">Register</a>
							<a class="btn " href="<?php echo site_url('login'); ?>">Login</a>
						</div>
					</li>
		      	</ul>
		
		<?php endif; ?>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>