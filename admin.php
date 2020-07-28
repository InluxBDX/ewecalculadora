<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Niconne' rel='stylesheet'>

<style>


</style>
</head>




<body>
    
  

<div id="flex-container-admin">
<div id="logo"> 
		<a href="index.php"><img src="images/logo.jpeg" alt=""></a>
		<div id="nome_empresa">
			<p>Ewé Terapias</p>
	</div>
    </div>
<form id="form-admin" action="" method="POST">
<h2 style="color:#052002d0">Login</h2>   
<div id="form_1" class="group">   

				<input name="usuario" type="text" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Usuario</label>
				<div style="display:flex">
					<span style="opacity:0" class="error_message" id="nome_error"></span>
				</div>
			</div>
				
				<div id="form_2" class="group">      
				<input id="senha" name="senha" type="text" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Senha</label>
				<span style="display:none" class="error_message" id="email_error"></span>
				</div>
    
				<div class="container_btn" style="margin-top: -15px;">
				<input class="btn" id="btn_enviar" onclick=alert("entrou") type="submit" value="Entrar">
				
				</div>

</div>
</form>


</body>
</html>