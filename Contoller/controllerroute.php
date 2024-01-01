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
        // You can pass $routes to your view for display
        // (e.g., render a webpage with a list of routes)
    }

    public function addRoute($route_id, $dist, $departure_city, $destination_city, $duree){
        $route = new Route($route_id, $dist, $departure_city, $destination_city, $duree);
        $this->routeDAO->add_route($route);
        // Optionally, redirect to a page or display a success message
    }

    public function updateRoute($route_id, $dist, $duree){
        $route = new Route($route_id, null, null, null, $duree);
        $this->routeDAO->update_route($route);
        // Optionally, redirect to a page or display a success message
    }

    public function deleteRoute($route_id){
        $this->routeDAO->delete_route($route_id);
        // Optionally, redirect to a page or display a success message
    }
}
?>
