<?php

require_once("modelos/generico_modelo.php");

class envios_modelo extends generico_modelo
{

    protected $id;

    protected $codigo;

    protected $destinatario;

    protected $recepcion;

    protected $envio;

    protected $calle;

    protected $puerta;

    protected $apartamento;

    protected $otros;

    protected $estado;

    public function constructor()
    {
        $this->id            = $this->validarPost('identificador');
        $this->codigo            = $this->validarPost('codigo');
        $this->destinatario            = $this->validarPost('destinatario');
        $this->recepcion        = $this->validarPost('fecha_recepcion');
        $this->envio            = $this->validarPost('fecha_envio');
        $this->calle            = $this->validarPost('calle');
        $this->puerta            = $this->validarPost('numero_puerta');
        $this->apartamento            = $this->validarPost('apartamento');
        $this->otros            = $this->validarPost('otros');
        $this->estado            = $this->validarPost('estado');
    }

    public function obtenerIdentificador()
    {
        return $this->id;
    }
    public function obtenerCodigo()
    {
        return $this->codigo;
    }
    public function obtenerDestinatario()
    {
        return $this->destinatario;
    }

    public function obtenerRecepcion()
    {
        return $this->recepcion;
    }

    public function obtenerEnvio()
    {
        return $this->envio;
    }

    public function obtenerCalle()
    {
        return $this->calle;
    }

    public function obtenerPuerta()
    {
        return $this->puerta;
    }

    public function obtenerApartamento()
    {
        return $this->apartamento;
    }

    public function obtenerOtros()
    {
        return $this->otros;
    }

    public function obtenerEstado()
    {
        return $this->estado;
    }

    public function obtenerDatos($id)
    {

        $sql = "SELECT * FROM envio WHERE id = :id; ";
        $arrayDatos = array("id" => $id);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function ingresar()
    {
        if ($this->estado == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El estado no puede estar vacio");
            return $retorno;
        }
      
        $sqlInsert = "INSERT envio SET
                        estado = :estado";

        $arrayInsert = array(
            'estado'         => $this->estado,
        );
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array('estado' => 'Ok', 'mensaje' => 'Se actualizó el estado correctamente');
        return $retorno;
    }

    public function guardar()
    {
        $sql = 'SELECT * FROM envio WHERE estado = :estado;';
        $arrayDatos = array('estado' => $this->estado);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        if ($this->estado == '') {
            $retorno = array('estado' => 'Error', 'mensaje' => 'El estado no puede estar vacio');
            return $retorno;
        }

            $sqlInsert = 'UPDATE envio SET
                estado = :estado,
                WHERE id = :id;';
            $arrayInsert = array(
                'estado' => $this->estado,
                'id' => $this->id,
            );
        
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array('estado' => 'Ok', 'mensaje' => 'Se actualizo el estado correctamente');
        return $retorno;
    }

    public function cargar($id)
    {

        if ($id == '') {
            $retorno = array('estado' => 'Error', 'mensaje' => 'El estado no puede estar vacio');
            return $retorno;
        }
        $sql = 'SELECT id,estado FROM envio WHERE id = :id';
        $arraySQL = array('id' => $id);
        $lista     = $this->ejecutarConsulta($sql, $arraySQL);
        $this->id         = $lista[0]['id'];
        $this->estado         = $lista[0]['estado'];
    }

    public function listar($filtros = array())
    {

        $sql = "SELECT * FROM envio WHERE estado = 1 ";
        $arrayDatos = array();

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
						estado
					 FROM envio WHERE estado = 1 ";
        $arrayDatos = array();
        $sql .= " ORDER BY id ;";
        $lista     = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function totalRegistros()
    {

        $sql = "SELECT count(*) AS total FROM envio";
        $arrayDatos = array();

        $lista     = $this->ejecutarConsulta($sql, $arrayDatos);
        $totalRegistros = $lista[0]['total'];
        return $totalRegistros;
    }
}

?>