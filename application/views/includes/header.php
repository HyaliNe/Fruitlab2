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
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>

    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">

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
										}		?>">FruitLab</a>
				<?php if ( $this->session->userdata('email') ) : ?>
		<ul class="nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Design
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<a href="<?php echo site_url('upload_form'); ?>"> Create design</a>
					<a href="<?php echo site_url('upload_form'); ?>"> Search design</a>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Friends
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<a href="<?php echo site_url('upload_form'); ?>"> View friends</a>
					<a href="<?php echo site_url('upload_form'); ?>"> Search friends</a>
				</ul>
			</li>			
		</ul>
	      <div class="nav-collapse collapse pull-right">
            <ul class="nav">
				
				<li>
					<div class="btn-group">
			          <a class="btn" href="#"><i class="icon-user"></i> <?php echo $this->session->userdata('email'); ?></a>
			          <a class="btn dropdown-toggle btn-warning" data-toggle="dropdown" href="#"><span class="caret"></span></a>
			          <ul class="dropdown-menu">
						<?php $profile = 'user/' . $this->session->userdata('customer_id'); ?>
						<li><a href="<?php echo site_url($profile); ?>"><i class="icon-home"></i> Profile</a></li>
							<!-- added a a href for settings, this will redirect to the correct settings page -->
			            <li><a href="<?php echo site_url('setting/retrieve'); ?>"><i class="icon-wrench"></i> Settings</a></li>
			            <li><a href="<?php echo site_url('logout'); ?>"><i class="icon-off"></i> Logout</a></li>
			          </ul>
			        </div>
				</li>

				<?php else: ?>
	      <div class="nav-collapse collapse">
            <ul class="nav">
	
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
				<li class="active"><a href="<?php echo site_url('register'); ?>">Register</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>

            <form class="navbar-form pull-right" action = "<?php echo site_url('login/validate'); ?>" method = "post">
              <input class="span2" type="text" id="inputEmail" name="email" placeholder="Email">
              <input class="span2" type="password" id="inputPassword" name = "password" placeholder="Password">

              <button type="submit" class="btn">Sign in</button>
            </form>

		<?php endif; ?>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>