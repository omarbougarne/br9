<?php
require_once __DIR__ . '/../connexion.php';
require_once 'modelroute.php';

class RouteDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_routes(){
        $query = "SELECT * FROM route";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $routesData = $stmt->fetchAll();
        $routes = array();
        foreach ($routesData as $routeData) {
            $routes[] = new Route(
                $routeData["route_id"],
                $routeData["dist"],
                $routeData["departure_city"],
                $routeData["destination_city"],
                $routeData["duree"]
            );
        }
        return $routes;
    }

    public function add_route($route){
        $query = "INSERT INTO route (route_id, dist, departure_city, destination_city, duree) VALUES (:route_id, :dist, :departure_city, :destination_city, :duree)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':route_id', $route->getRouteId());
        $stmt->bindParam(':dist', $route->getDist());
        $stmt->bindParam(':departure_city', $route->getDepartureCity());
        $stmt->bindParam(':destination_city', $route->getDestinationCity());
        $stmt->bindParam(':duree', $route->getDuree());
        $stmt->execute();
    }

    public function update_route($route){
        $query = "UPDATE route SET dist=:dist, duree=:duree WHERE route_id=:route_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':dist', $route->getDist());
        $stmt->bindParam(':duree', $route->getDuree());
        $stmt->bindParam(':route_id', $route->getRouteId());
        $stmt->execute();
    }

    public function delete_route($route_id){
        $query = "DELETE FROM route WHERE route_id=:route_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':route_id', $route_id);
        $stmt->execute();
    }
}
?>
