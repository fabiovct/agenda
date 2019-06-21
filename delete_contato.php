<?php
require_once('classes/Connection.php');
session_start();
if(isset($_SESSION['id_user'])){
    
$obj = new Connection();
$link = $obj->delete_contato();


header('location:system_index.php');    
}else{
    header('location:index.php');
}


