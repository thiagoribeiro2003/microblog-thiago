<?php
namespace Microblog;
use PDO, Exception;

final class Categoria {
     private int $id;
     private string $nome;
     private PDO $conexao;

     public function __construct()
     {
        $this->conexao = Banco::conecta();
     }

     public function inserirCategoria():void{
        $sql = "INSERT INTO categorias(nome) VALUES(:nome)";
     }

     public function listar():array{
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







     

     public function getId()
     {
          return $this->id;
     }
    
     public function setId(int $id)
     {
          $this->id = $id;
     }


//============================= NOME ==============================


     public function getNome()
     {
          return $this->nome;
     }

     public function setNome(string $nome)
     {
          $this->nome = $nome;
     }
}