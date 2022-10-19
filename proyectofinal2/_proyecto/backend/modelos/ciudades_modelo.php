<?php

require_once("modelos/generico_modelo.php");

class ciudades_modelo extends generico_modelo
{

    protected $id;

    protected $nombre;

    protected $departamento;

    public function constructor()
    {
        $this->id            = $this->validarPost('id');
        $this->nombre            = $this->validarPost('nombre');
        $this->departamento            = $this->validarPost('departamento');
    }

    public function obtenerId()
    {
        return $this->id;
    }
    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function obtenerDepartamento()
    {
        return $this->departamento;
    }

    public function obtenerDatos($id)
    {

        $sql = "SELECT * FROM ciudad WHERE id = :id; ";
        $arrayDatos = array("id" => $id);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function cargar($id)
    {

        if ($id == '') {
            $retorno = array('estado' => 'Error', 'mensaje' => 'El id no puede ser vacio');
            return $retorno;
        }
        $sql = 'SELECT * FROM cliente WHERE id = :id';
        $arraySQL = array('id' => $id);
        $lista     = $this->ejecutarConsulta($sql, $arraySQL);
        $this->id         = $lista[0]['id'];
        $this->nombre         = $lista[0]['nombre'];
        $this->departamento        = $lista[0]['departamento'];
    }

    public function listar($filtros = array())
    {

        $sql = "SELECT * FROM ciudad";
        $arrayDatos = array();
        if (isset($filtros['filtro']) && $filtros['filtro'] != "") {
            $filtro = $filtros['filtro'];
            $sql .= " WHERE (nombre like '%" . $filtro . 
            "%')";
        }
        if (isset($filtros['pagina']) && $filtros['pagina'] != "") {

            $pagina = ($filtros['pagina'] - 1) * 10;
            $sql .= " ORDER BY id LIMIT " . $pagina . ",10;";
        } else {

            $sql .= " ORDER BY id LIMIT 0,10;";
        }

        $lista     = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

}

?>