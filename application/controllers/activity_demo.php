<div class="container">
	
	<h1>Activity list demo</h1>
	<?php if ($listExist) {
		foreach($activity as $row)
			echo $row."</br>";
		
	} else {
		echo "OH NO!";
	}?>
</div>