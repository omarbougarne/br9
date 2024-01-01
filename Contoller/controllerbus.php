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
        // You can pass $buses to your view for display
        // (e.g., render a webpage with a list of buses)
    }

    public function addBus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company){
        $bus = new Bus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company);
        $this->busDAO->add_bus($bus);
        // Optionally, redirect to a page or display a success message
    }

    public function updateBus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company){
        $bus = new Bus($ID, $bus_number, $license_plate, $company, $capacity, $fk_company);
        $this->busDAO->update_bus($bus);
        // Optionally, redirect to a page or display a success message
    }

    public function deleteBus($bus_id){
        $this->busDAO->delete_bus($bus_id);
        // Optionally, redirect to a page or display a success message
    }
}
?>
