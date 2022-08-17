<?php
use Microblog\Utilitarios;
require_once "inc/cabecalho.php";

$noticia->setId($_GET['id']);
$dados = $noticia->listarDetalhes();
// Utilitarios::dump($dados);

?>


<div class="row my-1 mx-md-n1">

    <article class="col-12">
        <h2> <?=$dados['titulo']?> </h2>
        <p class="font-weight-light">
            <time datetime="<?=$resultado['data']?>">
                <?=Utilitarios::formataData($dados['data'])?>
            </time> - <span><?=$dados['autor']?></span>
            <span><?=$dados['autor'] ?? "<i>Equipe Microblog</i>"?></span>
        </p>
        <img src="imagem/<?=$dados['imagem']?>"
         alt="" class="float-start pe-2 img-fluid">
        <p><?= Utilitarios::formataTexto($dados['texto'])?></p>
    </article>
    

</div>        
        
<?php include_once "inc/todas.php";?>     

<?php 
require_once "inc/rodape.php";
?>

