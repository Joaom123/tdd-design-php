<?php


namespace CDC\Loja\FluxoDeCaixa;


interface AcaoAposGerarNotaInterface
{
    public function executa(NotaFiscal $notaFiscal);
}