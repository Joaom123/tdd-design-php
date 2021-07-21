<?php


namespace CDC\Loja\FluxoDeCaixa;


use DateTime;

class GeradorDeNotaFiscal
{
    private array $acoesAposGerarNota;

    public function __construct($acoesAposGerarNota)
    {
        $this->acoesAposGerarNota = $acoesAposGerarNota;
    }


    public function gera(Pedido $pedido): ?NotaFiscal
    {
        $notaFiscal = new NotaFiscal($pedido->getCliente(), $pedido->getValorTotal() * 0.94, new DateTime());

        foreach ($this->acoesAposGerarNota as $acao) {
            $acao->executa($notaFiscal);
        }

        return $notaFiscal;
    }

}