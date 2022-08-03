<?php
use Microblog\Categoria;

require_once "../inc/cabecalho-admin.php";
$sessao->verificaAcessoAdmin();

if(isset($_POST['inserir'])){
$categoria = new Categoria;
$categoria->setNome($_POST['nome']);

$categoria->inserirCategoria();
header("location:categorias.php?categoria-inserida"); 					
}
?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Inserir nova categoria
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-inserir" name="form-inserir">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input class="form-control" type="text" id="nome" name="nome" required>
			</div>
			
			<button class="btn btn-primary" id="inserir" name="inserir"><i class="bi bi-save"></i> Inserir</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

