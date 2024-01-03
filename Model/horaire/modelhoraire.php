<?php
class Horaire{
    private $schedule_id;
    private $bus_id;
    private $route_id;
    private $departure_date;
    private $departure_time;
    private $arrival_time;
    private $seats_available;
    // private $company_image;
    // private $bus_number;


    public function __construct($schedule_id, $bus_id, $route_id, $departure_date, $departure_time, $arrival_time, $seats_available){
        $this->schedule_id = $schedule_id;
        $this->bus_id = $bus_id;
        $this->route_id = $route_id;
        $this->departure_date = $departure_date;
        $this->departure_time = $departure_time;
        $this->arrival_time = $arrival_time;
        $this->seats_available = $seats_available;
        // $this->company_image = $company_image;
        // $this->bus_number = $bus_number;
    }

    // Add getters and setters as needed
    // ...

    public function getScheduleId(){
        return $this->schedule_id;
    }

    public function getBusId(){
        return $this->bus_id;
    }

    public function getRouteId(){
        return $this->route_id;
    }

    public function getDepartureDate(){
        return $this->departure_date;
    }

    public function getDepartureTime(){
        return $this->departure_time;
    }

    public function getArrivalTime(){
        return $this->arrival_time;
    }

    public function getSeatsAvailable(){
        return $this->seats_available;
    }
    // public function getCompanyImage(){
    //     return $this->company_image;
    // }
    // public function getBusNumber(){
    //     return $this->bus_number;
    // }
    
    
}

?>
