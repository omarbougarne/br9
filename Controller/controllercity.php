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
    }

    public function addCity($name_city){
        $city = new City($name_city);
        $this->cityDAO->add_city($city);
    }

    public function updateCity($city_id, $name_city){
        $city = new City($name_city);
        $this->cityDAO->update_city($city);
    }

    public function deleteCity($city_id){
        $this->cityDAO->delete_city($city_id);
    }
}
?>
