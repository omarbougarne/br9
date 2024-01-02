<?php
require_once 'Model/bus/BusDAO.php';
require_once 'Model/bus/ModelBus.php';

class BusController{
    private $busDAO;

    public function __construct(){
        $this->busDAO = new BusDAO();
    }

    public function displayBuses(){
        $buses = $this->busDAO->get_buses();
    }

    public function addBus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company){
        $bus = new Bus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company);
        $this->busDAO->add_bus($bus);
    }

    public function updateBus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company){
        $bus = new Bus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company);
        $this->busDAO->update_bus($bus);
    }

    public function deleteBus($bus_id){
        $this->busDAO->delete_bus($bus_id);
    }
}
?>
