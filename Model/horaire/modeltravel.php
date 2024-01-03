<?php
class TravelInfo {
    private $company_image;
    private $bus_number;
    private $departure_time;

    public function __construct($company_image, $bus_number, $departure_time) {
        $this->company_image = $company_image;
        $this->bus_number = $bus_number;
        $this->departure_time = $departure_time;
    }
    
    public function getCompanyImage() {
        return $this->company_image;
    }

    public function getBusNumber() {
        return $this->bus_number;
    }

    public function getDepartureTime() {
        return $this->departure_time;
    }
}

?>