<?php

class Config{

    private $servidor = 'localhost';
    private $usuario = "root";
    private $senha = "";
    private $db = "agenda";
    
    public function logar(){

 //criar conexao
            $con = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->db);

            //ajustar o charset de comunicação entre a aplicação e o banco de dados
            mysqli_set_charset($con, 'utf8');

            //verificar se houve erro de conexão
            if(mysqli_connect_errno()){
                echo 'Erro ao tentar se conectar com BD MySQL: ' . mysqli_connect_error();
            }

            return $con;

    }
}
