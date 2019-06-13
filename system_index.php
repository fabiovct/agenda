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
        <?php
        include 'card_users_info.php';
        ?>
         <div class="card col-md-8" >
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
    <div class="col-md-8">      
        <a href="create_contato.php" class="btn btn-primary">Cadastrar Novo Contato</a>
    </div>
</div>
<?php
        }
if(isset($_POST['nome_contato'])){
//       $nome_contato = ($_POST['nome_contato']);              
?>

 <div class="container mt-4">    
     <div class="table-responsive-md">
            <table class="table table-striped table-bordered">
<thead>
            <tr>
                <th hidden>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Editar</th>
                <th>Excluir</th>
             </tr>
</thead>
<tbody>
            <?php
            $listar_contatos = $obj->listar_contatos();
            ?>
</tbody>
            </table>
 </div>
     </div>

<?php

//            echo "Foram encontrados ". $total . " registros.";                  
    
}
}else{
    header('location:index.php');
}
include 'footer.html';
