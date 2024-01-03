<?php
require_once __DIR__ . '/../connexion.php';
require_once 'modelhoraire.php';
require_once 'modeltravel.php';
 
class HoraireDAO{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_horaires(){
        $query = "SELECT * FROM horaire";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $horairesData = $stmt->fetchAll();
        $horaires = array();
        foreach ($horairesData as $horaireData) {
            $horaires[] = new Horaire(
                $horaireData["schedule_id"],
                $horaireData["bus_id"],
                $horaireData["route_id"],
                $horaireData["departure_date"],
                $horaireData["departure_time"],
                $horaireData["arrival_time"],
                $horaireData["seats_available"]
                // $horaireData["company_image"],
                // $horaireData["bus_number"]
            );
        }
        return $horaires;
    }

    public function add_horaire($horaire){
        $query = "INSERT INTO horaire (schedule_id, bus_id, route_id, departure_date, departure_time, arrival_time, seats_available) VALUES (:schedule_id, :bus_id, :route_id, :departure_date, :departure_time, :arrival_time, :seats_available)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':schedule_id', $horaire->getScheduleId());
        $stmt->bindParam(':bus_id', $horaire->getBusId());
        $stmt->bindParam(':route_id', $horaire->getRouteId());
        $stmt->bindParam(':departure_date', $horaire->getDepartureDate());
        $stmt->bindParam(':departure_time', $horaire->getDepartureTime());
        $stmt->bindParam(':arrival_time', $horaire->getArrivalTime());
        $stmt->bindParam(':seats_available', $horaire->getSeatsAvailable());
        $stmt->execute();
    }

    public function update_horaire($horaire){
        $query = "UPDATE horaire SET bus_id=:bus_id, route_id=:route_id, departure_date=:departure_date, departure_time=:departure_time, arrival_time=:arrival_time, seats_available=:seats_available WHERE schedule_id=:schedule_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':bus_id', $horaire->getBusId());
        $stmt->bindParam(':route_id', $horaire->getRouteId());
        $stmt->bindParam(':departure_date', $horaire->getDepartureDate());
        $stmt->bindParam(':departure_time', $horaire->getDepartureTime());
        $stmt->bindParam(':arrival_time', $horaire->getArrivalTime());
        $stmt->bindParam(':seats_available', $horaire->getSeatsAvailable());
        $stmt->bindParam(':schedule_id', $horaire->getScheduleId());
        $stmt->execute();
    }

    public function delete_horaire($schedule_id){
        $query = "DELETE FROM horaire WHERE schedule_id=:schedule_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':schedule_id', $schedule_id);
        $stmt->execute();
    }
    public function getTravelsBetweenCities($departureCity, $destinationCity) {
        $query = "SELECT c.company_image, b.bus_number, h.departure_time
                  FROM horaire h
                  JOIN bus b ON h.bus_id = b.ID
                  JOIN company c ON b.fk_company = c.company_id
                  JOIN route r ON h.route_id = r.route_id
                  WHERE r.departure_city = :departureCity
                    AND r.destination_city = :destinationCity";
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':departureCity', $departureCity, PDO::PARAM_STR);
        $stmt->bindParam(':destinationCity', $destinationCity, PDO::PARAM_STR);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $travelInfo = array();
    
        foreach ($result as $row) {
            $travelInfo[] = new TravelInfo(
                $row["company_image"],
                $row["bus_number"],
                $row["departure_time"]
            );
        }
        return $travelInfo;
    }
 }
?>
