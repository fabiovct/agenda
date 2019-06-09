<?php
include 'header.html';
require_once('classes/Connection.php');
session_start();
if(isset($_SESSION['id_user'])){
    
}else{
    header('location:index.php');
}
include 'footer.html';

