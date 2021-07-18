<?php


namespace CDC\Loja\RH;



class Cargo
{
    private array $cargos = array(
        TabelaCargos::DESENVOLVEDOR => DezOuVintePorCento::class,
        TabelaCargos::DBA => QuinzeOuVinteECincoPorCento::class,
        TabelaCargos::TESTADOR => QuinzeOuVinteECincoPorCento::class
    );

    private RegraDeCalculo $regra;

    public function __construct($cargo)
    {
        if (array_key_exists($cargo, $this->cargos)) {
            $this->regra = new $this->cargos[$cargo];
        } else {
            throw new \RuntimeException("Cargo Inválido");
        }
    }

    public function getRegra(): RegraDeCalculo
    {
        return $this->regra;
    }

}