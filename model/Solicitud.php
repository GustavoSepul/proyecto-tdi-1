<?php
require_once __DIR__ . "/../util/Property.php";

class Solicitud
{
    private $codigo;
    private $codigoDep;
    private $rutPersona;
    private $tipo;
    private $descripcion;
    private $estado;
    function __construct($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado)
    {
        $this->codigo = new Property($codigo);
        $this->codigoDep = new Property($codigoDep);
        $this->rutPersona = new Property($rutPersona);
        $this->tipo = new Property($tipo);
        $this->descripcion = new Property($descripcion);
        $this->estado = new Property($estado);
    }
    static function makeFromAssocRow($row)
    {
        $codigo = $row["Codigo"];
        $codigoDep = $row["Codigo_dep"];
        $rutPersona = $row["Rut_persona"];
        $tipo = $row["Tipo_retroalimentacion"];
        $descripcion = $row["Descripcion"];
        $estado = $row["Estado_msg"];
        $newObject = new self($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado);
        return $newObject;
    }
    static function insertNuevo($conn, $codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado)
    {
        $sql = "INSERT INTO solicitud(`Codigo`, `Codigo_dep`, `Rut_persona`, `Tipo_retroalimentacion`, `Descripcion`, `Estado_msg`) VALUES ('$codigo', '$codigoDep', '$rutPersona', '$tipo', '$descripcion', '$estado');";
        $resultado = mysqli_query($conn, $sql);
        $newObject = new self($codigo, $codigoDep, $rutPersona, $tipo, $descripcion, $estado);
        return $newObject;
    }
    static function delete($conn, $codigo)
    {
        $sql = "DELETE FROM solicitud WHERE `Codigo`='$codigo';";
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
    function getCodigodep()
    {
        return $this->codigoDep->getValue();
    }
    function setCodigodep($codigoDep)
    {
        $this->codigoDep->setValue($codigoDep);
    }
    function getRutpersona()
    {
        return $this->rutPersona->getValue();
    }
    function setRutpersona($rutPersona)
    {
        $this->rutPersona->setValue($rutPersona);
    }
    function getTipo()
    {
        return $this->tipo->getValue();
    }
    function setTipo($tipo)
    {
        $this->tipo->setValue($tipo);
    }
    function getDescripcion()
    {
        return $this->descripcion->getValue();
    }
    function setDescripcion($descripcion)
    {
        $this->descripcion->setValue($descripcion);
    }
    function getEstado()
    {
        return $this->estado->getValue();
    }
    function setEstado($estado)
    {
        $this->estado->setValue($estado);
    }
}
