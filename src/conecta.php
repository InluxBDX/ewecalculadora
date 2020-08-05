<?php


function is_localhost() {		
    // set the array for testing the local environment
    $whitelist = array( '127.0.0.1', '::1' );
    
    // check if the server is in the array
    if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
        
        // this is a local environment
        return true;
        
    }
    
}



class conectaDB{
    
    static private $conexao;
    
   
    static public function criarConexao(){
        $server = "localhost";
        $usuario ="root";
        $senha = "admin";
        $db = "eweterapias";       
        
        if(!is_localhost()){
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $server = $url["host"];
            $usuario = $url["user"];
            $senha = $url["pass"];
            $db = substr($url["path"], 1);
        }
        try{
            self:self::$conexao = mysqli_connect($server, $usuario, $senha, $db);
         
            return self::$conexao;

        }catch(Exception $e){
            die("Não foi possível estabelecer conexão com banco de dados");
        }

    }   

    static public function getConexao(){
        global $con;
        if(self::$conexao){
            $con=self::$conexao;
            return $con;
        }
        else{
            $con=self::criarConexao();
            return $con;	
        }
    }
}

       ?>
