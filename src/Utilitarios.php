<?php
namespace Microblog;
abstract class Utilitarios
{
    public static function dump(array $dados){
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }

}