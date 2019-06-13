<?php
include 'header.html';
require_once('classes/Connection.php');
session_start();
if(isset($_SESSION['id_user'])){
 ?>
<body>
    <div class="container  mt-4 col-md-4">    
        <form action='create_contato.php' method="POST">
          <div class="form-group">
              <h3>Nome</h3>
            <input type="text" class="form-control" id="nome_contato" name="nome_contato" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <h3>Email</h3>
            <input type="text" class="form-control" id="email_contato" name="email_contato" required>
          </div>
            <div class="form-group">
              <h3>Telefone</h3>
            <input type="text" class="form-control" id="telefone_contato" name="telefone_contato" required>
          </div>         
            <button type="submit" class="btn btn-primary mt-2">Inserir Novo Contato</button>
            <a href="system_index.php" class="btn btn-primary mt-2">Voltar</a>
            <a href="logout.php" class="btn btn-primary mt-2">Logout</a>
        </form>
    </div>
</body>

<?php
if(isset($_POST['nome_contato'])){
    $obj = new Connection();
    $insert_contatos = $obj->insert_contatos();
    header('location:system_index.php');
}
        
    
}else{
    header('location:index.php');
}
include 'footer.html';

