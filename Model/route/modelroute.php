<?php
class Route{
    private $route_id;
    private $dist;
    private $departure_city;
    private $destination_city;
    private $duree;

    public function __construct($route_id, $dist, $departure_city, $destination_city, $duree){
        $this->route_id = $route_id;
        $this->dist = $dist;
        $this->departure_city = $departure_city;
        $this->destination_city = $destination_city;
        $this->duree = $duree;
    }

    // Add getters and setters as needed
    // ...

    public function getRouteId(){
        return $this->route_id;
    }
    public function getDist(){
        return $this->dist;
    }
    public function getDepartureCity(){
        return $this->departure_city;
    }
    public function getDestinationCity(){
        return $this->destination_city;
    }
    public function getDuree(){
        return $this->duree;
    }
}
?>
