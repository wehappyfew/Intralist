

	<h1>-SHOW MY TABLES- </h1>

<div id="show_tables">
	<!--the content of the home page goes in here-->
	
	<p>
	<?php 
		foreach ($tables as $table):
			echo $table->Tables_in_intralist . "<br />" ;
		endforeach;
	 ?>
	</p><hr />		

</div>

