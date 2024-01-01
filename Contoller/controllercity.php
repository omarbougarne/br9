<?php
require_once 'Model/city/CityDAO.php';
require_once 'Model/city/ModelCity.php';

class CityController{
    private $cityDAO;

    public function __construct(){
        $this->cityDAO = new CityDAO();
    }

    public function displayCities(){
        $cities = $this->cityDAO->get_city();
        // You can pass $cities to your view for display
        // (e.g., render a webpage with a list of cities)
    }

    public function addCity($name_city){
        $city = new City($name_city);
        $this->cityDAO->add_city($city);
        // Optionally, redirect to a page or display a success message
    }

    public function updateCity($city_id, $name_city){
        $city = new City($name_city);
        // Optionally, set the city ID if you have an ID property in your City class
        // $city->setId($city_id);
        $this->cityDAO->update_city($city);
        // Optionally, redirect to a page or display a success message
    }

    public function deleteCity($city_id){
        $this->cityDAO->delete_city($city_id);
        // Optionally, redirect to a page or display a success message
    }
}
?>
