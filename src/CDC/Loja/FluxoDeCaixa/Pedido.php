<?php


namespace CDC\Loja\FluxoDeCaixa;


class Pedido
{
    private string $cliente;
    private float $valorTotal;
    private int $quantidadeItens;

    public function __construct(string $cliente, float $valorTotal, int $quantidadeItens)
    {
        $this->cliente = $cliente;
        $this->valorTotal = $valorTotal;
        $this->quantidadeItens = $quantidadeItens;
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public function getValorTotal(): float
    {
        return $this->valorTotal;
    }

    public function getQuantidadeItens(): int
    {
        return $this->quantidadeItens;
    }



}