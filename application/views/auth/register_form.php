<script language="javascript">

  var m_strUpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var m_strLowerCase = "abcdefghijklmnopqrstuvwxyz";
	var m_strNumber = "0123456789";
	var m_strCharacters = "!@#$%^&*?_~";

	function checkPwdStrength() {
		var pwd = document.getElementById("password").value;
		len = pwd.length;
	
		var scorebar = document.getElementById('scorebar');
		var comp = "";
		
		if (len == 0) {
			scorebar.style.backgroundPosition = '0px 0px';
			comp = "Seguridad de la contrasena";
		}
		else {
			auth = parseInt(getPwdScore(pwd));
		
			if(auth >= 90) {
				scorebar.style.backgroundPosition = '0px -30px';
				comp = "Muy Segura";
			}
			else if(auth >= 70) {
				scorebar.style.backgroundPosition = '0px -24px';
				scorebar.style.background = '#11e01c';
				complexity.style.color = '#11e01c';
				comp = "Muy Segura";
			}
			else if(auth >= 50) {
				scorebar.style.backgroundPosition = '0px -18px';
				scorebar.style.background = 'green';
				complexity.style.color = 'green';
				comp = "Segura";
			}
			else if(auth >= 30) {
				scorebar.style.backgroundPosition = '0px -12px';
				scorebar.style.background = 'orange';
				complexity.style.color = 'orange';
				comp = "Débil";
			}
			else if(auth >= 0) {
				scorebar.style.backgroundPosition = '0px -6px';
				scorebar.style.background = 'red';
				complexity.style.color = 'red';
				comp = "Muy Débil";
			}
		}
	
		document.getElementById('complexity').innerHTML = comp;
		return false;
	}
	
	function getPwdScore(strPassword) {
		// Reset combination count
		var nScore = 0;
	
		// Password length
		// -- Less than 4 characters
		if (strPassword.length < 5) {
			nScore += 5;
		}
		// -- 5 to 7 characters
		else if (strPassword.length > 4 && strPassword.length < 8) {
			nScore += 10;
		}
		// -- 8 or more
		else if (strPassword.length > 7) {
			nScore += 25;
		}
	
		// Letters
		var nUpperCount = countContain(strPassword, m_strUpperCase);
		var nLowerCount = countContain(strPassword, m_strLowerCase);
		var nLowerUpperCount = nUpperCount + nLowerCount;
		// -- Letters are all lower case
		if (nUpperCount == 0 && nLowerCount != 0) {
			nScore += 10;
		}
		// -- Letters are upper case and lower case
		else if (nUpperCount != 0 && nLowerCount != 0) {
			nScore += 20;
		}
	
		// Numbers
		var nNumberCount = countContain(strPassword, m_strNumber);
		// -- 1 number
		if (nNumberCount == 1) {
			nScore += 10;
		}
		// -- 3 or more numbers
		if (nNumberCount >= 3) {
			nScore += 20;
		}
	
		// Characters
		var nCharacterCount = countContain(strPassword, m_strCharacters);
		// -- 1 character
		if (nCharacterCount == 1) {
			nScore += 10;
		}
		// -- More than 1 character
		if (nCharacterCount > 1) {
			nScore += 25;
		}
	
		// Bonus
		// -- Letters and numbers
		if (nNumberCount != 0 && nLowerUpperCount != 0) {
			nScore += 2;
		}
		// -- Letters, numbers, and characters
		if (nNumberCount != 0 && nLowerUpperCount != 0 && nCharacterCount != 0) {
			nScore += 3;
		}
		// -- Mixed case letters, numbers, and characters
		if (nNumberCount != 0 && nUpperCount != 0 && nLowerCount != 0
				&& nCharacterCount != 0) {
			nScore += 5;
		}
	
		return nScore;
	}
	
	// Checks a string for a list of characters
	function countContain(strPassword, strCheck) {
		// Declare variables
		var nCount = 0;
	
		for (i = 0; i < strPassword.length; i++) {
			if (strCheck.indexOf(strPassword.charAt(i)) > -1) {
				nCount++;
			}
		}
	
		return nCount;
	}

  </script>




