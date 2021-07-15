<?php


namespace CDC\Loja\Produto;


use phpDocumentor\Reflection\Utils;

class Produto
{
    private string $nome;
    private float $valorUnitario;
    private int $quantidade;

    public function __construct($nome, $valor, $quantidade = 1)
    {
        $this->nome = $nome;
        $this->valorUnitario = $valor;
        $this->quantidade = $quantidade;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getValorUnitario(): float
    {
        return $this->valorUnitario;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getValorTotal(): float
    {
        return $this->quantidade * $this->valorUnitario;
    }
}