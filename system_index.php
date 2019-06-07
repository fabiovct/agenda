<?php
include 'header.html';
session_start();
if(isset($_SESSION['id_user'])){
?>
<a href="logout.php" class="btn btn-primary">Logout</a>

<?php
if($_SESSION['nivel_user'] == 1 ){
?>
<a href="logout.php" class="btn btn-primary">Teste</a>

<?php
}
}else{
    header('location:index.php');
}
include 'footer.html';
?>