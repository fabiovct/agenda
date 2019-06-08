<?php
include 'header.html';
require_once('classes/Connection.php');
session_start();
if(isset($_SESSION['id_user'])){
$obj = new Connection();
$link = $obj->consulta_dados_usuario();
    $nome_usuario = $obj->nome_usuario;
    $email_usuario = $obj->email_usuario;
    $telefone_usuario = $obj->telefone_usuario;
?>

<div class="container mt-4">
    <div class="card-deck">
        <div class="card col-4" >
           <!--  <img src="..." class="card-img-top" alt="...">-->
             <div class="card-body">
                   <h4 class="card-title"><?php echo $nome_usuario; ?><hr></h4>
                   <p class="card-text"><?php echo "<strong>Email: </strong>". $email_usuario; ?></p>
                   <p class="card-text"><?php echo "<strong>Telefone: </strong>".$telefone_usuario; ?></p>
                   <a href="edit_user.php" class="btn btn-primary">Editar Dados</a>
                   <a href="logout.php" class="btn btn-primary">Logout</a>
             </div>
         </div>       
         <div class="card col-8" >
        <!--  <img src="..." class="card-img-top" alt="...">-->
          <div class="card-body">
              <form action='sistema_interno.php' method="POST">
              <h4 class="card-title">Buscar Contatos<hr></h4>
                <p class="card-text"><h5>Digite o Nome do Contato:</h5>
                <input  class="form-control" id="codigo_produto" name="codigo_produto"  placeholder="Nome">
                </p>
                <p class="card-text"></p>
                <p class="card-text"></p>
               <button type="submit" class="btn btn-primary">Buscar</button>
              </form>
          </div>
        </div>  
    </div>  
</div>    
<div class="container mt-4">
    <div class="col-8">
<!--<a href="create_produto.php" class="btn btn-primary">Cadastrar Novo Produto</a>-->
    </div>
</div>

<?php
}else{
    header('location:index.php');
}
include 'footer.html';