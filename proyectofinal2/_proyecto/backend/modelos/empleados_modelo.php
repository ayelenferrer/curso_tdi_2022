
<?php

require_once("modelos/generico_modelo.php");

class empleados_modelo extends generico_modelo
{


    protected $id;

    protected $email;

    protected $clave;

    protected $tipo;

    public function constructor()
    {
        $this->email             = $this->validarPost('email');
        $this->clave         = $this->validarPost('clave');
        $this->tipo         = $this->validarPost('tipo');
    }

    public function obtenerId()
    {
        return $this->id;
    }
    public function obtenerEmail()
    {
        return $this->email;
    }
    public function obtenerTipo()
    {
        return $this->tipo;
    }
    public function validarLogin($email, $clave)
    {

        $sql = "SELECT id, mail, tipo FROM empleados WHERE mail = :email AND clave = :clave; ";
        $arrayDatos = array("email" => $email, "clave" => md5($clave));
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function obtenerDatos($id)
    {

        $sql = "SELECT * FROM empleados WHERE id = :id; ";
        $arrayDatos = array("id" => $id);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function ingresar()
    {

        if ($this->email == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El email no puede ser vacio");
            return $retorno;
        }
        $sql = "SELECT * FROM empleados WHERE mail = :mail; ";
        $arrayDatos = array("mail" => $this->email);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($lista)>0){
            $retorno = array("estado" => "Error", "mensaje" => "El email ingresado ya existe");
            return $retorno;
        }
        if ($this->clave == "") {
            $retorno = array("estado" => "Error", "mensaje" => "La clave no puede estar vacia");
            return $retorno;
        }
        if (strlen($this->clave) < 8) {
            $retorno = array("estado" => "Error", "mensaje" => "La clave debe tener al menos 8 digitos");
            return $retorno;
        }
        if ($this->tipo == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El tipo no puede estar vacio");
            return $retorno;
        }
        if (!in_array($this->tipo, array('recepcionista', 'cadete', 'encargado'))) {
            $retorno = array("estado" => "Error", "mensaje" => "El tipo ingresado no es correcto");
            return $retorno;
        }
        $sqlInsert = "INSERT empleados SET
						mail = :mail,
						clave = :clave,
						tipo = :tipo ;
                        estado = :estado";

        $arrayInsert = array(
            "mail"         => $this->email,
            "clave"             => md5($this->clave),
            "tipo"         => $this->tipo,
            "estado"         => 1,
        );
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array("estado" => "Ok", "mensaje" => "Se ingreso el empleado correctamente");
        return $retorno;
    }

    public function guardar()
    {

        if ($this->email == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El email no puede ser vacio");
            return $retorno;
        }
        $sql = "SELECT * FROM empleados WHERE mail = :mail; ";
        $arrayDatos = array("mail" => $this->email);
        $lista         = $this->ejecutarConsulta($sql, $arrayDatos);
        if(count($lista)>1 || (count($lista)==1 && $lista[0]['mail']!=$this->email)){
            $retorno = array("estado" => "Error", "mensaje" => "El email ingresado ya existe");
            return $retorno;
        }
        if (!$this->clave == "" && strlen($this->clave) < 8) {
            $retorno = array("estado" => "Error", "mensaje" => "La clave debe tener al menos 8 digitos");
            return $retorno;
        }
        if ($this->tipo == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El tipo no puede estar vacio");
            return $retorno;
        }
        if (!in_array($this->tipo, array('recepcionista', 'cadete', 'encargado'))) {
            $retorno = array("estado" => "Error", "mensaje" => "El tipo ingresado no es correcto");
            return $retorno;
        }
        $sqlInsert = '';
        $arrayInsert = '';
        if ($this->clave == "") {
            $sqlInsert = "UPDATE empleados SET
                mail			= :mail,
                tipo = :tipo 
                WHERE id = :id;";
            $arrayInsert = array(
                "mail" => $this->email,
                "tipo" => $this->tipo,
                "id" => $this->id,
            );
        }
        else {
            $sqlInsert = "UPDATE empleados SET
                mail			= :mail,
                clave		= :clave,
                tipo = :tipo 
                WHERE id = :id;";
            $arrayInsert = array(
                "mail" => $this->email,
                "clave" => md5($this->clave),
                "tipo" => $this->tipo,
                "id" => $this->id,
            );
        }
        $this->persistirConsulta($sqlInsert, $arrayInsert);
        $retorno = array("estado" => "Ok", "mensaje" => "Se actualizo el empleado correctamente");
        return $retorno;
    }

    public function cargar($id)
    {

        if ($id == "") {
            $retorno = array("estado" => "Error", "mensaje" => "El id no puede ser vacio");
            return $retorno;
        }
        $sql = "SELECT id,mail,tipo FROM empleados WHERE id = :id";
        $arraySQL = array("id" => $id);
        $lista     = $this->ejecutarConsulta($sql, $arraySQL);
        $this->id         = $lista[0]['id'];
        $this->email         = $lista[0]['mail'];
        $this->tipo         = $lista[0]['tipo'];
    }

    public function borrar()
    {
        //$sql = "DELETE FROM alumnos WHERE documento = :documento";
        $sql = "UPDATE empleados SET estado = 0 WHERE id = :id";
        $arraySQL = array("id" => $this->id);
        $this->persistirConsulta($sql, $arraySQL);
        $retorno = array("estado" => "Ok", "mensaje" => "Se borro el empleado");
        return $retorno;
    }


    public function listar($filtros = array())
    {

        $sql = "SELECT * FROM empleados WHERE estado = 1 ";
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
						email
					 FROM empleados WHERE estado = 1 ";
        $arrayDatos = array();
        $sql .= " ORDER BY id ;";
        $lista     = $this->ejecutarConsulta($sql, $arrayDatos);
        return $lista;
    }

    public function totalRegistros()
    {

        $sql = "SELECT count(*) AS total FROM empleados";
        $arrayDatos = array();

        $lista     = $this->ejecutarConsulta($sql, $arrayDatos);
        $totalRegistros = $lista[0]['total'];
        return $totalRegistros;
    }
}

?>

