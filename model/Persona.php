<?php
require_once __DIR__ . "/../util/Property.php";

class Persona
{
    private $rut;
    private $idMunicipalidad;
    private $nombre;
    private $numero;
    private $correo;
    function __construct($rut, $idMunicipalidad, $nombre, $numero, $correo)
    {
        $this->rut = new Property($rut);
        $this->idMunicipalidad = new Property($idMunicipalidad);
        $this->nombre = new Property($nombre);
        $this->numero = new Property($numero);
        $this->correo = new Property($correo);
    }
    static function makeFromAssocRow($row)
    {
        $rut = $row["Rut_persona"];
        $idMunicipalidad = $row["Id_municipalidad"];
        $nombre = $row["Nombre_persona"];
        $numero = $row["Numero_persona"];
        $correo = $row["Correo_persona"];
        $newObject = new self($rut, $idMunicipalidad, $nombre, $numero, $correo);
        return $newObject;
    }
    static function insertNuevo($conn, $rut, $idMunicipalidad, $nombre, $numero, $correo)
    {
        $sql = "INSERT INTO ciudadano(`Rut_persona`, `Id_municipalidad`, `Nombre_persona`, `Numero_persona`, `Correo_persona`, `Clave_persona`) VALUES ('$rut', '$idMunicipalidad', '$nombre', '$numero', '$correo');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($rut, $idMunicipalidad, $nombre, $numero, $correo);
        return $newObject;
    }
    static function delete($conn, $rut)
    {
        $sql = "DELETE FROM ciudadano WHERE `Rut_persona`='$rut';";
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
    function getIdmunicipalidad()
    {
        return $this->idMunicipalidad->getValue();
    }
    function setIdmunicipalidad($idMunicipalidad)
    {
        $this->idMunicipalidad->setValue($idMunicipalidad);
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
}
