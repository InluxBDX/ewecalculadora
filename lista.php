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
    
<script>

 window.addEventListener("DOMContentLoaded", (event) =>{
     
        event.preventDefault();  
       
        //Retirar após debug
        
        var y = new XMLHttpRequest();        

        
        y.onreadystatechange = function(event){    
                var j = [];
            if (this.readyState == 4 && this.status == 200) {
                j =  JSON.parse(this.responseText);
                console.log(j);
         
                //document.body.innerHTML = this.responseText;
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

<div id="grid-container">

<div style="width: 200px; grid-area: campos">

<button>Exportar para Excel</button>

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


<body>
    
</body>
</html>