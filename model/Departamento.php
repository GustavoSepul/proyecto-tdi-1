<?php
require_once __DIR__ . "/../util/Property.php";

class Departamento
{
    private $codigo;
    private $idMunicipalidad;
    private $rutAdministrador;
    private $nombre;
    private $encargado;
    function __construct($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado)
    {
        $this->codigo = new Property($codigo);
        $this->idMunicipalidad = new Property($idMunicipalidad);
        $this->rutAdministrador = new Property($rutAdministrador);
        $this->nombre = new Property($nombre);
        $this->encargado = new Property($encargado);
    }
    static function makeFromAssocRow($row)
    {
        $codigo = $row["Codigo_dep"];
        $idMunicipalidad = $row["Id_municipalidad"];
        $rutAdministrador = $row["Rut_administrador"];
        $nombre = $row["Nombre_dep"];
        $encargado = $row["Encargado_departamento"];
        $newObject = new self($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado);
        return $newObject;
    }
    static function insertNuevo($conn, $codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado)
    {
        $sql = "INSERT INTO departamento(`Codigo_dep`, `Id_municipalidad`, `Rut_administrador`, `Nombre_dep`, `Encargado_departamento`) VALUES ('$codigo', '$idMunicipalidad', '$rutAdministrador', '$nombre', '$encargado');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($codigo, $idMunicipalidad, $rutAdministrador, $nombre, $encargado);
        return $newObject;
    }
    static function delete($conn, $codigo)
    {
        $sql = "DELETE FROM departamento WHERE `Codigo_dep`='$codigo';";
        $resultado = mysqli_query($conn, $sql);
    }
    function getCodigo()
    {
        return $this->codigo->getValue();
    }
    function setCodigo($codigo)
    {
        $this->codigo->setValue($codigo);
    }
    function getIdmunicipalidad()
    {
        return $this->idMunicipalidad->getValue();
    }
    function setIdmunicipalidad($idMunicipalidad)
    {
        $this->idMunicipalidad->setValue($idMunicipalidad);
    }
    function getRutadministrador()
    {
        return $this->rutAdministrador->getValue();
    }
    function setRutadministrador($rutAdministrador)
    {
        $this->rutAdministrador->setValue($rutAdministrador);
    }
    function getNombre()
    {
        return $this->nombre->getValue();
    }
    function setNombre($nombre)
    {
        $this->nombre->setValue($nombre);
    }
    function getEncargado()
    {
        return $this->encargado->getValue();
    }
    function setEncargado($encargado)
    {
        $this->encargado->setValue($encargado);
    }
}
