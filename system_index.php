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
    if($_SESSION['nivel_user'] == 1){
        $nivel_acesso = "Administrador";
    }else{
        $nivel_acesso = "Usuário";
    }
    
?>

<div class="container mt-4">
    <div class="card-deck">
        <div class="card col-4" >
           <!--  <img src="..." class="card-img-top" alt="...">-->
             <div class="card-body">
                   <h4 class="card-title"><?php echo $nome_usuario; ?><hr></h4>
                   <p class="card-text"><?php echo "<strong>Nível de acesso: </strong>". $nivel_acesso; ?></p>
                   <p class="card-text"><?php echo "<strong>Telefone: </strong>".$telefone_usuario; ?></p>
                   <p class="card-text"><?php echo "<strong>Email: </strong>". $email_usuario; ?></p>
                   <p class="card-text"><?php echo "<strong>Telefone: </strong>".$telefone_usuario; ?></p>
<!--                   <a href="edit_user.php" class="btn btn-primary">Editar Dados</a>-->
                   <a href="logout.php" class="btn btn-primary">Logout</a>
             </div>
         </div>       
         <div class="card col-8" >
        <!--  <img src="..." class="card-img-top" alt="...">-->
          <div class="card-body">
              <form action='system_index.php' method="POST">
              <h4 class="card-title">Buscar Contatos<hr></h4>
                <p class="card-text"><h5>Digite o Nome do Contato:</h5>
                <input  class="form-control" id="nome_contato" name="nome_contato"  placeholder="Nome">
                </p>
                <p class="card-text"></p>
                <p class="card-text"></p>
               <button type="submit" class="btn btn-primary">Buscar</button>
              </form>
          </div>
        </div>  
    </div>  
</div>
    <?php

        if($_SESSION['nivel_user'] == 1){
    ?>
<div class="container mt-4">
    <div class="col-8">
        
<a href="create_contato.php" class="btn btn-primary">Cadastrar Novo Contato</a>
    </div>
</div>
<?php
        }
if(isset($_POST['nome_contato'])){
//       $nome_contato = ($_POST['nome_contato']);
        
        
        
?>

 <div class="container mt-4">               
            <table id="example" class="table table-striped table-bordered" style="width:100%">

            <tr>
                <th hidden>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
<!--                <th>Informações</th>
                <th>Exclusão</th>-->

             </tr>
            <?php
            $listar_contatos = $obj->listar_contatos();
            ?>
             
            </table>
 </div>

<?php
//            echo "Foram encontrados ". $total . " registros.";                  
    
}
}else{
    header('location:index.php');
}
include 'footer.html';
