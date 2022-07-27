<?php
namespace Microblog;
use PDO, Exception;

final class Usuario {
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $tipo;
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Banco::conecta();
    }


    public function listar():array {
        $sql = "SELECT id, nome, email, tipo 
        FROM usuarios ORDER BY nome";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ". $erro->getMessage());
        }
        return $resultado;
    }

    public function inserir():void {
        $sql = "INSERT INTO usuarios(nome, email, senha, tipo)
        VALUES(:nome, :email, :senha, :tipo)";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
            $consulta->execute();
        } catch (\Throwable $erro) {
            die("Erro: ".$erro->getMessage());
        }
        
    }

    public function listarUm(): array{
        $sql = "SELECT * FROM usuarios WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ". $erro->getMessage());
        }
        return $resultado;
    }

    public function atualizar():void {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, tipo = :tipo WHERE id = :id";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
            $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
             die("Erro ". $erro->getMessage());
        }
    }


    public function codificaSenha(string $senha):string {
        return password_hash($senha, PASSWORD_DEFAULT);
    }

/* Usamos a password_verify para COMPARAR as duas senhas: 
a digitada no formulário e a existente no Banco*/
    public function verificaSenha(string $senhaFormulario, string $senhaBanco):string {
        if (password_verify($senhaFormulario, $senhaBanco)) {
            return $senhaBanco;
        } else {
           return $this->codificaSenha($senhaFormulario);
        }
    }

    public function excluirUsuario():void {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    /* 
try {

} catch (Exception $erro) {
    die("Erro: ". $erro->getMessage());
}
*/

// try {

// } catch (Exception $erro) {
//     die("Erro: ". $erro->getMessage());
// }


    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

//============================= NOME ==============================

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }

//================================== EMAIL =========================

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    
//===================================== SENHA ======================
   
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha(string $senha)
    {
        $this->senha = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);
    }

//============================= TIPO ==============================

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo)
    {
        $this->tipo = filter_var($tipo, FILTER_SANITIZE_SPECIAL_CHARS);
    }

//===========================================================
}

