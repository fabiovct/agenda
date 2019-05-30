<?php

session_start();
session_destroy();

//unset($_SESSION['login']);
//unset($_SESSION['usuario']);

header('location:index.php');

