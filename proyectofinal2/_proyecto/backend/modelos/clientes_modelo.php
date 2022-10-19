<?php

require_once("modelos/generico_modelo.php");

class clientes_modelo extends generico_modelo
{

    protected $id;

    protected $documento;

    protected $nombres;

    protected $apellidos;

    protected $telefono;

    public function constructor()
    {
        $this->nombres            = $this->validarPost('nombres');
        $this->apellidos            = $this->validarPost('apellidos');
        $this->documento            = $this->validarPost('documento');
        $this->telefono        = $this->validarPost('telefono');
    }

    public function obtenerId()
    {
        return $this->id;
    }
    public function obtenerDocumento()
    {
        return $this->documento;
    }
    public function obtenerTelefono()
    {
        return $this->telefono;
    }

    public function obtenerNombres()
    {
        return $this->nombres;
    }

    public function obtenerApellidos()
    {
        return $this->apellidos;
    }

    public function obtenerDatos($id)
    {

        $sql = "SELECT * FROM cliente WHERE id = :id; ";
        $arrayDatos = array("id" => $id);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function ingresar()
    {
        if ($this->documento == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El documento no puede estar vacio");
            return $retorno;
        }
        $sql = "SELECT * FROM cliente WHERE documento = :documento; ";
        $arrayDatos = array("documento" => $this->documento);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($lista)>0){
            $retorno = array("estado" => "Error", "mensaje" => "El documento ingresado ya se registró");
            return $retorno;
        }
        if ($this->nombres == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El nombre no puede estar vacio");
            return $retorno;
        }
        if ($this->apellidos == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El apellido no puede estar vacio");
            return $retorno;
        }
        if ($this->telefono == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El teléfono no puede estar vacio");
            return $retorno;
        }
        $sql = "SELECT * FROM cliente WHERE telefono = :telefono; ";
        $arrayDatos = array("telefono" => $this->telefono);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($lista)>0){
            $retorno = array("estado" => "Error", "mensaje" => "El teléfono ingresado ya se registró");
            return $retorno;
        }
        $sqlInsert = "INSERT cliente SET
						documento = :documento,
						nombres = :nombres,
						apellidos = :apellidos,
                        telefono = :telefono,
                        estado = 1";

        $arrayInsert = array(
            'documento'         => $this->documento,
            'nombres'             => $this->nombres,
            'apellidos'         => $this->apellidos,
            'telefono'         => $this->telefono
        );
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array('estado' => 'Ok', 'mensaje' => 'Se ingreso el cliente correctamente');
        return $retorno;
    }

    public function guardar()
    {
        $sql = 'SELECT * FROM cliente WHERE documento = :documento;';
        $arrayDatos = array('documento' => $this->documento);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($lista)>1 || (count($lista)==1 && $lista[0]['documento']!=$this->documento)){
            $retorno = array('documento' => 'Error', 'mensaje' => 'El documento ingresado ya se registró');
            return $retorno;
        }
        if ($this->nombres == '') {
            $retorno = array('nombres' => 'Error', 'mensaje' => 'El nombre no puede estar vacio');
            return $retorno;
        }
        if ($this->apellidos == '') {
            $retorno = array('apellidos' => 'Error', 'mensaje' => 'El apellido no puede estar vacio');
            return $retorno;
        }
        $sql = 'SELECT * FROM cliente WHERE telefono = :telefono; ';
        $arrayDatos = array('telefono' => $this->telefono);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($lista)>1 || (count($lista)==1 && $lista[0]['telefono']!=$this->telefono)){
            $retorno = array('estado' => 'Error', 'mensaje' => 'El telefono ingresado ya se registró');
            return $retorno;
        }

            $sqlInsert = 'UPDATE cliente SET
                nombres = :nombres,
                apellidos = :apellidos,
                documento = :documento,
                telefono = :telefono 
                WHERE id = :id;';
            $arrayInsert = array(
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'documento' => $this->documento,
                'telefono' => $this->telefono,
                'id' => $this->id,
            );
        
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array('estado' => 'Ok', 'mensaje' => 'Se actualizo el cliente correctamente');
        return $retorno;
    }

    public function cargar($id)
    {

        if ($id == '') {
            $retorno = array('estado' => 'Error', 'mensaje' => 'El id no puede ser vacio');
            return $retorno;
        }
        $sql = 'SELECT id,nombres,apellidos,documento,telefono FROM cliente WHERE id = :id';
        $arraySQL = array('id' => $id);
        $lista     = $this->ejecutarConsulta($sql, $arraySQL);
        $this->id         = $lista[0]['id'];
        $this->nombres         = $lista[0]['nombres'];
        $this->apellidos         = $lista[0]['apellidos'];
        $this->documento         = $lista[0]['documento'];
        $this->telefono        = $lista[0]['telefono'];
    }

    public function borrar()
    {
        //$sql = 'DELETE FROM cliente WHERE documento = :documento';
        $sql = 'UPDATE cliente SET estado = 0 WHERE id = :id';
        $arraySQL = array('id' => $this->id);
        $this->persistirConsulta($sql, $arraySQL);
        $retorno = array('estado' => 'Ok', 'mensaje' => 'Se borro el cliente');
        return $retorno;
    }


    public function listar($filtros = array())
    {

        $sql = "SELECT * FROM cliente WHERE estado = 1 ";
        $arrayDatos = array();
        if (isset($filtros['search']) && $filtros['search'] != "") {
            $filtro = $filtros['search'];
            $sql .= " AND (documento like '%" . $filtro . 
            "%' OR nombres like '%". $filtro ."%' ".
            " OR apellidos like '%". $filtro ."%' ".
            " OR telefono like '%". $filtro ."%' )";
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

    public function listarSelect($filtros = array())
    {

        $sql = "SELECT  id, 
						documento
					 FROM cliente WHERE estado = 1 ";
        $arrayDatos = array();
        $sql .= " ORDER BY id ;";
        $lista     = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function totalRegistros()
    {

        $sql = "SELECT count(*) AS total FROM cliente WHERE estado=1";
        $arrayDatos = array();

        $lista     = $this->ejecutarConsulta($sql, $arrayDatos);
        $totalRegistros = $lista[0]['total'];
        return $totalRegistros;
    }
}

?>