<?php
namespace Microblog;
abstract class Utilitarios
{
   // Função que devolve a data atual
    public static function formataData(string $data):string{
    return date("d/m/Y H:i", strtotime($data));

      // wday = Representação númerica do DIA DA SEMANA de 0 a 6
    // mon = Representação númerica de um MÊS de 1 a 12

}

    public static function dump($dados){
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }

}

?>

