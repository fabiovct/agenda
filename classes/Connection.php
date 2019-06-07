<?php
class Connection {
    public function connection_db()
    {
      $con = new PDO("mysql:host=localhost;dbname=agenda", "root", "");
      return $con;
    }
    
    public function login()
    {
        $obj = new Connection();
        $link = $obj->connection_db();
        $validar_login = $link->prepare("SELECT * FROM contatos WHERE email = :email and senha = :senha");

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
}
