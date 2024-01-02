<?php
require_once 'Model/horaire/HoraireDAO.php';
require_once 'Model/horaire/ModelHoraire.php';

class HoraireController{
    private $horaireDAO;

    public function __construct(){
        $this->horaireDAO = new HoraireDAO();
    }

    public function displayHoraires(){
        $horaires = $this->horaireDAO->get_horaires();
    }

    public function addHoraire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available){
        $horaire = new Horaire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available);
        $this->horaireDAO->add_horaire($horaire);
    }

    public function updateHoraire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available){
        $horaire = new Horaire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available);
        $this->horaireDAO->update_horaire($horaire);
    }

    public function deleteHoraire($schedule_id){
        $this->horaireDAO->delete_horaire($schedule_id);
    }
    public function getTravelsBetweenCities($departureCity, $destinationCity,$horaire){
    if (isset($_POST['departure_city']) && isset($_POST['destination_city'])) {
        $departureCity = $_POST['departure_city'];
        $destinationCity = $_POST['destination_city'];

$horaireDAO = new HoraireDAO();
$travels = $horaireDAO->getTravelsBetweenCities($departureCity, $destinationCity,$horaire);
    }
}
}
?>
