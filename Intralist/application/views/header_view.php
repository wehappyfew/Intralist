<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Intralist</title>
	<link rel="stylesheet"  type="text/css" media="screen" charset="UTF-8" href="<?php echo base_url();?>/css/style.css" >
</head>

<!--FEEDBACK
<style type='text/css'>@import url('http://getbarometer.s3.amazonaws.com/assets/barometer/css/barometer.css');</style>
<script src='http://getbarometer.s3.amazonaws.com/assets/barometer/javascripts/barometer.js' type='text/javascript'></script>
<script type="text/javascript" charset="utf-8">BAROMETER.load('9pEcBbkcxfPHOtPARfpQY');
</script>
-->
<body>
	<div id="logged_in_as">
	<?php
	
		if ( $this->session->userdata("is_logged_in") == TRUE ):
	
	?>	
		Logged in as: <?php echo $this->session->userdata('username'); ?>
	
	<?php
		else: 
	?>	
		You are not logged in .
	<?php
		endif;
	?>	
	</div>	
<!--AFTER the content of the header goes the rest of the HTML separated in views-->