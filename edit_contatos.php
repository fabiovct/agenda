<?php
include 'header.html';
require_once('classes/Connection.php');
session_start();
if(isset($_POST['id_contato'])){
    $obj = new Connection();
    $link = $obj->update_contatos();
    header('location:system_index.php');   
}else{
if(isset($_SESSION['id_user'])){
    $obj = new Connection();
$link = $obj->select_contato();
$id_contato = $obj->id_contato;
$nome_contato = $obj->nome_contato;
$email_contato = $obj->email_contato;
$telefone_contato = $obj->telefone_contato;

    ?>
    <div class="container">

        <h1>Editar produtos</h1>
        <form method="post" action="edit_contatos.php">                                
            <div class="row">
                <div class="col-12">
                <input type="hidden" name="id_contato" value="<?php echo $id_contato; ?>">
                </div>
                <br>
                <div class="col-md-4">
                <label class="">Nome</label><br>
                <input class="form-control" type="text" name="nome_contato" placeholder="" value="<?php echo $nome_contato; ?>">
                </div>
                <br><br>
                <div class="col-md-4">
                <label class="">Email</label><br>
                <input class="form-control" type="text" name="email_contato" placeholder=""  value="<?php echo $email_contato; ?>">
                </div>
                <br><br>
                <div class="col-md-4">
                <label class="">Telefone</label><br>
                <input class="form-control" type="text" name="telefone_contato" value="<?php echo $telefone_contato; ?>" >
                </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary">editar</button>
                <a href="system_index.php" class="btn btn-primary">Voltar</a>
                <a href="logout.php" class="btn btn-primary">Logout</a>        
    </div>       
    <?php

}else{
    header('location:index.php');
}
include 'footer.html';
}