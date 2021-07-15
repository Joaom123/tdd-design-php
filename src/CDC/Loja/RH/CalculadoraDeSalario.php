<?php


namespace CDC\Loja\RH;


class CalculadoraDeSalario
{

    public function calculaSalario(Funcionario $funcionario): float
    {
        if ($funcionario->getCargo() === TabelaCargos::DESENVOLVEDOR) {
            if ($funcionario->getSalario() > 3000.0) {
                return $funcionario->getSalario() * 0.8;
            }
            return $funcionario->getSalario() * 0.9;
        }

        return 425.0;
    }
}