<?php
/**
 * Index do projeto
 * 
 * @author Fernando de Assis 
 * @access public
 * @since 2019 
 */


include_once 'src/views/head.php';
class Index 
{	
     /*
     * Construtor da Classe
     */
	function __construct()
	{
		include_once 'src/views/indexview.php';
	}
}
new Index();
