<?php
/**
 * Testar a classe Coleta Dados
 *
 * @author  Fernando de Assis
 */
namespace dados;
$rootPath = dirname(__DIR__);
require_once $rootPath.'/coletaDados.php';

class ColetaDadosTest extends \PHPUnit_Framework_TestCase
{
    public function test__construct()
    {        
        $coletaObject = new ColetaDados();
        $this->assertEquals('https://swapi.co/api/starships/', $coletaObject->getUrl());
    }
}
