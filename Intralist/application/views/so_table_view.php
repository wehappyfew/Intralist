
	<h1>ΠΙΝΑΚΑΣ ΣΥΝΔΥΑΣΜΕΝΗΣ ΟΝΟΜΑΤΟΛΟΓΙΑΣ - 2011 -</h1>

	<div id="so_table_view">
	<p>
	<?php
		//echo $this->table->set_caption('');
		echo $this->table->set_heading('Κωδικός', 'Περιγραφή', 'Μονάδα Μέτρησης'); 
		echo $this->table->set_empty("-");
		
		$tmpl = array (
        'table_open'         => '<table border="1" cellpadding="3" cellspacing="0">',
        
        'heading_row_start'  => '<tr class="" id=""> ',
        'heading_row_end'    => '</tr>',
        'heading_cell_start' => '<th class="" id=""> ',
        'heading_cell_end'   => '</th>',
        
        'row_start'          => '<tr class="" id="" align="center" valign="center"> ',
        'row_end'            => '</tr>',
        
        'cell_start'         => '<td class="" id=""> ',
        'cell_end'           => '</td>',
        
        'row_alt_start'      => '<tr class="" id="" align="center" valign="center"> ',
        'row_alt_end'        => '</tr>',
        
        'cell_alt_start'     => '<td class="" id=""> ',
        'cell_alt_end'       => '</td>',
        
        'table_close'        => '</table>'
              );
		echo $this->table->set_template($tmpl);
		echo $this->table->generate($so_rows);
	?>
	<?php echo $this->pagination->create_links(); ?>
	</p>
	</div>

