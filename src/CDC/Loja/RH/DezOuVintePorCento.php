<?php


namespace CDC\Loja\RH;


use CDC\Loja\RH\Funcionario;

class DezOuVintePorCento implements RegraDeCalculo
{

    public function calcula(Funcionario $funcionario): float
    {
        if ($funcionario->getSalario() > 3000) {
            return $funcionario->getSalario() * 0.8;
        }

        return $funcionario->getSalario() * 0.9;
    }
}