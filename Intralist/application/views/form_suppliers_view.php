
	<h1>Καταχώρησε νέο προμηθευτή..</h1> 

<div id="form_suppliers_view">
	<?php echo form_open('form_suppliers/process_supplier'); ?>
	
	<!-- SELECT CLIENT------------------------------------------------------------>
	<b><?php echo form_error('client_name'); ?></b>
	
	<label for="client_name"> Πελάτης : </label>
	<?php 
	$client_name_attributes = 'class="" id="client_name" value="" ';
	// create the dropdown options directly from the mysql table
	// set the first option as the preselected
	if ( isset($client_names) ):
		$names[' '] = '-Επέλεξε πελάτη-';
		foreach ($client_names as $name):
			$names[$name->id]= $name->client_name;
		endforeach;
		echo form_dropdown('client_name',$names,' ',$client_name_attributes);
	else: 
		$names[' '] = '- ΠΡΟΣΟΧΗ -';
		echo form_dropdown('client_name',$names,' ',$client_name_attributes);
		echo '--><div>Δεν υπάρχουνε καταχωρημένοι πελάτες!
					<br />..εμπρός,καταχωρήστε μερικούς!</div>';
	endif;
	?>
	
	<!-- SUPPLIER'S NAME ------------------------------------------------------>
	<p>
	<b><?php echo form_error('sup_name'); ?></b>
	<label for="sup_name">Επωνυμία : </label>
	<?php 
	$sup_name_attributes = array 
	(
	'class'=>'',
	'id'   =>'sup_name',
	'name' =>'sup_name',
	'size' =>'31',
	'maxlength'=>'30',
	'value'=> set_value('sup_name') 
	);
	 
	echo form_input($sup_name_attributes); 
	?>
	<sup>...only alphanumerics</sup>
	</p>
	
	<!-- SUPPLIER'S VAT NUMBER ---------------------------------------------------->
	<p>
	<b><?php echo form_error('sup_vat_num'); ?></b>
	<label for="sup_vat_num">Α.Φ.Μ. : </label>
	<?php 
	$sup_vat_num_attributes = array 
	(
	'class'=>'',
	'id'   =>'sup_vat_num',
	'name' =>'sup_vat_num',
	'size' =>'13',
	'maxlength'=>'12',
	'value'=> set_value('sup_vat_num') 
	);
	
	echo form_input($sup_vat_num_attributes);
	?>
	<sup>...numbers and/or letters</sup>
	</p>
	
	</p>
	
	<!-- SUPPLIER'S COUNTRY ----------------------------------------------------->
	<p>
	<b><?php echo form_error('sup_country'); ?></b>
	<label for="sup_country">Χώρα : </label>
	<?php 
	$sup_country_attributes = 'class="" id="sup_country" value="" ';
	$sup_country_options = array
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
	
	echo form_dropdown('sup_country',$sup_country_options,$sup_country_attributes);
	?>
	</p>
	
	<p><?php echo form_reset('reset','Εκκαθάριση'); 
	echo form_submit('submit','Καταχώρηση προμηθευτή'); ?></p>
	
	<?php echo form_close(); ?>
</div>

