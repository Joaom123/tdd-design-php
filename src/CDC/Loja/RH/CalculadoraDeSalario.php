<?php


namespace CDC\Loja\RH;


class CalculadoraDeSalario
{

    public function calculaSalario(Funcionario $funcionario): float
    {
        $cargo = new Cargo($funcionario->getCargo());
        return $cargo->getRegra()->calcula($funcionario);
    }
}