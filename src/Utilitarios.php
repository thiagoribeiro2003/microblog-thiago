<?php
namespace Microblog;
abstract class Utilitarios
{
    public static function dump($dados){
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }

}