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
        // You can pass $horaires to your view for display
        // (e.g., render a webpage with a list of horaires)
    }

    public function addHoraire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available){
        $horaire = new Horaire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available);
        $this->horaireDAO->add_horaire($horaire);
        // Optionally, redirect to a page or display a success message
    }

    public function updateHoraire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available){
        $horaire = new Horaire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available);
        $this->horaireDAO->update_horaire($horaire);
        // Optionally, redirect to a page or display a success message
    }

    public function deleteHoraire($schedule_id){
        $this->horaireDAO->delete_horaire($schedule_id);
        // Optionally, redirect to a page or display a success message
    }
}
?>
