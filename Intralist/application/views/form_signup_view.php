
	<h1>Sign up for Intralist!</h1>

	<div id="signup_form">

	<?php  
		echo form_open('form_login/create_account');
	?>
	<fieldset>
	<legend> Account details </legend>
	<b><?php echo form_error('username'); ?></b>
	<label for="username">    Username:     </label>	
	<?php
		$username_attributes = array 
		(
		'class'=>'',
		'id'   =>'username',
		'name' =>'username',
		'size' =>'26',
		'maxlength'=>'25',
		'value'=> set_value('username')
		);
		echo form_input($username_attributes); 
	?>*<br />	
	
	<b><?php echo form_error('password1'); ?></b>
	<label for="password1">     Password:    </label>
	<?php
		$password1_attributes = array 
		(
		'class'=>'',
		'id'   =>'password1',
		'name' =>'password1',
		'size' =>'21',
		'maxlength'=>'20',
		'value'=> set_value('password1')
		);
		echo form_password($password1_attributes); 
	?>*<br />
	
	<b><?php echo form_error('password2'); ?></b>
	<label for="password2">     Retype password: </label>
	<?php
		$password2_attributes = array 
		(
		'class'=>'',
		'id'   =>'password2',
		'name' =>'password2',
		'size' =>'21',
		'maxlength'=>'20',
		'value'=> set_value('password2')
		);
		echo form_password($password2_attributes); 
	?>*<br />
	</fieldset>
	
	
	
	
	<fieldset>
	<legend>Your info</legend>
	<b><?php echo form_error('first_name'); ?></b>
	<label for="first_name">      First name:   </label>	
	<?php
		$first_name_attributes = array 
		(
		'class'=>'',
		'id'   =>'first_name',
		'name' =>'first_name',
		'size' =>'32',
		'maxlength'=>'30',
		'value'=> set_value('first_name')
		);
		echo form_input($first_name_attributes); 
	?>*<br />
	
	<b><?php echo form_error('last_name'); ?></b>
	<label for="last_name">      Last name:    </label>	
	<?php
		$last_name_attributes = array 
		(
		'class'=>'',
		'id'   =>'last_name',
		'name' =>'last_name',
		'size' =>'32',
		'maxlength'=>'30',
		'value'=> set_value('last_name')
		);
		echo form_input($last_name_attributes); 
	?>*<br />
	
	<b><?php echo form_error('user_email'); ?></b>
	<label for="user_email">     Email:    </label>	
	<?php
		$user_email_attributes = array 
		(
		'class'=>'',
		'id'   =>'user_email',
		'name' =>'user_email',
		'size' =>'32',
		'maxlength'=>'100',
		'value'=> set_value('user_email'),
		'type'=>'email'
		);
		echo form_input($user_email_attributes); 
	?>*<br />
	</fieldset>
	
	<fieldset>
	<legend>Billing info <b>(SSL SECURE)<b></legend>
	
	</fieldset>
	
	By creating an account, you're agreeing to the 
		<a href="<?php echo site_url("terms_privacy/terms") ?>">		 terms		   </a> 
		and 
		<a href="<?php echo site_url("terms_privacy/privacy_policy") ?>">privacy policy</a>.
		<br />
	
	<?php
	echo form_submit('submit','Create my account!');
	?>
	
	<?php echo form_close();	 ?>
	</div>
	
	<hr />











