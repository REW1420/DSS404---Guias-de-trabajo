<?php
class Login
{
    private $_id;
    private $nombre;
    private $_pass;
    private $status = false;





    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function set_Nombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function verificarUsuario($fila_datos)
    {
        $username = array('docente', 'estudiante', 'maria', 'admin');
        $password = array("udbING", "ingUDB", 'maria', 'P@$$werD');
        if (
            in_array($fila_datos["pass"], $password) && in_array($fila_datos["username"], $username)
        ) {
            $this->status = true;
        } else {
            $this->status = false;
        }

        //verifica el estado de la session
        return $this->_status;
    }
    public function getStatus()
    {
        return $this->_status;
    }
    //cierra la session y elimina las variables.
    public function cerrarSession()
    {
        $this->nombre;
        $this->pass = '';
        $this->status = false;
    }
}
?>