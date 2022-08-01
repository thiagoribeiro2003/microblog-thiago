<?php
use Microblog\ControleDeAcesso;
use Microblog\Categoria;
require_once "../vendor/autoload.php";
$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();
$sessao->verificaAcessoAdmin();

// Criando Objeto para pode acessar os recursos da classe
$categoria = new Categoria; // Não esqueça do autoload e do namespace

// Pegando o parâmetro da URL e passando para o setter
$categoria->setId($_GET['id']);

// Chamando a função excluir para ser executada
$categoria->excluirCategoria();

header("location:categorias.php");
