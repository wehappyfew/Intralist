
<h1>Διαγραφή πελάτη</h1>

<div id="clients_delete_view">
<p>
	
<?php echo form_open('clients_delete/process_clients_delete') ?>

<sup>* Προσοχή : Για κάθε πελάτη σβήνονται και οι προμηθευτές που του αντιστοιχούν *</sup>
<table class="">
<tr align="center" valign="center">
	<th>&#35</th> <th>Επωνυμία</th> <th>Α.Φ.Μ.</th> <th>Χώρα</th>
</tr>

<?php foreach ($clients_table as $client): ?>
<tr align="center" valign="center">
	<td> 
		<?php	$checkbox_attributes = array(
							'class'  => '',
    						'name'	 => 'checkbox[]',
    						'id'     => '',
    						'value'  => $client->id,
    						'checked'=> FALSE,
    						'style'  => '',
							);
			   echo form_checkbox($checkbox_attributes);
		 ?>
	</td>
	<td> <?php echo $client->client_name?> </td>
	<td> <?php echo $client->client_vat_num?> </td>
	<td> <?php echo $client->country_name?> </td>
</tr>
<?php endforeach; ?>
</table>

<?php echo form_submit('submit','Διαγραφή επιλεγμένων')?>
<?php echo form_close()?>

</p>
</div>