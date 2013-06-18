<header>
	<nav id="navigation_view">
		 &#9679
	<a href="<?php echo site_url("intralist_home/index") ?>" > Intralist 		 </a>&#9679
	
	<!-- Check if the user is logged in and if it is , show the Control Panel link -->
	<?php 
		if ( $this->session->userdata('is_logged_in') == FALSE):
	?>
	
	<a href="<?php echo site_url("form_login/index") ?>" >Login</a>&#9679
	<a href="<?php echo site_url("form_login/pricing_plans") ?>" >Pricing&Plans</a>&#9679	
		
	<?php
		else : 
	?>
	
	<a href="<?php echo site_url("control_panel/index") ?>" >Control Panel</a>&#9679
	<a href="<?php echo site_url("logout/index") ?>" >Log Out</a>&#9679
	
	<?php
		endif;
	?>
	<!-- -------------------------------------------------------------------------- -->
	</nav>
</header>
