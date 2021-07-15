<?php


namespace CDC\Loja\Carrinho;


use CDC\Loja\Produto\Produto;

class MaiorPrecoTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $carrinho = new CarrinhoDeCompras();
        $valor = $carrinho->maiorValor();

        $this->assertEqualsWithDelta(0, $valor, 0.000001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoComUmElemento()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $valor = $carrinho->maiorValor();

        $this->assertEqualsWithDelta(900, $valor, 0.000001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoComMuitosElementos()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $carrinho->adiciona(new Produto("Fogão", 1500.00, 1));
        $carrinho->adiciona(new Produto("Máquina de lavar", 750.00, 1));

        $valor = $carrinho->maiorValor();

        $this->assertEqualsWithDelta(1500, $valor, 0.000001);
    }
}