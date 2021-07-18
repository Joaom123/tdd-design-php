<?php


namespace CDC\Loja\Carrinho;


use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasTest extends \PHPUnit\Framework\TestCase
{
    private CarrinhoDeCompras $carrinhoDeCompras;

    protected function setUp(): void
    {
        $this->carrinhoDeCompras = new CarrinhoDeCompras();
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinhoDeCompras->maiorValor();

        $this->assertEqualsWithDelta(0, $valor, 0.000001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoComUmElemento()
    {
        $this->carrinhoDeCompras->adiciona(new Produto("Geladeira", 900.00, 1));
        $valor = $this->carrinhoDeCompras->maiorValor();

        $this->assertEqualsWithDelta(900, $valor, 0.000001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoComMuitosElementos()
    {
        $this->carrinhoDeCompras->adiciona(new Produto("Geladeira", 900.00, 1));
        $this->carrinhoDeCompras->adiciona(new Produto("Fogão", 1500.00, 1));
        $this->carrinhoDeCompras->adiciona(new Produto("Máquina de lavar", 750.00, 1));

        $valor = $this->carrinhoDeCompras->maiorValor();

        $this->assertEqualsWithDelta(1500, $valor, 0.000001);
    }

    public function testListaDeProdutos()
    {
        $this->carrinhoDeCompras->adiciona(new Produto("Geladeira", 900.00, 1));
        $this->carrinhoDeCompras->adiciona(new Produto("Fogão", 1500.00, 1));
        $this->carrinhoDeCompras->adiciona(new Produto("Máquina de lavar", 750.00, 1));

        $lista = $this->carrinhoDeCompras->getProdutos();

        $this->assertCount(3, $lista);
        $this->assertEqualsCanonicalizing(
            (array)new Produto("Geladeira", 900.00, 1),
            (array)$lista[0]);
    }
}