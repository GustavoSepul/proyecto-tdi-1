<?php
require_once __DIR__ . "/../util/Property.php";

class Municipalidad
{
    private $id;
    private $nombre;
    private $direccion;
    private $numero;
    function __construct($id, $nombre, $direccion, $numero)
    {
        $this->id = new Property($id);
        $this->nombre = new Property($nombre);
        $this->direccion = new Property($direccion);
        $this->numero = new Property($numero);
    }
    static function makeFromAssocRow($row)
    {
        $id = $row["Id_municipalidad"];
        $nombre = $row["Nombre_municipalidad"];
        $direccion = $row["Direccion_municipalidad"];
        $numero = $row["Numero_municipalidad"];
        $newObject = new self($id, $nombre, $direccion, $numero);
        return $newObject;
    }
    static function insertNuevo($conn, $id, $nombre, $direccion, $numero)
    {
        $sql = "INSERT INTO municipalidad(`Id_municipalidad`, `Nombre_municipalidad`, `Direccion_municipalidad`, `Numero_municipalidad`) VALUES ('$id', '$nombre', '$direccion', '$numero');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($id, $nombre, $direccion, $numero);
        return $newObject;
    }
    static function delete($conn, $id)
    {
        $sql = "DELETE FROM municipalidad WHERE `Id_municipalidad`='$id';";
        $resultado = mysqli_query($conn, $sql);
    }
    function getId()
    {
        return $this->id->getValue();
    }
    function setId($id)
    {
        $this->id->setValue($id);
    }
    function getNombre()
    {
        return $this->nombre->getValue();
    }
    function setNombre($nombre)
    {
        $this->nombre->setValue($nombre);
    }
    function getDireccion()
    {
        return $this->direccion->getValue();
    }
    function setDireccion($direccion)
    {
        $this->direccion->setValue($direccion);
    }
    function getNumero()
    {
        return $this->numero->getValue();
    }
    function setNumero($numero)
    {
        $this->numero->setValue($numero);
    }
}
