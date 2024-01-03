<?php
require_once __DIR__. '/../Model/horaire/horairedao.php';
require_once __DIR__. '/../Model/horaire/modelhoraire.php';


class HoraireController{
    private $horaireDAO;



    public function __construct(){
        $this->horaireDAO = new HoraireDAO();
    }
  
    public function displayHoraires(){
        $horaireDAO = new HoraireDAO();
        $horaires = $horaireDAO->get_horaires();
        include '../View/search.php';
      
    }

    public function addHoraire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available,$company_image,$bus_number){
        $horaire = new Horaire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available,$company_image,$bus_number);
        $this->horaireDAO->add_horaire($horaire);
    }

    public function updateHoraire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available,$company_image,$bus_number){
        $horaire = new Horaire($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available,$company_image,$bus_number);
        $this->horaireDAO->update_horaire($horaire);
    }

    public function deleteHoraire($schedule_id){
        $this->horaireDAO->delete_horaire($schedule_id);
    }
    public function getTravelsBetweenCities($departureCity, $destinationCity){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'search') {
            $departureCity = $_POST['departure_city'];
            $destinationCity = $_POST['destination_city'];
            $horaireDAO = new HoraireDAO();
            $travelInfo = $horaireDAO->getTravelsBetweenCities($departureCity, $destinationCity);

            include '../View/search.php';
            return $travelInfo;
        }
        }
        
        

}
?>
