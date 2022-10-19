<?php

	require_once("modelos/clientes_modelo.php"); 

	class controlador_clientes{


		public function listarClientes($parametros){

			$arrayFiltro = array();

			$arrayFiltro['pagina'] = isset($parametros['pagina'])?$parametros['pagina']:"";
			if(isset($parametros['filtro'])){
				$arrayFiltro['filtro'] = $parametros['filtro'];
			}
			$objCliente = new clientes_modelo();
			$retorno = $objCliente->listar($arrayFiltro);
			return $retorno;

		}

	}









?>