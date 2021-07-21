<?php


namespace CDC\Loja\FluxoDeCaixa;


use Mockery;

class GeradorDeNotaFiscalTest extends \PHPUnit\Framework\TestCase
{
    private $daoMock;
    private $sapMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->daoMock = Mockery::mock(NFDao::class);
        $this->daoMock->shouldReceive("executa")->andReturn(true);

        $this->sapMock = Mockery::mock(SAP::class);
        $this->sapMock->shouldReceive("executa")->andReturn(true);
    }

    public function testDeveGerarNFComValorDeImpostoDescontado()
    {
        $gerador = new GeradorDeNotaFiscal(array());
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertEqualsWithDelta(1000 * 0.94, $nf->getValor(), 0.00001);
    }

    public function testDevePersistirNFGerada()
    {
        $gerador = new GeradorDeNotaFiscal(array($this->daoMock));
        $pedido = new Pedido("Andre", 1000, 1);
        $nf = $gerador->gera($pedido);

        $this->assertTrue($this->daoMock->executa($nf));
        $this->assertNotNull($nf);
        $this->assertEqualsWithDelta(1000 * 0.94, $nf->getValor(), 0.00001);
    }

    public function testDeveEnviarNFGeradaParaSAP()
    {
        $gerador = new GeradorDeNotaFiscal(array($this->sapMock));
        $pedido = new Pedido("Andre", 1000, 1);

        $nf = $gerador->gera($pedido);
        $this->assertTrue($this->sapMock->executa($nf));
        $this->assertEqualsWithDelta(1000 * 0.94,
            $nf->getValor(), 0.00001);
    }
}