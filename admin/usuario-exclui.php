<?php
require_once "../vendor/autoload.php";
use Microblog\Usuario;

// Criamos um objetos para poder acessar os recursos da Classe
$usuario = new Usuario; // Não esqueça do autoload e do namespace

// Obtemos o id da URL e o passamos para o setter
$usuario->setId($_GET['id']);

// Só então executamos o método de exclusão
$usuario->excluirUsuario();

// Após excluir, redirecionamos para a página de lista de usuários
header("location:usuarios.php");

// Para usar recursos de uma classe precisa criar um objeto