<?php


namespace CDC\Loja\RH;


class Funcionario
{
    protected string $nome;
    protected float $salario;
    protected int $cargo;

    public function __construct($nome, $salario, $cargo)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->cargo = $cargo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSalario(): float
    {
        return $this->salario;
    }

    public function getCargo(): int
    {
        return $this->cargo;
    }

}