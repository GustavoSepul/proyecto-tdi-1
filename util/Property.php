<?php
class Property
{
    private $value;
    private $hasChanged;
    function __construct($value)
    {
        $this->value = $value;
        $this->hasChanged = true;
    }
    public function setValue($value)
    {
        $this->value = $value;
        $this->hasChanged = true;
    }
    public function getValue()
    {
        return $this->value;
    }
}
