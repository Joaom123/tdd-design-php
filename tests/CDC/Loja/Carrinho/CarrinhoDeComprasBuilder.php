<?php


namespace CDC\Loja\Carrinho;


use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{
    private CarrinhoDeCompras $carrinhoDeCompras;

    public function __construct()
    {
        $this->carrinhoDeCompras = new CarrinhoDeCompras();
    }

    public function comItens(): CarrinhoDeComprasBuilder
    {
        $valores = func_get_arg();

        foreach ($valores as $valor) {
            $this->carrinhoDeCompras->adiciona(new Produto("Item", $valor, 1));
        }
        return $this;
    }

    public function cria(): CarrinhoDeCompras
    {
        return $this->carrinhoDeCompras;
    }
}