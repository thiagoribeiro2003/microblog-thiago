<?php
use Microblog\Utilitarios;

require_once "inc/cabecalho.php";
$noticia->setCategoriaId($_GET['id']);
$dados = $noticia->listarPorCategoria();
//  Utilitarios::dump($dados);
?>


<div class="row my-1 mx-md-n1">

    <article class="col-12">
        <?php if( count($dados) > 0){?>
        <h2> Notícias sobre 
        <span class="badge bg-primary">
        <?=$dados[0]['categoria']?>
        </span>
        </h2>
        <?php } else {?>
            <h2><span class="alert alert-warning text-center"> Essa categoria não possui notícias </span></h2>
        <?php }?>
        
        <?php foreach ($dados as $dado){?>
        <div class="row my-1">
            <div class="col-12 px-md-1">
                <div class="list-group">
                    <a href="noticia.php?id=<?=$dado['id']?>" class="list-group-item list-group-item-action">
                       
                        <h3 class="fs-6"><?=$dado['titulo']?></h3>
                        <p>
                            <time><?=Utilitarios::formataData($dado['data'])?></time> - <?=$dado['autor'] ?? "<i>Equipe Microblog"?>
                        </p>
                        <p><?=$dado['resumo']?></p>  
                    </a>   
                                      
             </div>
            </div>
        </div>
        <?php }?>  
         


    </article>
    

</div>        
        
<?php include_once "inc/todas.php";?>        

<?php 
require_once "inc/rodape.php";
?>

