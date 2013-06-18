
	<h1><?php echo anchor('suppliers_table','Όλοι οι προμηθευτές') ?></h1>
	
	<div>
		<h5>
			<a href="<?php echo site_url("pdf_creator/pdf") ?>" >create PDF</a>
		</h5>
	</div>
	
<div id="suppliers_table_view">
	<p>
		<?php

		//echo $this->table->set_caption('');
		echo $this->table->set_heading('Πελάτης','Προμηθευτής', 'Α.Φ.Μ. προμηθευτή', 'Χώρα προμηθευτή'); 
		echo $this->table->set_empty("-");
		
		$tmpl = array (
        'table_open'         => '<table border="1" cellpadding="5" cellspacing="0">',
        
        'heading_row_start'  => '<tr class="" id=""> ',
        'heading_row_end'    => '</tr> </a>',
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
        
        'table_close'        => '</table>'     );
		
		echo $this->table->set_template($tmpl);
		echo $this->table->generate($suppliers);
	?>
	
	
	</p>
	
	</div>
