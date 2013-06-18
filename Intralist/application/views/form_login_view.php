<fieldset>
	<legend>
		Login
	</legend>

<div id="login_form">
	<?php  
		echo form_open('form_login/process_login');
	?>
	
	<label for="username">Username: </label>	
	<?php
		$data = array(
			'name'=>'username',
			'id'=>'username',
			'value'=>'',
			'required' =>'required',
			'aria-required'=>'true',
			'placeholder'=>'wehappyfew',
			'autofocus'=>'true'); 
		echo form_input($data); 
	?>*
	<br />	
	
	<label for="password">Password: </label>
	<?php 
		$data = array(
				'name'=>'password',
				'id'=>'password',
				'value'=>'',
				'required' =>'required',
				'aria-required'=>'true',
				'placeholder'=>'******',
				'pattern'=>'\S{6,}');
	echo form_password($data); ?>* 
	<sub>at least 6 characters without spaces</sub>
	<br />
	
	<?php
	echo form_submit('submit','Login');
		echo " or ";
	echo anchor('form_login/signup','Create an account');
	?>
	<br />
	<?php
	echo anchor('','Forgot your password???');
	
	?>
	
	<?php echo form_close();	 ?>
</fieldset>
</div>

