<?php 
use Microblog\Categoria;
use Microblog\Utilitarios;

require_once "../inc/cabecalho-admin.php";

$sessao->verificaAcessoAdmin();

$categoria = new categoria;
$categoria->setId($_GET['id']);
$dados = $categoria->atualizarCategoria();
// Utilitarios::dump($dados);

if(isset($_POST['atualizar'])){
	$categoria->setNome($_POST['nome']);

	$categoria->atualizarCategoria();
	header("location:categorias.php");
}
?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar dados da categoria
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input class="form-control" value="<?=$dados['nome']?>" type="text" id="nome" name="nome" required>
			</div>
			
			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>                
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

