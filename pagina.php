<?php
session_start();
echo 'logado com sucesso<br>';
echo $_SESSION['email']."<br>";


?>
<a href="logout.php" class="btn btn-primary">Logout</a>

