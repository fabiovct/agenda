<div class="card col-md-4" >
           <!--  <img src="..." class="card-img-top" alt="...">-->
             <div class="card-body">
                   <h4 class="card-title"><?php echo $nome_usuario; ?><hr></h4>
                   <p class="card-text"><?php echo "<strong>Nível de acesso: </strong>". $nivel_acesso; ?></p>
                   <p class="card-text"><?php echo "<strong>Telefone: </strong>".$telefone_usuario; ?></p>
                   <p class="card-text"><?php echo "<strong>Email: </strong>". $email_usuario; ?></p>
                   <p class="card-text"><?php echo "<strong>Telefone: </strong>".$telefone_usuario; ?></p>
<!--                   <a href="edit_user.php" class="btn btn-primary">Editar Dados</a>-->
                   <a href="logout.php" class="btn btn-primary mt-2">Logout</a>
                   <a href="system_index.php" class="btn btn-primary mt-2">Agenda</a>
                   <a href="produtos.php" class="btn btn-primary mt-2">Produtos</a>
<!--                   <a href="menu.php" class="btn btn-primary mt-2">Menu Principal</a>-->
             </div>
         </div>  

