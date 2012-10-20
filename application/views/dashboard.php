<div class="container">
	
	<div class="page-header">
		<h1>Welcome to your dashboard dude!</h1>		
	</div>
	
	<div class="row">
		<div class="span12">
			<h3>Best Selling Designs</h3>
		</div>
	</div>
	
	<ul class="nav nav-tabs" id="tab_section">
	  <li class="active"><a href="#global">Global</a></li>
	  <li><a href="#local">Friends</a></li>
	</ul>
	
	<div class="tab-content">
	  <div class="tab-pane fade active in" id="global">
	  
			<div class="row">
				<div class="span12">			

					<ul class="thumbnails">
						<?php for ($i = 0; $i < 12; $i++): ?>
						  <li>
						    <div class="thumbnail">
						      <img src="http://placehold.it/150x100" alt="">
						    </div>
						  </li>
						<?php endfor; ?>
					</ul>
											
				</div>
			</div>
				
	  </div>

	  <div class="tab-pane fade" id="local">
			<div class="row">
				<div class="span12">			

					<ul class="thumbnails">
						<?php for ($i = 0; $i < 12; $i++): ?>
						  <li>
						    <div class="thumbnail">
						      <img src="http://placehold.it/150x100" alt="">
						    </div>
						  </li>
						<?php endfor; ?>
					</ul>

				</div>
			</div>
			
	  </div>
	  <div class="tab-pane fade" id="messages">Message</div>
	  <div class="tab-pane fade" id="settings">Settings</div>
	</div>		

	<div class="row">
		<div class="span12">
			<h3>Activity Feed</h3>
		</div>
	</div>
	
	
	<div class="activity_feed row">
		<div class="span6">
	
			<!-- COMMENT -->	
			<div class="single_feed">
				<div class="row">
					<p class = "span12"><a href = "#">Jason</a> <strong>commented</strong> on <a href = "#">Deshun</a>'s Design.</p>			
				</div>
				<div class="row">
					<div class = "span12">
					    <div class="thumbnail pull-left">
					      <img src="http://placehold.it/80x60" alt="">
					    </div>
						<blockquote class = "pull-left span4">
						  <p>
							Nice design! Keep it up! Totally Love it! Like nobody business!
							</p>
						</blockquote>
					</div>
				</div>
				<div class="row">
					<div class = "span3 offset4"><small>59 seconds ago</small></div>
				</div>
			</div>	

			<hr>
			<!-- RATED -->	

			<div class="single_feed">
				<div class="row">
					<div class = "span12">
					    <div class="thumbnail pull-left">
					      <img src="http://placehold.it/80x60" alt="">
					    </div>
						<p class = "span5 pull-left"><a href = "#">Jason</a> <strong>rated</strong> <a href = "#">Deshun</a>'s Design.</p>
					</div>					
				</div>
				<div class="row">
					<div class = "span3 offset4"><small>59 seconds ago</small></div>
				</div>		
			</div>	

			<hr>
			<!-- CREATED -->

			<div class="single_feed">
				<div class="row">
					<div class = "span12">
					    <div class="thumbnail pull-left">
					      <img src="http://placehold.it/80x60" alt="">
					    </div>
						<p class = "span5 pull-left"><a href = "#">Jason</a> <strong>created</strong> a new <a href = "#">design</a></p>
					</div>					
				</div>
				<div class="row">
					<div class = "span3 offset4"><small>59 seconds ago</small></div>
				</div>		
			</div>	

			<hr>
			<!-- SOLD -->

			<div class="single_feed">
				<div class="row">
					<div class = "span12">
					    <div class="thumbnail pull-left">
					      <img src="http://placehold.it/80x60" alt="">
					    </div>
						<p class = "span5 pull-left"><a href = "#">Jason</a> <strong>sold</strong> a <a href = "#">design</a></p>
					</div>					
				</div>	
				<div class="row">
					<div class = "span3 offset4"><small>59 seconds ago</small></div>
				</div>		
			</div>	

			<hr>
			<!-- PURCHASE -->

			<div class="single_feed">
				<div class="row">
					<div class = "span12">
						<a href = "#">Jason</a> <strong>purchase</strong> a <a href = "#">shirt</a>
					</div>			
				</div>
				<div class="row">
					<div class="span12">			

						<ul class="thumbnails">
							<?php for ($i = 0; $i < 4; $i++): ?>
							  <li>
							    <div class="thumbnail">
							      <img src="http://placehold.it/80x60" alt="">
							    </div>
							  </li>
							<?php endfor; ?>
						</ul>						
					</div>
				</div>
				<div class="row">
					<div class = "span3 offset4"><small>59 seconds ago</small></div>
				</div>		
			</div>

			<hr>
			<!-- SOLD -->

			<div class="single_feed">
				<div class="row">
					<div class = "span12">
					    <div class="thumbnail pull-left">
					      <img src="http://placehold.it/80x60" alt="">
					    </div>
						<p class = "span5 pull-left"><a href = "#">Jason</a> is now <strong>friend</strong> with <a href = "#">Chen Deshun</a></p>
					</div>					
				</div>	
				<div class="row">
					<div class = "span3 offset4"><small>59 seconds ago</small></div>
				</div>		
			</div>
			
		</div> <!-- end of .span6 -->
	</div> <!-- end of .activity_feed -->	
	
		
		
</div>

<script>
head(function() {
		$('#tab_section a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		})
});


</script>
