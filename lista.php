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


<style>




@media (max-width: 400px) {

    #lista-container{
        display: flex;
         
        align-items:center;
        flex-flow: column wrap;
    }

#logout{
     

}
#btn_excel:after{
    content: "Exportar";

}

#logout_container{
    justify-self: center;
}

#exp_container{
    width: 300px;
}
}


</style>
    
<script>

 window.addEventListener("DOMContentLoaded", (event) =>{     
        event.preventDefault();     
        var y = new XMLHttpRequest();        
        y.onreadystatechange = function(event){    
                var j = [];
            if (this.readyState == 4 && this.status == 200) {
                j =  JSON.parse(this.responseText);                       
            for(i=0;i<j.length;i++){
                    var row = document.createElement("tr");
                    var row_cell_nome = document.createElement("td");
                    var row_cell_email = document.createElement("td");
                    var row_cell_telefone = document.createElement("td");
                    var row_cell_cadastro = document.createElement("td");
                    row.setAttribute("id", "r"+i);                
                    document.getElementById("body_list").appendChild(row);
                    row.appendChild(row_cell_nome);
                    row.appendChild(row_cell_email);
                    row.appendChild(row_cell_telefone);
                    row.appendChild(row_cell_cadastro);
                    row_cell_nome.textContent = j[i].nome_contato;
                    row_cell_email.textContent = j[i].email;
                    row_cell_telefone.textContent = j[i].telefone;
                    row_cell_cadastro.textContent = j[i].data_contato
            }
        } 
    }

    y.open("GET", "src/lista_ctrl.php", true);       
        y.send();

 });
</script>

</head>
<body>

<div id="lista-container">
 
    <div id="logout_container" class="container_btn" style="grid-area: logout;margin-bottom: 40px">

        <input id="logout" style="width:100px" type="button" class="btn" href="" value="Sair">

    </div>
  <div id="exp_container">
        <form method="post" action="src/export.php">
        <div class="container_btn">
            <input id="btn_excel" class="btn" type="submit" name="excel" value="Exportar para Excel">           
        </div>
        </form>
</div>
 
<table id="lista">
    <tbody id="body_list">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Cadastro</th>
        <tr>
      
</tbody>
</table>
</div>   
</body>

</html>