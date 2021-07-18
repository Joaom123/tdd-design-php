<?php


namespace CDC\Loja\RH;


class QuinzeOuVinteECincoPorCento implements RegraDeCalculo
{

    public function calcula(\CDC\Loja\RH\Funcionario $funcionario): float
    {
        if ($funcionario->getSalario() < 2500) {
            return $funcionario->getSalario() * 0.85;
        }

        return $funcionario->getSalario() * 0.75;
    }
}