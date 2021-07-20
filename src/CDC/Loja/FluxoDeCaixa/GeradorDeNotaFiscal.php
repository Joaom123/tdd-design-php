<?php


namespace CDC\Loja\FluxoDeCaixa;


use DateTime;

class GeradorDeNotaFiscal
{
    private NFDao $dao;
    private SAP $sap;

    public function __construct(NFDao $dao, SAP $sap)
    {
        $this->dao = $dao;
        $this->sap = $sap;
    }


    public function gera(Pedido $pedido): ?NotaFiscal
    {
        $notaFiscal = new NotaFiscal($pedido->getCliente(), $pedido->getValorTotal() * 0.94, new DateTime());

        if ($this->dao->persiste($notaFiscal) && $this->sap->envia($notaFiscal)) {
            return $notaFiscal;
        }
        return null;

    }

}