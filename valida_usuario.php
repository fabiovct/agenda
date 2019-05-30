<?php
require_once('Config.class.php');

    //$usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $sql = "SELECT * FROM contatos WHERE email = '$email' AND senha = '$senha'";

    $objDb = new Config();
    $link = $objDb->logar();

    $resultado_id = mysqli_query($link, $sql);


        if(mysqli_num_rows($resultado_id) == 1){

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['email'] = $email;
        //var_dump($resultado_id);
        header('location:pagina.php');

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";

    }
