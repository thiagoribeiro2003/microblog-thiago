<?php
require_once "../inc/cabecalho-admin.php";
use Microblog\Usuario;
$usuario = new Usuario;
$usuario->setId($_GET['id']);
$usuario->excluirUsuario();
header("location:usuarios.php");