<?php
class Connection {
    private $tabela_usuarios = "users";
    private $tabela_contatos = "contatos";
    //public $nome_usuario;
    public function connection_db()
    {
      $con = new PDO("mysql:host=localhost;dbname=agenda", "root", "");
      return $con;
    }
    
    public function login()
    {        
        $obj = new Connection();
        $link = $obj->connection_db();
        $validar_login = $link->prepare("SELECT * FROM $this->tabela_usuarios WHERE email = :email and senha = :senha");
        $validar_login->bindValue(":email", $_POST['email']);
        $validar_login->bindValue(":senha", $_POST['senha']);
        $validar_login->execute();
        if($validar_login->rowCount()==1)
        {
            session_start();
            while($usuario = $validar_login->fetch(PDO::FETCH_ASSOC)){
                $_SESSION['id_user'] = $usuario['id'];
                $_SESSION['nivel_user'] = $usuario['nivel'];
            }           
            header('location:system_index.php');
            }else{
                header('location:index.php');
            }
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        header('location:index.php');
    }
    
    public function consulta_dados_usuario()
        {
        $obj = new Connection();
        $link = $obj->connection_db();
        $select_dados = $link->prepare("SELECT * FROM $this->tabela_usuarios WHERE id = :id");
        $select_dados->bindValue(":id", $_SESSION['id_user']);       
        $select_dados->execute();
        while($linha = $select_dados->fetch(PDO::FETCH_ASSOC))
            {
            $this->nome_usuario = utf8_encode($linha['nome']);
            $this->email_usuario = utf8_encode($linha['email']);
            $this->telefone_usuario = utf8_encode($linha['telefone']);
    
            }
        }
    }
