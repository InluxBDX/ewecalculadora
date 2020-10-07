<!DOCTYPE html>
<html lang="pt">
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
<p id="msg2">Digite seus dados abaixo, para que possamos entrar em contato e lhe fornecer mais informações sobre nossos serviços.
	Se você já possui um email cadastrado basta <a href="" onclick="veriEmail()">clicar aqui</a> para digitar seu email.</p>
<p> 

</div>


<div class="grid-form" rota="m0" style="display:flex; flex-direction: column;">

<div id="water-drop" class="drop" style="display:none; grid-area: form;padding: 20px;margin:7px;">
 
		</div>

	<form id="contato-form" class="grid-form" name="contato_form" method="POST">
			<div id="form_1" class="group">      
				<input name="nome_contato" type="text" oninput="this.value = this.value.replace(/\b[^ A-Z.]/, '')"required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Nome</label>				
				<span style="opacity:0" class="error_message" id="nome_error"></span>
			</div>				
			<div id="form_2" class="group">      
				<input id="email" name="email_contato" type="text" required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Email</label>
					<span style="display:none" class="error_message" id="email_error"></span>
			</div>					
			<div id="form_3"class="group">      
				<input name="telefone_contato" type="text"  oninput="this.value = this.value.replace(/[^-0-9.]/g, '')" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Telefone</label>
				<span style="display:none"   class="error_message" id="telefone_error"></span>
			</div>
			
				<input type="hidden" name="salva_contato">
		</form>
		<div id="msg" class="calc-style">
	<div class="container_btn" style="margin-top: 0px;
text-align: center;
font-weight: bolder;margin-bottom: 20px;">
 
		<span>1ml=25 gotas</span>
 
		</div>
		<div class="group">      
				<input id="num1" name="ml_value" type="number" value="" required oninput="this.value = this.value.replace(/[^0-9.]/g, '')"  >
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
			
		</div>
</div>

<div class="container_btn" id="buttons" rota=0 style="display:flex; flex-direction: column; grid-area: social;
align-items: center; ">
	<input class="btn" id="btncalc" style="display: none" onclick="calculaGotas()" type="button" value="Calcular">
<input class="btn" id="btn_enviar" onclick="inserirContato(event)" type="submit" value="Enviar">
<input class="btn" id="btn_verifica" onclick="consultaEmail(event)" style="display: none" type="submit" name="verifica_email" value="Consultar">
<div id="social">
<a href="https://www.instagram.com/eweterapiasintegrativas/" target="_blank"><svg class="logo_social"  width="60.734px" height="60.733px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g><g><path d="M352,0H160C71.648,0,0,71.648,0,160v192c0,88.352,71.648,160,160,160h192c88.352,0,160-71.648,160-160V160
C512,71.648,440.352,0,352,0z M464,352c0,61.76-50.24,112-112,112H160c-61.76,0-112-50.24-112-112V160C48,98.24,98.24,48,160,48
h192c61.76,0,112,50.24,112,112V352z"/></g></g><g><g>
<path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M256,336
c-44.096,0-80-35.904-80-80c0-44.128,35.904-80,80-80s80,35.872,80,80C336,300.096,300.096,336,256,336z"/>
</g></g><g>	<g><circle cx="393.6" cy="118.4" r="17.056"/>
</g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
<g>
</g>
</svg>
</a>
<a href="https://www.facebook.com/eweterapiasintegrativas/" target="_blank"><svg class="logo_social"version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
width="60.734px" height="60.733px" viewBox="0 0 60.734 60.733" style="enable-background:new 0 0 60.734 60.733;"
xml:space="preserve">
<g><path d="M57.378,0.001H3.352C1.502,0.001,0,1.5,0,3.353v54.026c0,1.853,1.502,3.354,3.352,3.354h29.086V37.214h-7.914v-9.167h7.914
v-6.76c0-7.843,4.789-12.116,11.787-12.116c3.355,0,6.232,0.251,7.071,0.36v8.198l-4.854,0.002c-3.805,0-4.539,1.809-4.539,4.462
v5.851h9.078l-1.187,9.166h-7.892v23.52h15.475c1.852,0,3.355-1.503,3.355-3.351V3.351C60.731,1.5,59.23,0.001,57.378,0.001z"/>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
</a>

<a href="https://t.me/ewe_terapias" target="_blank"><svg class="logo_social" viewBox="1 -35 511.99993 511" width="60.734px" height="60.733px">
<path d="m121.453125 253.171875 63.554687 158.886719 82.75-82.753906 141.535157 112.503906 102.707031-441.308594-512 205.480469zm-39.933594-47.640625 244.046875-97.945312-194.074218 117.363281zm287.535157-89.25-161.980469 148.1875-19.484375 73.425781-36.035156-90.085937zm-149.851563 219.230469 9.816406-36.996094 15.144531 12.035156zm171.65625 53.394531-147.386719-117.152344 221.902344-203.007812zm0 0"/>
</svg>
</a>	

<a href="https://t.me/ewe_terapias" target="_blank"><svg version="1.1" class="logo_social" width="60.734px" height="60.733px" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
<g>
<path d="M440.164,71.836C393.84,25.511,332.249,0,266.737,0S139.633,25.511,93.308,71.836S21.473,179.751,21.473,245.263
c0,41.499,10.505,82.279,30.445,118.402L0,512l148.333-51.917c36.124,19.938,76.904,30.444,118.403,30.444
c65.512,0,127.104-25.512,173.427-71.836C486.488,372.367,512,310.776,512,245.263S486.488,118.16,440.164,71.836z
M387.985,336.375L359.67,364.69c-23.456,23.456-90.011-5.066-148.652-63.708c-58.642-58.642-87.165-125.195-63.708-148.652
l28.314-28.314c5.864-5.864,15.372-5.864,21.236,0l35.393,35.393c5.864,5.864,5.864,15.372,0,21.236l-21.236,21.236
c20.599,43.487,55.615,78.502,99.102,99.101l21.236-21.236c5.864-5.864,15.372-5.864,21.236,0l35.393,35.393
C393.849,321.004,393.849,330.511,387.985,336.375z"/>
</g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g>
</g><g></g></svg>

</a>	


</div>
</div>
			
</div>
	
</body>

</html>



