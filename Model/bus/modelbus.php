<?php
class Bus{
    private $ID;
    private $bus_number;
    private $license_plate;
    private $company;
    private $capacity;
    private $fk_company;

    public function __construct($ID, $bus_number, $license_plate, $company, $capacity, $fk_company){
        $this->ID = $ID;
        $this->bus_number = $bus_number;
        $this->license_plate = $license_plate;
        $this->company = $company;
        $this->capacity = $capacity;
        $this->fk_company = $fk_company;
    }

    // Add getters and setters as needed
    // ...

    public function getID(){
        return $this->ID;
    }

    public function getBusNumber(){
        return $this->bus_number;
    }

    public function getLicensePlate(){
        return $this->license_plate;
    }

    public function getCompany(){
        return $this->company;
    }

    public function getCapacity(){
        return $this->capacity;
    }

    public function getFkCompany(){
        return $this->fk_company;
    }
}
?>
