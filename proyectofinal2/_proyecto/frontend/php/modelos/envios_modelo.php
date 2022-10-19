<?php

require_once("php/modelos/generico_modelo.php");

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

    protected $idcliente;

    protected $cliente;

    protected $idciudad;

    protected $ciudad;


    public function constructor()
    {
        $this->codigo            = $this->validarPost('codigo');
        $this->destinatario            = $this->validarPost('destinatario');
        $this->recepcion        = $this->validarPost('fecha_recepcion');
        $this->envio            = $this->validarPost('fecha_envio');
        $this->calle            = $this->validarPost('calle');
        $this->puerta            = $this->validarPost('numero_puerta');
        $this->apartamento            = $this->validarPost('apartamento');
        $this->otros            = $this->validarPost('otros');
        $this->estado            = $this->validarPost('estado');
        $this->idcliente            = $this->validarPost('idcliente');
        $this->idciudad          = $this->validarPost('idciudad');
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

    public function obtenerCliente()
    {
        return $this->cliente;
    }

    public function obtenerCiudad()
    {
        return $this->ciudad;
    }

    public function obtenerDatos($identificador)
    {

        $sql = "SELECT * FROM envio WHERE identificador = :identificador; ";
        $arrayDatos = array("identificador" => $identificador);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function ingresar()
    {
      
        if ($this->destinatario == "") {
            $retorno = array("destinatario" => "Error", "mensaje" => "El destinatario no puede estar vacio");
            return $retorno;
        }
        if ($this->calle == "") {
            $retorno = array("calle" => "Error", "mensaje" => "La calle no puede estar vacio");
            return $retorno;
        }
        if ($this->puerta == "") {
            $retorno = array("puerta" => "Error", "mensaje" => "La puerta no puede estar vacio");
            return $retorno;
        }
        if ($this->apartamento == "") {
            $retorno = array("apartamento" => "Error", "mensaje" => "El apartamento no puede estar vacio");
            return $retorno;
        }
        if ($this->idcliente == "") {
            $retorno = array("idcliente" => "Error", "mensaje" => "Debe ingresar un cliente");
            return $retorno;
        }
        $sql = "SELECT * FROM cliente WHERE documento = :documento; ";
        $arrayDatos = array("documento" => $this->idcliente);
        $listaClientes         = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($listaClientes)==0){
            $retorno = array("idcliente" => "Error", "mensaje" => "El cliente ingresado no existe");
            return $retorno;
        }
        else{
            $this->idcliente = $listaClientes[0]['id'];
        }
        if ($this->idciudad == "") {
            $retorno = array("idciudad" => "Error", "mensaje" => "Debe ingresar una ciudad");
            return $retorno;
        }
        $sql = "SELECT * FROM ciudad WHERE id = :idciudad; ";
        $arrayDatos = array("idciudad" => $this->idciudad);
        $listaCiudades        = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($listaCiudades)==0){
            $retorno = array("idcliente" => "Error", "mensaje" => "La ciudad ingresada no existe");
            return $retorno;
        }
        
   
        $this->codigo = bin2hex(random_bytes(3));
        $this->envio = date('Y-m-d H:i:s');
        $this->estado = 'pendiente';

        $sqlInsert = "INSERT envio SET
                        codigo = :codigo,
                        destinatario = :destinatario,
                        fecha_envio = :envio,
                        calle = :calle,
                        numero_puerta = :puerta,
                        apartamento = :apartamento,
                        otros = :otros,
                        estado = :estado,
                        id_cliente = :idcliente,
                        id_ciudad = :idciudad";


        $arrayInsert = array(
            'codigo'         => $this->codigo,
            'destinatario'         => $this->destinatario,
            'envio'         => $this->envio,
            'calle'         => $this->calle,
            'puerta'         => $this->puerta,
            'apartamento'         => $this->apartamento,
            'otros'         => $this->otros,
            'estado'         => $this->estado,
            'idcliente'         => $this->idcliente,
            'idciudad'         => $this->idciudad
        );
        
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array('estado' => 'Ok', 'mensaje' => 'Se registró el envío correctamente');
        return $retorno;
    }

    public function guardar()
    {
        if ($this->estado == '') {
            $retorno = array('estado' => 'Error', 'mensaje' => 'El estado no puede estar vacio');
            return $retorno;
        }
        if (!in_array($this->estado, array('pendiente', 'en_camino','en_reparto', 'entregado'))) {
            $retorno = array("estado" => "Error", "mensaje" => "El estado ingresado no es correcto");
            return $retorno;
        }
        if ($this->destinatario == "") {
            $retorno = array("destinatario" => "Error", "mensaje" => "El destinatario no puede estar vacio");
            return $retorno;
        }
        if ($this->calle == "") {
            $retorno = array("calle" => "Error", "mensaje" => "La calle no puede estar vacio");
            return $retorno;
        }
        if ($this->puerta == "") {
            $retorno = array("puerta" => "Error", "mensaje" => "La puerta no puede estar vacio");
            return $retorno;
        }
        if ($this->apartamento == "") {
            $retorno = array("apartamento" => "Error", "mensaje" => "El apartamento no puede estar vacio");
            return $retorno;
        }
        $sqlInsert = 'UPDATE envio SET
            estado = :estado,
            destinatario = :destinatario,
            calle = :calle,
            numero_puerta = :numero_puerta,
            apartamento = :apartamento,
            otros = :otros
            WHERE identificador = :identificador';
        $arrayInsert = array(
            'estado' => $this->estado,
            'destinatario' => $this->destinatario,
            'calle' => $this->calle,
            'numero_puerta' => $this->puerta,
            'apartamento' => $this->apartamento,
            'identificador' => $this->id,
            'otros' => $this->otros
        );
    
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array('estado' => 'Ok', 'mensaje' => 'Se actualizo el envio correctamente');
        return $retorno;
    }

    public function actualizarEstado($estado, $id)
    {
        if ($estado == '') {
            $retorno = array('estado' => 'Error', 'mensaje' => 'El estado no puede estar vacio');
            return $retorno;
        }
        if (!in_array($estado, array('pendiente', 'en_camino','en_reparto', 'entregado'))) {
            $retorno = array("estado" => "Error", "mensaje" => "El estado ingresado no es correcto");
            return $retorno;
        }
        if ($id == '') {
            $retorno = array('id' => 'Error', 'mensaje' => 'El id no puede estar vacio');
            return $retorno;
        }
        if ($estado == 'entregado') {
            $this->recepcion = date('Y-m-d H:i:s');
        };
        $sqlInsert = 'UPDATE envio SET
            estado = :estado,
            fecha_recepcion = :fecha_recepcion
            WHERE identificador = :identificador';
        $arrayInsert = array(
            'estado' => $estado,
            'identificador' => $id,
            'fecha_recepcion' => $this->recepcion
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
        $sql = 'SELECT *, envio.estado as estadoEnvio FROM envio JOIN cliente ON envio.id_cliente=cliente.id JOIN ciudad ON envio.id_ciudad = ciudad.id WHERE identificador = :id ';
        $arraySQL = array('id' => $id);
        $lista     = $this->ejecutarConsulta($sql, $arraySQL);
        $this->id         = $lista[0]['identificador'];
        $this->codigo         = $lista[0]['codigo'];
        $this->destinatario         = $lista[0]['destinatario'];
        $this->recepcion         = $lista[0]['fecha_recepcion'];
        $this->envio         = $lista[0]['fecha_envio'];
        $this->calle         = $lista[0]['calle'];
        $this->puerta         = $lista[0]['numero_puerta'];
        $this->apartamento         = $lista[0]['apartamento'];
        $this->otros         = $lista[0]['otros'];
        $this->estado         = $lista[0]['estadoEnvio'];
        $this->cliente         = $lista[0]['nombres'].' '.$lista[0]['apellidos'].' - ' .$lista[0]['documento'];
        $this->ciudad         = $lista[0]['nombre'].' - '.$lista[0]['departamento'];
    }

    public function cargarCodigo($codigo)
    {
        if ($codigo == '') {
            $retorno = array('codigo' => 'Error', 'mensaje' => 'El codigo no puede estar vacio');
            return $retorno;
        }
        $sql = 'SELECT *, envio.estado as estadoEnvio FROM envio JOIN cliente ON envio.id_cliente=cliente.id JOIN ciudad ON envio.id_ciudad = ciudad.id WHERE codigo = :codigo ';
        $arraySQL = array('codigo' => $codigo);
        $lista     = $this->ejecutarConsulta($sql, $arraySQL);
        if(count($lista)==0){
            $retorno = array('codigo' => 'Error', 'mensaje' => 'No se encontro envio con ese codigo');
            return $retorno;
        }
        $this->id         = $lista[0]['identificador'];
        $this->codigo         = $lista[0]['codigo'];
        $this->destinatario         = $lista[0]['destinatario'];
        $this->recepcion         = $lista[0]['fecha_recepcion'];
        $this->envio         = $lista[0]['fecha_envio'];
        $this->calle         = $lista[0]['calle'];
        $this->puerta         = $lista[0]['numero_puerta'];
        $this->apartamento         = $lista[0]['apartamento'];
        $this->otros         = $lista[0]['otros'];
        $this->estado         = $lista[0]['estadoEnvio'];
        $this->cliente         = $lista[0]['nombres'].' '.$lista[0]['apellidos'].' - ' .$lista[0]['documento'];
        $this->ciudad         = $lista[0]['nombre'].' - '.$lista[0]['departamento'];
        $retorno = array('codigo' => 'OK', 'mensaje' => 'Envio cargado correctamente');
        return $retorno;
    }

    public function listar($filtros = array())
    {

        $sql = "SELECT * FROM envio";
        $arrayDatos = array();

        if (isset($filtros['search']) && $filtros['search'] != "") {
            $filtro = $filtros['search'];
            $sql .= " WHERE codigo LIKE '%".$filtro."%'
            OR destinatario LIKE '%".$filtro."%'
            OR calle LIKE '%".$filtro."%'
            OR numero_puerta LIKE '%".$filtro."%'
            OR apartamento LIKE '%".$filtro."%'";
        }
        if (isset($filtros['pagina']) && $filtros['pagina'] != "") {

            $pagina = ($filtros['pagina'] - 1) * 10;
            $sql .= " ORDER BY identificador LIMIT " . $pagina . ",10;";
        } else {

            $sql .= " ORDER BY identificador LIMIT 0,10;";
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
        $sql .= " ORDER BY identificador ;";
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