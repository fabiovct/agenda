<?php
//$page = $_GET['page'];
//include "$page.php";
include 'header.html';
//Rotas::get_pagina();
?>
<body>
    <div class="container  mt-4 col-4">    
        <form action='valida_usuario.php' method="POST">
          <div class="form-group">
              <h3>Login</h3>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="form-group">
            <h3>Senha</h3>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
          </div>
            <button type="submit" class="btn btn-primary">Logar</button>
        </form>
    </div>
</body>

<?php

include 'footer.html';
?>
