<div class="container">
	<div class = "page-header">
		<h1>Login</h1><br>
		<p>Some message here</p>
	</div> <!-- end of .page-header -->	


	<form class="form-horizontal" action = "<?php echo site_url('login/validate'); ?>" method = "post">
		
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
	      <label class="checkbox">
	        <input type="checkbox"> Remember me
	      </label>
	      <button type="submit" class="btn">Sign in</button>
	    </div>
	  </div>
	</form>
	
</div>