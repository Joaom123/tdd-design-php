<?php


namespace CDC\Loja\FluxoDeCaixa;


use DateTime;

class NotaFiscal
{
    private string $cliente;
    private float $valor;
    private DateTime $data;

    public function __construct(string $cliente, float $valor, DateTime $data)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->data = $data;
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getData(): string
    {
        return $this->data;
    }

}