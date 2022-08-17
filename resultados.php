<?php

use Microblog\Utilitarios;

require_once "inc/cabecalho.php";
$noticia->setTermo($_GET['busca']);
$resultados = $noticia->busca();
// Utilitarios::dump($resultados);
?>


<div class="row bg-white rounded shadow my-1 py-4">
    <h2 class="col-12 fw-light">                    <!-- ou $_GET['termo']-->
        Você procurou por <span class="badge bg-dark"><?=$noticia->getTermo()?></span> e
        obteve <span class="badge bg-info"><?=count($resultados)?></span> resultados
    </h2>
    
    <?php foreach($resultados as $noticias){?>
    <div class="col-12 my-1">
        <article class="card">
            <div class="card-body">
                
                <h3 class="fs-4 card-title fw-light"><?=$noticias['titulo']?></h3>
                <p class="card-text">
                    <time><?=Utilitarios::formataData($noticias['data'])?></time> - 
                    <?=$noticias['resumo']?>
                </p>
                
                <a href="noticia.php" class="btn btn-primary btn-sm">Continuar lendo</a>
            </div>
        </article>
    </div>
    <?php }?>
     
        
        
    
<?php include_once "inc/todas.php";?>


<?php 
require_once "inc/rodape.php";
?>

