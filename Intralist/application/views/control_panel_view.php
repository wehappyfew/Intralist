

	<h1>CONTROL PANEL!</h1>

<div id="control_panel_view">
	<!--the content of the home page goes in here-->
	
	<p>	<b>Πελάτες</b> <br />
		<a href="<?php echo site_url("clients_table/index") ?>"> Οι πελάτες μου	</a> -|-
		<a href="<?php echo site_url("form_clients/index") ?>" > Φόρμα νέου πελάτη </a>-|-
		<a href="<?php echo site_url("clients_delete/index") ?>" > Διαγραφή πελάτη </a>-|-
		<a href="<?php echo site_url("") ?>" > Τροποποίηση στοιχείων </a><br />
	</p><hr />
	
	<p>	<b>Προμηθευτές</b> <br />
		<a href="<?php echo site_url("suppliers_table/index") ?>"> Όλοι οι προμηθευτές	</a> -|-
		<a href="<?php echo site_url("form_suppliers/index") ?>"> Φόρμα νέου προμηθευτή </a> <br />
	</p><hr /><hr />
	
	<p>	<b>Τιμολόγια</b> <br />
		<a href="<?php echo site_url("invoices/index") ?>">       Πίνακας τιμολογίων	</a> -|-
		<a href="<?php echo site_url("form_invoices/index") ?>" > Φόρμα νέου τιμολογίου     </a><br />
	</p><hr /><hr /><hr />
	
	<p>	<b>INTRASTAT-LISTING</b> <br />
		<a href="<?php echo site_url("intrastat/index") ?>"> Intrastat Table	</a> -|-
		<a href="<?php echo site_url("listing/index") ?>"> Listing Table	</a> <br />
	</p><hr /><hr /><hr /><hr />
	
	<p>	<b>Πίνακες</b> <br />
		<a href="<?php echo site_url("countries/index") ?>"> Countries Table </a> -|-
		<a href="<?php echo site_url("transactions/index") ?>"> Transactions Table </a> -|-
		<a href="<?php echo site_url("transportations/index") ?>"> Transportations Table </a> -|-
		<a href="<?php echo site_url("so_table/index") ?>"> ΣΥΝΔΥΑΣΜΕΝΗ ΟΝΟΜΑΤΟΛΟΓΙΑ - 2011 </a> <br />
	</p><hr />
	

</div>