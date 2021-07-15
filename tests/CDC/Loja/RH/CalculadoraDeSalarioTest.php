<?php


namespace CDC\Loja\RH;


use PHPUnit\Framework\TestCase;

class CalculadoraDeSalarioTest extends TestCase
{
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 1500, TabelaCargos::DESENVOLVEDOR);
        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEqualsWithDelta($desenvolvedor->getSalario() * 0.9, $salario, 0.000001);
    }

    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario("Andre", 4000.0, TabelaCargos::DESENVOLVEDOR);
        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEqualsWithDelta($desenvolvedor->getSalario() * 0.8, $salario, 0.000001);
    }

    public function testCalculoSalarioDBAComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Ricardo", 500.0, TabelaCargos::DBA);
        $salario = $calculadora->calculaSalario($dba);

        $this->assertEqualsWithDelta(500 * 0.85, $salario, 0.000001);
    }
}