<?php
require_once __DIR__ . '/../connexion.php';
require_once 'modelbus.php';


class BusDAO{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_buses(){
        $query = "SELECT * FROM bus";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $busesData = $stmt->fetchAll();
        $buses = array();
        foreach ($busesData as $busData) {
            $buses[] = new Bus(
                $busData["ID"],
                $busData["bus_number"],
                $busData["license_plate"],
                $busData["company"],
                $busData["capacity"],
                $busData["fk_company"]
            );
        }
        return $buses;
    }

    public function add_bus($bus){
        $query = "INSERT INTO bus (ID, bus_number, license_plate, company, capacity, fk_company) VALUES (:ID, :bus_number, :license_plate, :company, :capacity, :fk_company)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':ID', $bus->getID());
        $stmt->bindParam(':bus_number', $bus->getBusNumber());
        $stmt->bindParam(':license_plate', $bus->getLicensePlate());
        $stmt->bindParam(':company', $bus->getCompany());
        $stmt->bindParam(':capacity', $bus->getCapacity());
        $stmt->bindParam(':fk_company', $bus->getFkCompany());
        $stmt->execute();
    }

    public function update_bus($bus){
        $query = "UPDATE bus SET bus_number=:bus_number, license_plate=:license_plate, company=:company, capacity=:capacity, fk_company=:fk_company WHERE ID=:ID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':bus_number', $bus->getBusNumber());
        $stmt->bindParam(':license_plate', $bus->getLicensePlate());
        $stmt->bindParam(':company', $bus->getCompany());
        $stmt->bindParam(':capacity', $bus->getCapacity());
        $stmt->bindParam(':fk_company', $bus->getFkCompany());
        $stmt->bindParam(':ID', $bus->getID());
        $stmt->execute();
    }

    public function delete_bus($bus_id){
        $query = "DELETE FROM bus WHERE ID=:ID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':ID', $bus_id);
        $stmt->execute();
    }
}
?>
