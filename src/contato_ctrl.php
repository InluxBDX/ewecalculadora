<?php

    require_once('conecta.php');

    $conDB = conectaDB::criarConexao();

    $errors = array();

    $errors_json = array();

    if (isset($_POST['email_contato']) && isset($_POST['verifica_email'])) {


        $email_contato = mysqli_real_escape_string($conDB, $_POST['email_contato']);
                  
        if(empty($email_contato)){
            $errors['email'] ="Por favor preencha o campo de email!";    
            $errors['size'] = count($errors);    
        }
        $result = $conDB->query("SELECT * from contato where email='$email_contato'");  

        if($result->num_rows==0){
            $errors['usuario'] ="Você não possui um e-mail cadastrado!";    
            $errors['size'] = count($errors);    
        }

        $errors['size']=count($errors);
        
       if($errors['size']==0 && $result->num_rows==1){                
           
                    echo $errors['size'];
          
        }else{              
                echo json_encode($errors);
            }
         
                  
    }


    if (isset($_POST['salva_contato'])) {
        // receive all input values from the form
        
            $nome_contato = mysqli_real_escape_string($conDB, $_POST['nome_contato']);
            $email_contato = mysqli_real_escape_string($conDB, $_POST['email_contato']);
            $telefone_contato = mysqli_real_escape_string($conDB, $_POST['telefone_contato']);
                 
            if(empty($nome_contato)){
               // array_push($errors, "Por favor preencha o campo nome!");
               $errors['nome'] = "Por favor preencha o campo nome!";    
               $errors['size'] = count($errors);
            }                      
            if(empty($email_contato)){
                $errors['email'] ="Por favor preencha o campo de email!";    
                $errors['size'] = count($errors);    
            }
                      
            if(empty($telefone_contato)){
                $errors['telefone'] = "Por favor preencha o campo de telefone!";
                $errors['size'] = count($errors);               
            }
            
            $errors['size'] = count($errors)-1;

                
            //Verificar se usuário já possível cadastro            
            $result = $conDB->query("SELECT * from contato where email='$email_contato'");            

            if($result->num_rows==1){
                $errors['usuario'] = "Você já possui um cadastro no banco de dados!";
            }

           
        // register user if there are no errors in the form
            if($errors['size']==-1 && $result->num_rows==0){
                $query = "INSERT INTO contato (nome_contato , email, telefone, data_contato) 
                        VALUES('$nome_contato', '$email_contato', '$telefone_contato', now())";       
                if($conDB->query($query)){
                        echo $errors['size'];
                    //  header('location: ../index.php');
                    }else{
                        echo $conDB->error;
                    }            
            }else{              
                    echo json_encode($errors);
                }
             
    
        
    }
    
   














    ?>