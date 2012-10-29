<div class="hero-unit">
	<div class="row-fluid">
		<div class="span12">
			
			<div class="row-fluid">
				<div class="span10">
					<h1>Login</h1>						
				</div>
			</div>

			<div class="row-fluid">
				<div class="span10">
					<p>Please login before proceeding any further.</p>
				</div>
			</div>
			
   		</div> <!-- end of span12 -->
	</div>
</div> <!-- end of .hero-unit -->

<div class="container">

	<form class="form-horizontal well span5 offset3" action = "<?php echo site_url('login/validate'); ?>" method = "post">
		
		<?php if ($error): ?>

		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">×</a>
			Incorrect username or password. Please try again.
		</div>

		<?php endif ?>
		
	  <div class="control-group">	
	    <label class="control-label" for="inputEmail">Email</label>
	    <div class="controls">
	      <input type="text" id="inputEmail" placeholder="Email" name = "email">
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="inputPassword">Password</label>
	    <div class="controls">
	      <input type="password" id="inputPassword" placeholder="Password" name = "password">
	    </div>
	  </div>
	  <div class="control-group">
	    <div class="controls">
	      <button type="submit" class="btn btn-medium pull-left">Sign in</button>
			<p class = "pull-left span2"><a href = "#">Forget Password</a></p>
	    </div>
	  </div>
	</form>
	
</div>