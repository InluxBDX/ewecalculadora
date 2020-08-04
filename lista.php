<?php include('src/admin_ctrl.php') ?>
<?php 



if (!isset($_SESSION['usuario'])) {
    $_SESSION['msg'] = "You must log in first";
    header("location: ../ewecalculadora/admin.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['usuario']);
    
    unset($_SESSION['id_user']);
    header("location: ../ewecalculadora/admin.php");
}

?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ewé Terapias Integrativas - Painel de Controle</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Niconne' rel='stylesheet'>
	<script src="js/main.js"></script>
</head>

<table>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Data de Cadastro</th>
    <tr>



</table>


<body>
    
</body>
</html>