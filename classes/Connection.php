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
            header('location:menu.php');
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
        
        public function listar_contatos()
        {
            $obj = new Connection();
            $link = $obj->connection_db();
            $select_contatos = $link->prepare("SELECT * FROM $this->tabela_contatos where nome_contato LIKE :nome_contato ORDER BY nome_contato ");
            $select_contatos->bindValue(":nome_contato", $_POST['nome_contato']."%");       
            $select_contatos->execute();
            while($linha = $select_contatos->fetch(PDO::FETCH_ASSOC))
            {
            $this->id_contato = utf8_encode($linha['id_contato']);
            $this->nome_contato = utf8_encode($linha['nome_contato']);
            $this->email_contato = utf8_encode($linha['email_contato']);
            $this->telefone_contato = utf8_encode($linha['telefone_contato']);
            
            ?>
            
            <tr>
                 <td hidden><?php echo $linha['id_contato'];  ?></td>
                 <td><?php echo $linha['nome_contato'];  ?></td>
                 <td><?php echo $linha['email_contato'];  ?></td>
                 <td><?php echo $linha['telefone_contato'];  ?></td>
                 <td><a href="edit_contatos.php?editar=<?php echo $linha['id_contato']; ?>"><h5 style="font-size: 15px; "><strong>Editar</strong></h5></a></td>
                 <td><a href="delete_produtos.php?id_produto=<?php echo $id_produtos; ?>"><h5 style="font-size: 15px; "><strong>Excluir</strong></h5></a></td>               
            </tr>

            <?php                        
            
            }           
        }
        
        public function insert_contatos(){
            
            $obj = new Connection();
            $link = $obj->connection_db();
            $insert_contatos = $link->prepare("INSERT INTO $this->tabela_contatos (nome_contato, email_contato, telefone_contato) VALUES ( :nome, :email, :telefone )");
            $insert_contatos->bindValue(":nome", $_POST['nome_contato']);
            $insert_contatos->bindValue(":email", $_POST['email_contato']);
            $insert_contatos->bindValue(":telefone", $_POST['telefone_contato']);
            $insert_contatos->execute();
            
            
        }
        
        public function select_contato(){
            $obj = new Connection();
            $link = $obj->connection_db();
            $select_contatos = $link->prepare("SELECT * FROM $this->tabela_contatos where id_contato = :id_contato ");
            $select_contatos->bindValue(":id_contato", $_GET['editar']);       
            $select_contatos->execute();
            while($linha = $select_contatos->fetch(PDO::FETCH_ASSOC))
            {
            $this->id_contato = utf8_encode($linha['id_contato']);
            $this->nome_contato = utf8_encode($linha['nome_contato']);
            $this->email_contato = utf8_encode($linha['email_contato']);
            $this->telefone_contato = utf8_encode($linha['telefone_contato']);
            }
        }
        
        public function update_contatos(){
            
            $obj = new Connection();
            $link = $obj->connection_db();
           $id_contato = $_POST['id_contato'];
           $nome_contato = $_POST['nome_contato'];
           $email_contato = $_POST['email_contato'];
           $telefone_contato = $_POST['telefone_contato'];
            $update_contatos = $link->prepare("UPDATE $this->tabela_contatos SET id_contato = :id_contato , nome_contato = :nome_contato , email_contato = :email_contato , telefone_contato = :telefone_contato   WHERE  id_contato = :id_contato");
            $update_contatos->bindValue(":id_contato", $id_contato); 
            $update_contatos->bindValue(":nome_contato", $nome_contato); 
            $update_contatos->bindValue(":email_contato", $email_contato); 
            $update_contatos->bindValue(":telefone_contato", $telefone_contato); 
            $update_contatos->execute();
        }
        
    }
