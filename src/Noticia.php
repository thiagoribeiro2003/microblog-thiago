<?php
namespace Microblog;
use PDO, Exception;

final class Noticia{
    private int $id;
    private string $data;
    private string $titulo;
    private string $texto;
    private string $resumo;
    private string $imagem;
    private string $destaque;
    private int $categoriaId;
    
    /* Criando a propriedade do tipo Usuario, ou seja,
     a partir de uma classe que criamos anteriormente, 
    com o objetivo de reutilizar recursos dela

    Isso permitirá fazer uma ASSOCIAÇÃO entre classes */
    public Usuario $usuario;

    private PDO $conexao;

    public function __construct()
    {   
        /* No momento em que um objeto Noticia for instanciado
        nas páginas, aproveitanrenis oara tambem instanciar um objeto
        Usuario e com isso acessar recursos desta classe.*/ 
        $this->usuario = new Usuario;

        /* Reaproveitando a conexão já existente
        a partir da classe de Usuario*/
        $this->conexao = $this->usuario->getConexao();
    }

    public function inserirNoticia():void{
       $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem, destaque, usuario_id, categoria_id)
        VALUES(:titulo, :resumo, :imagem, :destaque, :usuario_id, :categoria_id)";
            try {
                $consulta = $this->conexao->prepare($sql);
                $consulta->bindParam(":titulo", $this->titulo, PDO::PARAM_STR);
                $consulta->bindParam(":texto", $this->texto, PDO::PARAM_STR);
                $consulta->bindParam(":resumo", $this->resumo, PDO::PARAM_STR);
                $consulta->bindParam(":imagem", $this->imagem, PDO::PARAM_STR);
                $consulta->bindParam(":destaque", $this->destaque, PDO::PARAM_STR);
                $consulta->bindParam(":categoria_id", $this->categoriaId, PDO::PARAM_STR);

                /* Aqui, primeiro chamamos o getter de ID a partir do objeto/classe 
                de Usuario. E só depois atribuimos ele ao parâmetro :usuario_id
                usando para isso o bindValue. Obs: bindParam pode ser usado, mas ha riscos 
                de erro devido a forma como ele é executado pelo PHP. Por isso, recomenda-se
                o uso do bindValue em situações como essa. */
                $consulta->bindParam(":usuario_id", $this->usuario->getId(), PDO::PARAM_INT); 
                $consulta->execute();       
        } catch (Exception $erro) {
            die("Erro: ". $erro->getMessage());
        }
    }

    public function uploadNoticia(array $arquivo){
        // Definindo os formatos aceitos 
        $tiposValidos = [
            "image/png",
            "image/jpeg",
            "image/gif",
            "image/svg+xml"
    ];

        if(!in_array($arquivo['type'], $tiposValidos)){
            die("
            <script>
            alert('Formato inválido!');
            history.back();
            </script>");
        } //else {
           // die("<script>alert('Formato Válido')</script>");
       // }

    // Acessando apenas o nome do arquivo
      $nome = $arquivo['name'];

    // Acessando os dados de acesso temporário
      $temporario = $arquivo['tmp_name'];

    // Definindo a pasta de destino junto com o nome do arquivo
      $destino = "../imagem/".$nome;

    // Usamos a função abaixo para pegar da área temporário e enviar para pasta de destino (com o nome do arquivo)
    move_uploaded_file($temporario, $destino);
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


//============================= TITULO ==============================


    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = filter_var($titulo, FILTER_SANITIZE_SPECIAL_CHARS);
    }


//============================= TEXTO ==============================


    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto(string $texto)
    {
        $this->texto = filter_var($texto, FILTER_SANITIZE_SPECIAL_CHARS);
    }


//============================= RESUMO ==============================


    public function getResumo()
    {
        return $this->resumo;
    }

   
    public function setResumo(string $resumo)
    {
        $this->resumo = filter_var($resumo, FILTER_SANITIZE_SPECIAL_CHARS);
    }


//============================= IMAGEM ==============================


    public function getImagem()
    {
        return $this->imagem;
    }
   
    public function setImagem(string $imagem)
    {
        $this->imagem = filter_var($imagem, FILTER_SANITIZE_SPECIAL_CHARS);
    }


//============================= DESTAQUE ==============================


    public function getDestaque()
    {
        return $this->destaque;
    }

    public function setDestaque(string $destaque)
    {
        $this->destaque = filter_var($destaque, FILTER_SANITIZE_SPECIAL_CHARS);
    }


//============================= DESTAQUE ==============================


    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    public function setCategoriaId(int $categoriaId)
    {
        $this->categoriaId = filter_var($categoriaId, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}