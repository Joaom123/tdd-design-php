<?php


namespace CDC\Loja\Carrinho;


use ArrayObject;
use CDC\Loja\Produto\Produto;

class CarrinhoDeCompras
{
    private ArrayObject $produtos;

    public function __construct()
    {
        $this->produtos = new ArrayObject();
    }

    public function adiciona(Produto $produto): CarrinhoDeCompras
    {
        $this->produtos->append($produto);
        return $this;
    }

    /**
     * @return ArrayObject
     */
    public function getProdutos(): ArrayObject
    {
        return $this->produtos;
    }

    public function maiorValor(): float
    {
        if (count($this->getProdutos()) === 0) {
            return 0;
        }

        $maiorValor = $this->getProdutos()[0]->getValorUnitario();
        foreach ($this->getProdutos() as $produto) {
            if ($maiorValor < $produto->getValorUnitario()) {
                $maiorValor = $produto->getValorUnitario();
            }
        }
        return $maiorValor;
    }
}