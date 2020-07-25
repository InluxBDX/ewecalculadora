<?php 

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calculadora Ewé Terapias Integrativas </title>
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Niconne' rel='stylesheet'>
	<script src="js/main.js"></script>
</head>
 


<body>

<div id="grid" class="grid-container">
	<div id="logo"> 
		<a href="index.php"><img src="images/logo.jpeg" alt=""></a>
		<div id="nome_empresa">
			<p>Ewé Terapias</p>
	</div>
</div>

<div id="texto">
<p id="msg2">Digite seus dados abaixo abaixo, para que possamos entrar em contato e lhe fornecer mais informações sobre nossos serviços.
	Se você já possui um email cadastrado basta <a href="" onclick="veriEmail()">clicar aqui</a> para digitar seu email.</p>
	<p> 

</div>
<div id="msg" class="modal-style">
		<div class="group">      
				<input id="num1" name="ml_value" type="number" value="" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  >
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Quantidade em ML</label>
				<span style="display:none" class="error_message" id="ml_error"></span>
				
		</div>				
		<div class="group">      
				<input id="num2" name="perc_value" value="" type="number" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Porcentagem de diluição</label>
				<span style="display:none" class="error_message" id="perc_error"></span>
					
		</div>
		<div class="container_btn" style="margin-top: -15px;">
				<input class="btn" id="btncalc" onclick="calculaGotas()" type="button" value="Calcular">
		</div>
		


</div>
<div id="water-drop" class="drop" style="display:none; grid-area: form;padding-top: 20px;">
 
		</div>
<div class="grid-form">
	<form id="contato-form" class="grid-form" action="src/contato_ctrl.php" name="contato_form" method="POST">
			<div id="form_1" class="group">      
				<input name="nome_contato" type="text" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Nome</label>
				<div style="display:flex">
					<span style="opacity:0" class="error_message" id="nome_error"></span>
				</div>
			</div>
				
				<div id="form_2" class="group">      
				<input id="email" name="email_contato" type="text" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Email</label>
				<span style="display:none" class="error_message" id="email_error"></span>
				</div>

					
				<div id="form_3"class="group">      
				<input name="telefone_contato" type="text" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Telefone</label>
				<span style="display:none"   class="error_message" id="telefone_error"></span>
				</div>

				<div class="container_btn" style="margin-top: -15px;">
				<input class="btn" id="btn_enviar" onclick="inserirContato()" type="submit" value="Enviar">
				<input class="btn" id="btn_verifica" onclick="consultaEmail()" style="display: none" type="submit" name="verifica_email" value="Consultar">
				</div>
				<input type="hidden" name="salva_contato">
		</form>
</div>
</div>
	
</body>
</html>



