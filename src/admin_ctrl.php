<?php

require_once('conecta.php');

session_start(); 
    $conDB = conectaDB::criarConexao();
   
    $usuario = "";
	$senha = "";
	$errors = array();
	$_SESSION['success'] = "";
	
	$_SESSION['logged_in'] = false;
    $row = ""; 
    
	if (isset($_POST['login'])) {
		$usuario = mysqli_real_escape_string($conDB, $_POST['usuario']);
		$senha = mysqli_real_escape_string($conDB, $_POST['senha']);
	
	        
		if(empty($usuario)){
			// array_push($errors, "Por favor preencha o campo nome!");
			$errors['nome_usuario'] = "Por favor preencha o campo usuário!";    
			$errors['size'] = count($errors);
		 }                      
		 if(empty($senha)){
			 $errors['senha'] ="Por favor preencha o campo senha!";    
			 $errors['size'] = count($errors);    
		 }
				   
		  
		 $errors['size'] = count($errors)-1;

		if ($errors['size'] == -1) {
			//$senha = md5($senha);
			$query = "SELECT id FROM usuario WHERE nome_usuario='$usuario' AND senha='$senha'";			
			$results = $conDB->query($query);	
			$row = $results->fetch_array();
			if ($results->num_rows == 1) {
				$_SESSION['usuario'] = $usuario;
				$_SESSION['id_user'] = $row['id'];	
				$_SESSION['logged_in'] = true;
				$_SESSION['success'] = "You are now logged in";
		 			header('location: /ewecalculadora/lista.php');
					$conDB->close();
				}else {
					$errors['usuario'] ="Senha ou usuário estão incorretos";    
					echo json_encode($errors);
				}
				}else{
					echo json_encode($errors);
				}
		}
 
    
?>
