<?php

class ProductModel
{
    // Thuoc tinh cua lop ProductModel
    private $ID;
    private $Name;
    private $Description;
    private $Price;

    // Constructor de khoi tao doi tuong ProductModel
    public function __construct($ID, $Name, $Description, $Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
    }

    // Getter va Setter cho thuoc tinh ID
    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    // Getter va Setter cho thuoc tinh Name
    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    // Getter va Setter cho thuoc tinh Description
    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    // Getter va Setter cho thuoc tinh Price
    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
} // End of class ProductModel

?>