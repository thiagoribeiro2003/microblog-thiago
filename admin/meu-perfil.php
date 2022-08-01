<?php
use Microblog\Usuario;

require_once "../inc/cabecalho-admin.php";

$usuario = new Usuario;
$usuario->setId($_SESSION['id']);
$dados = $usuario->listarUm();

if(isset($_POST['atualizar'])){
	$usuario->setNome($_POST['nome']);

	// Atualizamos o valor da variável de sessão ao pegar o novo nome
	$_SESSION['nome'] = $usuario->getNome();

	$usuario->setEmail($_POST['email']);
	$usuario->setTipo($_SESSION['tipo']);


/* Agoritmo da Senha
	Se o campo senha no formulários estiver vazio,
	significa que o usuário NÃO MUDOU A SENHA
*/

	if (empty($_POST['senha'])) {
		$usuario->setSenha( $dados['senha'] );
	} else { /* Caso contrário, se o usuário digitou alguma coisa no campo senha,
		precisaremos verificar o que foi digitado*/
		$usuario->setSenha($usuario->verificaSenha($_POST['senha'], $dados['senha']));
	}

	$usuario->atualizar();
	header("location:index.php?perfil-atualizado");
}
?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar meus dados
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input class="form-control" value="<?=$dados['nome']?>" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input class="form-control" value ="<?=$dados['email']?>" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "../inc/rodape-admin.php";
?>

