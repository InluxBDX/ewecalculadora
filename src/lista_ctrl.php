<?php

require_once('conecta.php');

    session_start(); 
    $conDB = conectaDB::getConexao();
    
    $row = ""; 
    $row_json = [];
    
	if (isset($_GET)) {		 
        $query = "SELECT nome_contato, email, telefone,
        DATE_FORMAT(data_contato, '%d/%m/%Y') as 'data_contato' FROM contato order by 'data_contato' asc";			
        $results = $conDB->query($query);	
        while($row = $results->fetch_array()){
            array_push($row_json, $row);
            }
            echo json_encode($row_json);
         
    }
   
?>