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
        </div>
    </div>  
    <?php
    

}else{
    header('location:index.php');
}
include 'footer.html';
