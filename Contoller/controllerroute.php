<?php
require_once 'Model/route/RouteDAO.php';
require_once 'Model/route/ModelRoute.php';

class RouteController{
    private $routeDAO;

    public function __construct(){
        $this->routeDAO = new RouteDAO();
    }

    public function displayRoutes(){
        $routes = $this->routeDAO->get_routes();
    }

    public function addRoute($route_id, $dist, $departure_city, $destination_city, $duree){
        $route = new Route($route_id, $dist, $departure_city, $destination_city, $duree);
        $this->routeDAO->add_route($route);
    }

    public function updateRoute($route_id, $dist, $duree){
        $route = new Route($route_id, null, null, null, $duree);
        $this->routeDAO->update_route($route);
    }

    public function deleteRoute($route_id){
        $this->routeDAO->delete_route($route_id);
    }
}
?>
