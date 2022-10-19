<?php

	require_once("modelos/ciudades_modelo.php"); 

	class controlador_ciudades{


		public function listarCiudades($parametros){

			$arrayFiltro = array();

			$arrayFiltro['pagina'] = isset($parametros['pagina'])?$parametros['pagina']:"";
			if(isset($parametros['filtro'])){
				$arrayFiltro['filtro'] = $parametros['filtro'];
			}
			$objCiudad = new ciudades_modelo();
			$retorno = $objCiudad->listar($arrayFiltro);
			return $retorno;

		}

	}









?>