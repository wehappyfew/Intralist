<div id="clients_dropdown">
	<p>

<!-- SELECT CLIENT------------------------------------------------------------>
	<?php echo form_open('suppliers_table/show_specific_suppliers'); ?>
	
	<b><?php echo form_error('client_name'); ?></b>
	
	<label for="client_name"> Δείξε μου μόνο τους προμηθευτές του : </label>
	<?php 
	$client_name_attributes = 'class="" id="client_name" value="" ';
	if ( isset($client_names) ):
		
		$names[' '] = '-Επέλεξε πελάτη-';
		//create the list
		foreach ($client_names as $name):
			$names[$name->id] = $name->client_name;
		endforeach;
		
		echo form_dropdown('client_name',$names,' ',$client_name_attributes);
	else: 
		$names[' '] = '- ΠΡΟΣΟΧΗ -';
		echo form_dropdown('client_name',$names,' ',$client_name_attributes);
		echo '--><div>Δεν υπάρχουνε καταχωρημένοι πελάτες!';
	endif;
	?>
	
	<?php echo form_submit('submit','Πάμε!'); ?>
	
	<?php echo form_close(); ?>
	</p>		
</div>

