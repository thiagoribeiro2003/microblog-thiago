<?php
use Microblog\ControleDeAcesso;
use Microblog\Noticia;

require_once "../vendor/autoload.php";
$sessao = new ControleDeAcesso;
$sessao->verificaAcesso();

$noticia = new Noticia;
$noticia->setId($_GET['id']);
$noticia->usuario->setId($_SESSION['id']);
$noticia->usuario->setTipo($_SESSION['tipo']);
$noticia->excluirNoticia();
header("location:noticias.php");