<script type="text/javascript">

	var pass = "";


	$(document).ready(function(){
	
	$('#username').focus();	
	$('#username').blur(function(){
		 var apodo = $(this).val();
		    
		  if(apodo ==''){
		 
		    $('#msg_username').html('El Apodo es Requerido').css('color','red');
		    	
		    
		    	
		    }else{
		    		
		    	if (apodo.length < 6){
		    	
		    	 $('#msg_username').html('El Apodo Debe Contener Mínimo 6 Carácteres').css('color','red');
		    	}
		    	else{
		    		$('#msg_username').empty();
		    	}			
			   
		    }//fin del else
	   				 
		 });             		                              	        	  	 
		    						
		     
	});	  
		
	
	$(document).ready(function(){
	$('#email').blur(function(){		 
		 var correo = $(this).val();
		    
		  if(correo==''){
		    	
		    $('#msg_email').html('El Correo es Requerido').css('color','red');
		    	
		    }else{
		    				
			   $('#msg_email').empty();
		    }
	
		});	  
	});	
	
	
	
	
	$(document).ready(function(){
	$('#password').blur(function(){		 
		 var contrasena = $(this).val();
		    
		  if(contrasena==''){
		    	
		    $('#msg_password').html('La Contraseña es Requerida').css('color','red');
		    	
		    }else{
		    	
		    	if (contrasena.length < 8){
		    	
		    	 	$('#msg_password').html('La Contraseña Debe Contener Mínimo 8 Carácteres').css('color','red');
		    	}
		    	else{
		    		
		    		pass=contrasena;		
			   		$('#msg_password').empty();
		    
		    	}
		    }
	
		});	  
	});	
	
	
	
	
	$(document).ready(function(){
	$('#confirm_password').blur(function(){		 
		 var confirmacion = $(this).val();
		    
		  if(confirmacion==''){
		    	
		    $('#msg_confirm_password').html('La Contraseña de Confirmación es Requerida').css('color','red');
		    	
		    }else{
		    	
		    	if (confirmacion.length < 8){
		    	
		    	 	$('#msg_confirm_password').html('La Contraseña Debe Contener Mínimo 8 Carácteres').css('color','red');
		    	}
		    	else{
		    			
		    		if (pass === confirmacion){
		    				    				
			   			$('#msg_confirm_password').empty();
			   		
			   		}
		    		else{
		    			
		    			$('#msg_confirm_password').html('Las Contraseña no Coinciden').css('color','red');
		    			
		    	
		    		}
		    
		    	}
		    }
	
		});	  
	});	
	
	
	
	
	$(document).ready(function(){
	$('#name').blur(function(){		 
		 var nombre = $(this).val();
		    
		  if(nombre==''){
		    	
		    $('#msg_name').html('El Nombre es Requerido').css('color','red');
		    	
		    }else{
		    				
			   $('#msg_name').empty();
		    }
	
		});	  
	});	
	
	
	
	
	$(document).ready(function(){
	$('#last_name').blur(function(){		 
		 var apellido = $(this).val();
		    
		  if(apellido==''){
		    	
		    $('#msg_last_name').html('El Apellido es Requerido').css('color','red');
		    	
		    }else{
		    				
			   $('#msg_last_name').empty();
		    }
	
		});	  
	});	
	
	
	$(document).ready(function(){
	$('#captcha').blur(function(){		 
		 var robot = $(this).val();
		    
		  if(robot==''){
		    	
		    $('#msg_captcha').html('El Apellido es Requerido').css('color','red');
		    	
		    }else{
		    				
			   $('#msg_captcha').empty();
		    }
	
		});	  
	});	
	
	
</script>



<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'class' => 'form-control',
		'placeholder' => 'Apodo', 
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Correo', 
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Contraseña', 
	'onkeyup' => 'return checkPwdStrength();',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Confirmar Contraseña', 
);

$name = array(
	'name'	=> 'name',
	'id'	=> 'name',
	'value'	=> set_value('name'),
	'maxlength'	=> 50,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Nombres', 
);

$last_name = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'value'	=> set_value('last_name'),
	'maxlength'	=> 50,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Apellidos', 
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control',
	'placeholder' => 'Código confirmación',
);

$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>

<h2>Registrar</h2>

<div class="container">
<?php
/********************************************************************
 * form_open_multipar(); inicia un tag form y la accion que ocurra  *
 * dentro de este sera manejada por uri->uri_string()       @_@     *
 ********************************************************************/

 echo form_open($this->uri->uri_string(),$atributos); ?>

<h5><strong>los campos con <em style="color: red;">*</em> son obligatorios</strong></h5>


<table>
	<?php if ($use_username) { ?>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $username['id']); ?></td>
		<td><?php echo form_input($username); ?></td>
		
		</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_username' style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
		
	</tr>
	<?php } ?>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		
		</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_email' style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
		
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
				
	</tr>
	<tr>
		<td>&nbsp</td>
		<!-- -->
		<td id='msg_password' style="color: red;"><?php echo form_error($password['name']); ?>
		
			<div id="pmId">
				<div id="scorebarBorder">
					<div id="scorebar" style="background-position: 0px 0px;"></div>
				</div>
				<div id="complexity" style="color: black;">
							
				</div>
			</div>
		
		</td>
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $confirm_password['id']); ?></td>
		<td><?php echo form_password($confirm_password); ?></td>
		
	</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_confirm_password' style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
		
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $name['id']); ?></td>
		<td><?php echo form_input($name); ?></td>
		
	</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_name' style="color: red;"><?php echo form_error($name['name']); ?><?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?></td>
		
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $last_name['id']); ?></td>
		<td><?php echo form_input($last_name); ?></td>
		
		</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_last_name' style="color: red;"><?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?></td>
		
	</tr>
	
	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<h5>Ingrese las letras tal y como aparecen: </h5>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td style="color: red;" ><?php echo form_label('*', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
			
	</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_captcha' style="color: red;"><?php echo form_error($captcha['name']); ?></td>
		
	</tr>
	<?php }
	} ?>
</table>
<?php echo form_submit('register', 'Registrar',"class='btn btn-lg btn-success btn-block'"); ?>
<?php echo form_close(); ?>
