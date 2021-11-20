<?php
require_once __DIR__ . "/../util/Property.php";

class Administrador
{
    private $rut;
    private $nombre;
    private $numero;
    private $correo;
    private $clave;
    function __construct($rut, $nombre, $numero, $correo, $clave)
    {
        $this->rut = new Property($rut);
        $this->nombre = new Property($nombre);
        $this->numero = new Property($numero);
        $this->correo = new Property($correo);
        $this->clave = new Property($clave);
    }
    static function makeFromAssocRow($row)
    {
        $rut = $row["Rut_administrador"];
        $nombre = $row["Nombre_administrador"];
        $numero = $row["Numero_administrador"];
        $correo = $row["Correo_trabajo"];
        $clave = $row["Clave_ingreso"];
        $newObject = new self($rut, $nombre, $numero, $correo, $clave);
        return $newObject;
    }
    static function insertNuevo($conn, $rut, $nombre, $numero, $correo, $clave)
    {
        $sql = "INSERT INTO administrador(`Rut_administrador`, `Nombre_administrador`, `Numero_administrador`, `Correo_trabajo`, `Clave_ingreso`) VALUES ('$rut', '$nombre', '$numero', '$correo', '$clave');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($rut, $nombre, $numero, $correo, $clave);
        return $newObject;
    }
    static function delete($conn, $rut)
    {
        $sql = "DELETE FROM administrador WHERE `Rut_administrador`='$rut';";
        $resultado = mysqli_query($conn, $sql);
    }
    function getRut()
    {
        return $this->rut->getValue();
    }
    function setRut($rut)
    {
        $this->rut->setValue($rut);
    }
    function getNombre()
    {
        return $this->nombre->getValue();
    }
    function setNombre($nombre)
    {
        $this->nombre->setValue($nombre);
    }
    function getNumero()
    {
        return $this->numero->getValue();
    }
    function setNumero($numero)
    {
        $this->numero->setValue($numero);
    }
    function getCorreo()
    {
        return $this->correo->getValue();
    }
    function setCorreo($correo)
    {
        $this->correo->setValue($correo);
    }
    function getClave()
    {
        return $this->clave->getValue();
    }
    function setClave($clave)
    {
        $this->clave->setValue($clave);
    }
}
