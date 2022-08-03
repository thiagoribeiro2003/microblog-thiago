<?php
namespace Microblog;
use PDO, Exception; // Exception é uma classe de erro, ja PDO é para conectar o banco de dados

// final class significa que a classe não vai ser herdeiro
final class Categoria {
     private int $id;
     private string $nome;
     private PDO $conexao;

     public function __construct() // No momento da criação do objeto conecta ao banco
     {
        $this->conexao = Banco::conecta(); 
     }

     public function inserirCategoria():void{
        $sql = "INSERT INTO categorias(nome) VALUES(:nome)"; //Monta o comando
        try {
            $consulta = $this->conexao->prepare($sql); // Prepara ele
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR); // Coloca os parâmetros
            $consulta->execute(); // Executa ele
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }

     }

     public function listarCategorias():array{
        $sql = "SELECT id, nome FROM categorias ORDER BY nome";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ". $erro->getMessage());
        }
        return $resultado;
     }

     public function listarUmaCategoria():array{
          $sql = "SELECT * FROM categorias WHERE id = :id";
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
     

       public function atualizarCategoria():void{
          $sql = "UPDATE categorias SET nome = :nome WHERE id = :id";
          try {
               $consulta = $this->conexao->prepare($sql);
               $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
               $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
               $consulta->execute();
          } catch (Exception $erro) {
               die("Erro: ".$erro->getMessage());
          }
     }
     
     public function excluirCategoria():void{
          $sql = "DELETE FROM categorias WHERE id = :id";
          try{
               $consulta = $this->conexao->prepare($sql);
               $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
               $consulta->execute();
          } catch (Exception $erro){
               die("Erro: ".$erro->getMessage());
          }
     }

   







//============================= ID ==============================
     

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
}