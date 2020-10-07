<?php include('src/admin_ctrl.php') ?>
<?php 
if (!isset($_SESSION['usuario'])) {
    $_SESSION['msg'] = "You must log in first";
    header("location: ../admin.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['usuario']);
    
    unset($_SESSION['id_user']);
	header("location: admin.php");
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

'use strict'

 window.addEventListener("DOMContentLoaded", (event) =>{     
        event.preventDefault();     
        const y = new XMLHttpRequest();        
        y.onreadystatechange = function(event){    
            let j = [];
            if (this.readyState == 4 && this.status == 200) {
                j =  JSON.parse(this.responseText);                       
            for(let i=0;i<j.length;i++){
                    const row = document.createElement("tr");
                    const row_cell_nome = document.createElement("td");
                    const row_cell_email = document.createElement("td");
                    const row_cell_telefone = document.createElement("td");
                    const row_cell_cadastro = document.createElement("td");
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
            let sp = n("span");
            document.getElementById("lista-container").append(sp);

            let b = n("div");
            document.getElementById("lista-container").append(b);
            b.append(sp);
                      
            sp.innerHTML = j.length;
            
        } 


            
    }
    
    y.open("GET", "src/lista_ctrl.php", true);       
        y.send();

 });
</script>

</head>
<body>

<div id="lista-container">

    <div style="width:200px; height:500px; display: flex; flex-direction:column">

    <div class="exp_container">
        <div>
            <img style="width:50px"src="images/export.svg">
        </div>
            <form method="post" action="src/export.php">
                <div class="container_btn">
           
                    <input id="btn_excel" class="btn" type="submit" name="excel" value="Exportar para Excel">           
                </div>
            </form>
    
        </div>
        <div class="exp_container">
            <form method="post" action="src/export.php">
                <div class="container_btn">
                    <input id="btn_excel" class="btn" type="submit" name="excel" value="Enviar email">           
                </div>
            </form>
    
        </div>
        <div class="exp_container">
        <div id="logout_container" class="container_btn" style="grid-area: logout;margin-bottom: 40px">

            <a href="lista.php?logout='1'"id="logout" style="display:block;width:300px" type="button" class="btn" href="">Sair</a>        </div>

    </div>
</div>
   
</div>
<!-- <table id="lista">
    <tbody id="body_list">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Cadastro</th>
        <tr>
      
</tbody>
</table> -->
</div>   
</body>

</html>