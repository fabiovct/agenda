<?php
include 'header.html';
//include 'Conection.php';
//require_once('Config.class.php');
//$logar = new Config();
//$logar->logar();

session_start();
if(isset($_SESSION['login'])){
    
    include 'dados_usuarios.php';
    

    if(isset($_POST['codigo_produto'])){
        $codigo_produto = ($_POST['codigo_produto']);
        $query_buscar_produtos = "SELECT * FROM produto WHERE codigo = '$codigo_produto'";
        $consulta_buscar_produtos = mysqli_query($conexao, $query_buscar_produtos);
?>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} ); 
</script>
        <div class="container mt-4">               
            <table id="example" class="table table-striped table-bordered" style="width:100%">

           <tr>
               <th hidden>Id</th>
                <th>Codigo</th>
                <th>Linha</th>
                <th>Descrição</th>
                <th>Informações</th>
                <th>Exclusão</th>
               
            </tr>
              
        <?php
        while($produto = mysqli_fetch_array($consulta_buscar_produtos)){
            
            $id_produtos = utf8_encode($produto['id_produto']);
            $codigo_produtos = utf8_encode($produto['codigo']);
            $linha_produto = utf8_encode($produto['Linha']);
            $descricao_produto = utf8_encode($produto['Descricao']);
//            $qt_estoque_produto = utf8_encode($produto['Qt. Estoque']);
//            $cod_fabricante_produto = utf8_encode($produto['cod_fabricante']);
//            $obs_produto = utf8_encode($produto['obs']);
//            $preco_venda_produto = utf8_encode($produto['preco_venda']);
//            $preco_liq_produto = utf8_encode($produto['preco_liq']);
//            $total_produto = utf8_encode($produto['total']);
            
                ?>


            <tr>
                <td hidden><?php echo $id_produtos;  ?></td>
                <td><?php echo $codigo_produtos;  ?></td>
                <td><?php echo $linha_produto;  ?></td>
                <td><?php echo $descricao_produto;  ?></td>
                <td><a href="info_produtos.php?editar=<?php echo $id_produtos; ?>"><h5 style="font-size: 15px; "><strong>Mais Informações</strong></h5></a></td>
                <td><a href="delete_produtos.php?id_produto=<?php echo $id_produtos; ?>"><h5 style="font-size: 15px; "><strong>Excluir</strong></h5></a></td>
            </tr>        
                <?php

    }}}else{
        header('location:index.php');
    }
?>
        </table>
            </div>     

<?php
include 'footer.html';
?>



