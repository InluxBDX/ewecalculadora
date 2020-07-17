<?php

class conectaDB{

        static private $conexao;
    
    
    static public function criarConexao(){

        try{
            self:self::$conexao = mysqli_connect("localhost", "root", "admin","eweterapias");
         
            return self::$conexao;

        }catch(Exception $e){
            die("Não foi possível estabelecer conexão com banco de dados");
        }

    }

    static public function getConexao()
    {
        global $con;
        if(self::$conexao)
        {
            $con=self::$conexao;
            return $con;
        }
        else
        {
            $con=self::criarConexao();
            return $con;	
        }
    }
}

       ?>
