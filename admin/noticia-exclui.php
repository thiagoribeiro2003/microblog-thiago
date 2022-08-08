<?php
use Microblog\ControleDeAcesso;
use Microblog\Noticia;

require_once "../vendor/autoload.php";

$sessao = new ControleDeAcesso;

$sessao->verificaAcesso();
$sessao->verificaAcessoAdmin();

$noticia = new Noticia;

$noticia->setId($_GET['id']);

$noticia->excluirNoticia();

header("location:noticias.php");