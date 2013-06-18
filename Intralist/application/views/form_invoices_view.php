
	<h1>Insert a new invoice</h1>

	<div id="form_invoices_view">
	<?php echo form_open('form_invoices/process_invoice'); ?>
	
	<!-- INVOICE NUMBER -------------------------------------------------------->
	<p>
	<b><?php echo form_error('invoice_number'); ?></b>
	<label for="invoice_number">Invoice number: </label>
	<?php 
	$invoice_number_attributes = array 
	(
	'class'=>'',
	'id'   =>'invoice_number',
	'name' =>'invoice_number',
	'size' =>'21',
	'maxlength'=>'20',
	'value'=> set_value('invoice_number','')
	);
	echo form_input($invoice_number_attributes);
	?>
	</p>
	
	<!-- INVOICE DATE ------------------------------------------------------------>
	<p>
	<b><?php echo form_error('invoice_date'); ?></b>
	<label for="invoice_date">Invoice date: </label>
	<?php 
	$invoice_date_attributes = array 
	(
	'class'=>'',
	'id'   =>'invoice_date',
	'name' =>'invoice_date',
	'size' =>'10',
	'maxlength'=>'10',
	'value'=> set_value('invoice_date','')
	);
	echo form_input($invoice_date_attributes);
	?>
	<font face="Tahoma, Geneva, sans-serif" size="-1"><sup>dd/mm/yyyy</sup></font>
	</p>
	
	
	
	
	
	
	<!-- CLIENT NAME ---------------------------------------------------------------->
	<b><?php echo form_error('client_name'); ?></b>
	
	<label for="client_name">  Client's name: </label>
	<?php 
	$client_name_attributes = 'class="" id="client_name" value="" ';
	if ( isset($clients_names) ):
		
		$names[' '] = '-Επέλεξε πελάτη-';
		//create the list
		foreach ($clients_names as $name):
			$names[$name->id] = $name->client_name;
		endforeach;
		
		echo form_dropdown('client_name',$names,' ',$client_name_attributes);
	else: 
		$names[' '] = '- ΠΡΟΣΟΧΗ -';
		echo form_dropdown('client_name',$names,' ',$client_name_attributes);
		echo '--><div>Δεν υπάρχουνε καταχωρημένοι πελάτες!';
	endif;
	?>
	
	<!-- SUPPLIER NAME -->
	<p>
	<b><?php echo form_error('supplier_name'); ?></b>
	<label for="supplier_name">Supplier's name: </label>
	<?php 
	$sup_name_attributes = 'class="" id="supplier_name" value="" ';
	// create the dropdown options directly from the mysql table
	// set the first option as the preselected
	
	if ( isset($sup_names) ):
		$names1[' '] = '-Επέλεξε προμηθευτή-';
		foreach ($sup_names as $name):
			$names1[$name->sup_name]= $name->sup_name;
		endforeach;
		echo form_dropdown('supplier_name',$names1,' ',$sup_name_attributes);
	else: 
		$names1[' '] = '- ΠΡΟΣΟΧΗ -';
		echo form_dropdown('supplier_name',$names1,' ',$sup_name_attributes);
		echo '--><div>Δεν υπάρχουνε καταχωρημένοι προμηθευτές!
					<br />..εμπρός,καταχωρήστε μερικούς!</div>';
	endif;
	
	?>
	</p>
	
	
	
	
	
	<!-- COUNTRY -->
	<p>
	<b><?php echo form_error('country'); ?></b>
	<label for="country">Country: </label>
	<?php 
	$country_attributes = 'class="" id="country" value="" ';
	$country_options = array
	(
	' '=>'-Επέλεξε χώρα-',
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
	'RO'=>'Ρουμανία'
	);
	
	echo form_dropdown('country',$country_options,' ',$country_attributes);
	?>
	</p>
	
	<!-- CUSTOMS CODE -->
	<p>
	<b><?php echo form_error('customs_code'); ?></b>
	<label for="customs_code">Customs code: </label>
	<?php 
	$customs_code_attributes = array 
	(
	'class'=>'',
	'id'   =>'customs_code',
	'name' =>'customs_code',
	'size' =>'9',
	'maxlength'=>'8',
	'value'=> set_value('customs_code','') 
	);
	echo form_input($customs_code_attributes);
	?>
	</p>
	
	<!-- TRANSACTION METHOD -->
	<p>
	<b><?php echo form_error('transact_method'); ?></b>
	<label for="transact_method">Transaction method: </label>
	<?php 
	$transact_method_attributes = 'class="" id="transact_method" value="" ' ;
	// create the dropdown options directly from the mysql table
	// set the first option as the preselected
	
	if ( isset($transact_names) ):
		$names2[' '] = '-Επέλεξε τρόπο συναλλαγής-';
		foreach ($transact_names as $row) :
			$names2[$row->transact_code] = $row->transact_name ;
		endforeach;
		echo form_dropdown('transact_method',$names2,' ',$transact_method_attributes);
	else:
		$names2[' '] = '-ΠΡΟΣΟΧΗ-';
		echo form_dropdown('transact_method',$names2,' ',$transact_method_attributes);
		echo '-->φαίνεται ότι λείπουν οι τρόποι συναλλαγής.Επικοινωνήστε μαζί μας άμεσα!';
	endif;
	
	?>*
	</p>
	
	<!-- TRANSPORTATION METHOD -->
	<p>
	<b><?php echo form_error('transport_method'); ?></b>
	<label for="transport_method">Transportation method: </label>
	<?php 
	$transport_method_attributes = 'class="" id="transport_method" value="" ' ;
	// create the dropdown options directly from the mysql table
	// set the first option as the preselected
	
	if ( isset($transport_names) ):
		$names3[' '] = '- Επέλεξε τρόπο μεταφοράς -';
		foreach ($transport_names as $row) :
			$names3[$row->transport_code] = $row->transport_name ;
		endforeach;
		echo form_dropdown('transport_method',$names3,' ',$transport_method_attributes);
	else:
		$names3[' '] = '-ΠΡΟΣΟΧΗ-';
		echo form_dropdown('transport_method',$names3,' ',$transport_method_attributes);
		echo '-->φαίνεται ότι λείπουν οι τρόποι μεταφοράς.Επικοινωνήστε μαζί μας άμεσα!';
	endif;
	
	
	?>
	</p>
	
	<!-- NET MASS -->
	<p>
	<b><?php echo form_error('net_mass'); ?></b>
	<label for="net_mass">Net mass: </label>
	<?php 
	$net_mass_attributes = array 
	(
	'class'=>'',
	'id'   =>'net_mass',
	'name' =>'net_mass',
	'size' =>'15',
	'maxlength'=>'14',
	'value'=> set_value('net_mass','') 
	);
	echo form_input($net_mass_attributes);
	?>
	</p>
	
	<!-- SUPPLEMENTARY UNITS -->
	<p>
	<b><?php echo form_error('suppl_units'); ?></b>
	<label for="suppl_units">Supplementary units: </label>
	<?php 
	$suppl_units_attributes = array 
	(
	'class'=>'',
	'id'   =>'suppl_units',
	'name' =>'suppl_units',
	'size' =>'15',
	'maxlength'=>'14',
	'value'=> set_value('suppl_units','') 
	);
	echo form_input($suppl_units_attributes);
	?>
	</p>
	
	<!-- INVOICE VALUE -->
	<p>
	<b><?php echo form_error('invoice_value'); ?></b>
	<label for="invoice_value">Invoice value: </label>
	<?php 
	$invoice_value_attributes = array 
	(
	'class'=>'',
	'id'   =>'invoice_value',
	'name' =>'invoice_value',
	'size' =>'15',
	'maxlength'=>'14',
	'value'=> set_value('invoice_value','') 
	);
	echo form_input($invoice_value_attributes);
	?>
	</p>
	
	<p><?php echo form_reset('reset','Reset fields'); 
	echo form_submit('submit','Submit'); ?></p>
	
	<?php echo form_close(); ?>
	</div>

<sup>* οι κωδικοί με αστερίσκο δεν είναι αποδεκτοί και παρουσιάζονται 
για διευκόλυνση των περιγραφών </sup>



















