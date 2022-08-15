<?php
use Microblog\Noticia;
use Microblog\Utilitarios;

require_once "inc/cabecalho.php";
$noticia = new Noticia;
$noticia->setDestaque('sim');
$destaques = $noticia->listarDestaques();

$todas = $noticia->listarTodas();
?>


<div class="row my-1 mx-md-n1">
    <?php foreach($destaques as $destaque){?>
        <!-- INÍCIO Card -->
		<div class="col-md-6 my-1 px-md-1">
            <article class="card shadow-sm h-100">
                <a href="noticia.php?id=<?=$destaque['id']?>" class="card-link">
                    <img src="imagem/<?=$destaque['imagem']?>" class="card-img-top" alt="Imagem da notícia">
                    <div class="card-body">
                        <h3 class="fs-4 card-title"><?=$destaque['titulo']?></h3>
                        <p class="card-text"><?=$destaque['resumo']?></p>
                    </div>
                </a>
            </article>
		</div>
		<!-- FIM Card -->
        <?php }?>

       

</div>        
        
            <hr class="my-5 w-50 mx-auto">
        

        <div class="row my-1">
            <div class="col-12 px-md-1">
                <div class="list-group">
                    <h2 class="fs-6 text-center text-muted">Todas as notícias <?=count($todas)?></h2>
                    <?php foreach($todas as $noticia){?>
                    <a href="noticia.php?=id<?=$noticia['id']?>" class="list-group-item list-group-item-action">
                         <h3 class="fs-6">
                            <time><?=Utilitarios::formataData($noticia['data'])?>
                            </time> - <?=$noticia['titulo']?></h3>
                        <p><?=$noticia['resumo']?></p>
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>



<?php 
require_once "inc/rodape.php";
?>

