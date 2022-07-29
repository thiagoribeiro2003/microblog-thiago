<?php
namespace Microblog;

final class ControleDeAcesso {

    public function __construct(){
        // Se NÃO EXISTE uma sessão em funcionamento
        if( !isset($_SESSION) ){
            // Então iniciamos a sessão
            session_start();
        }
    }

    public function verificaAcesso():void{
        /* Se NÃO EXISTIR uma variável de sessão relacionada ao id do usuário logado... */
        if(!isset($_SESSION['id'])){
            /* Então significa que o usuário não está  logado,
            portanto apague qualquer resquício de sessão
            e force o usuário a ir para login.php*/
            session_destroy();
            header("location:../login.php?acesso_proibido");
            die(); // exit;
        }
    }

    public function login(int $id, string $nome, string $tipo){
        /* No momento em que ocorrer o login, adicionamos à sessão
        variáveis de sessão contendo os dados necessários para o sistema*/
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipo'] = $tipo;
    }

    public function logout():void{
        session_start();
        session_destroy();
        header("location:../login.php?logout");
        die(); // exit;
    }

    public function verificaAcessoAdmin():void {
        if($_SESSION['tipo'] !== 'admin'){
            header("location:nao-autorizado.php");
            die();
        }

    }
}