<?php
/**
 * Solicitar e entregar protocolos
 * 
 * @author Fernando de Assis 
 * @access public
 * @since 2019
 */
namespace dados;
require_once 'coletaDados.php';
include_once 'src/views/head.php';
include_once 'src/views/resultadoView.php';

class Resultado
{
    private $coletaDados;

     /*
     * Construtor da Classe
     */
    public function __construct() {
        // Capturar valor de distancia
        $this->distancia = $_GET['d'];
        $naves = $this->pesquisar($this->distancia);
        $this->imprimeView($naves);

    }

     /*
     * Importar dados a partir de uma url de requisição
     * @param $distancia Distancia a ser percorrida
     * @return array Resultado das naves procuradas
     */
    public function pesquisar($distancia) {
        $coletaDados = new ColetaDados();
        $resultado = $coletaDados->solicitaDados();
        foreach ($resultado['results'] as $key => $value) {
            $numeroParadas = floor($distancia/$value['MGLT']);
            $naves[] = array('nome' => $value['name'],'modelo' => $value['model'], 'numeroParadas' => $numeroParadas );
        }
        return $naves;
    }

     /*
     * Imprime o resultado da pesquisa
     * @param $naves arrays de naves
     */
    public function imprimeView($naves) {
        echo "<div class='resultado'>";
        echo "<div class='resultado-sub'>Resultado para distancia de :".$this->distancia." MGLT</div>";
        if (!empty($naves)) {
            foreach ($naves as $nave) {
                echo "<div class='resposta'>";
                echo "<span class='nave'> Nome: ".$nave['nome']."</span><br>";
                echo "<span class='nave'> Modelo: ".$nave['modelo']."</span><br>";
                echo "<span class='nave'> Número de paradas: ".$nave['numeroParadas']."</span><br>";
                echo "</div><br>";
            }
        }
        echo "</div>";
    }
}
// Criar um novo objeto Resultado
$novo = new Resultado();