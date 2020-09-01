<?php

require_once('conecta.php');

    session_start(); 
    $conDB = conectaDB::getConexao();
   
   
    $row = ""; 
    $row_json = [];
    /*
	if (isset($_GET)) {
	 
			 
        $query = "SELECT * FROM contato";			
        $results = $conDB->query($query);	
        while($row = $results->fetch_array()){
            array_push($row_json, $row);
            }
            echo json_encode($row_json);
         
    }*/

    $from = 'Darth Vader <talles.silva@gmail.com>';
    $to = 'Emperor <talles.silva@protonmail.com>';
    $subject = 'Force';
    $message = 'There is a great disturbance in the Force.';
    $headers = 'From: ' . $from;
     
    if (!mail($to, $subject, $message, $headers))
    {
        echo "Error.";
    }
    else
    {
        echo "Message sent.";
    }
    
   
?>