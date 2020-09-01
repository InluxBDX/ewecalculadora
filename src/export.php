
<?php

require_once('conecta.php');

    session_start(); 
    $conDB = conectaDB::getConexao();
   
   
    $row = ""; 
    $row_data = [];
    
	if (isset($_POST["excel"])) {
 
       $query = "SELECT nome_contato as 'Nome Contato', email as 'Email', telefone as 'Telefone', 
       DATE_FORMAT(data_contato, '%d/%m/%Y') as 'Data Contato' FROM contato order by 'Data Contato' asc";			
       $results = $conDB->query($query);	
        while($row = $results->fetch_assoc()){
           array_push($row_data, $row);
         }
            
        
         $fileName = "contatos_".date('dmY') . ".xls";
         header("Content-Type: application/vnd.ms-excel");
         header("Content-Disposition: attachment; filename=\"$fileName\""); 
        $flag=false;

        if(!empty($row_data)){
            foreach($row_data as $data){
               
                if(!$flag){
                    echo implode("\t", array_keys($data)) . "\n";
                    $flag = true;
                }
                echo implode("\t", array_values($data)) . "\n";
            }


         }
        
    }

 

 

?>