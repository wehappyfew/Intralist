
	<h1>Καταχώρησε νέο πελάτη</h1>

<div id="form_clients_view">
	<?php echo form_open('form_clients/process_client'); ?>
	
	<!-- CLIENT'S NAME --------------------------------------------------------->
	<p>
	<b><?php echo form_error('client_name'); ?></b>
	<label for="client_name">
		Επωνυμία: 
	</label>
	<?php 
	$client_name_attributes = array 
	(
	'class'=>'',
	'id'   =>'client_name',
	'name' =>'client_name',
	'size' =>'31',
	'maxlength'=>'30',
	'value'=> set_value('client_name') 
	);
	 
	echo form_input($client_name_attributes); 
	?>
	<sup>...only alphanumerics</sup>
	</p>
	
	<!-- client'S VAT NUMBER --------------------------------------------------->
	<p>
	<b><?php echo form_error('client_vat_num'); ?></b>
	<label for="client_vat_num">
		Α.Φ.Μ. πελάτη: 
	</label>
	<?php 
	$client_vat_num_attributes = array 
	(
	'class'=>'',
	'id'   =>'client_vat_num',
	'name' =>'client_vat_num',
	'size' =>'13',
	'maxlength'=>'12',
	'value'=> set_value('client_vat_num') 
	);
	
	echo form_input($client_vat_num_attributes);
	?>
	<sup>...numbers and/or letters</sup>
	</p>
	
	</p>
	
	<!-- CLIENT'S COUNTRY -------------------------------------------------------->
	<p>
	<b><?php echo form_error('client_country'); ?></b>
	<label for="client_country">Χώρα πελάτη: </label>
	<?php 
	$client_country_attributes = 'class="" id="client_country" value="" ';
	$client_country_options = array
	(
	''=>'-Επέλεξε χώρα-',
	'FR'=>'Γαλλία',
	'NL'=>'Ολλανδία',
	'DE'=>'Γερμανία',
	'IT'=>'Ιταλία',
	'GB'=>'Μεγάλη Βρετανία',
	'IE'=>'Ιρλανδία',
	'DK'=>'Δανία',
	'PT'=>'Πορτογαλία',
	'ES'=>'Ισπανία',
	'BE'=>'Βέλγιο',
	'LU'=>'Λουξεμβούργο',
	'SE'=>'Σουηδία',
	'FI'=>'Φιλανδία',
	'AT'=>'Αυστρία',
	'EE'=>'Εσθονία',
	'CY'=>'Κύπρος',
	'LV'=>'Λετονία',
	'LT'=>'Λιθουανία',
	'MT'=>'Μάλτα',
	'HU'=>'Ουγγαρία',
	'PL'=>'Πολωνία',
	'SK'=>'Σλοβακία',
	'SL'=>'Σλοβενία',
	'CZ'=>'Τσεχία',
	'BG'=>'Βουλγαρία',
	'RO'=>'Ρουμανία',
	'GR'=>'Ελλάδα'
	);
	
	echo form_dropdown('client_country',$client_country_options,$client_country_attributes);
	?>
	</p>
	
	<p><?php echo form_reset('reset','Εκκαθάριση'); 
	echo form_submit('submit','Καταχώρηση πελάτη'); ?></p>
	
	<?php echo form_close(); ?>
</div>

