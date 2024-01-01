<?php
require_once __DIR__ . '/../connexion.php';
require_once 'modelCity.php';
class CityDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_city(){
        $query = "SELECT * FROM city";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $CitiesData = $stmt->fetchAll();
        $Cities = array();
        foreach ($CitiesData as $C) {
            $Cities[] = new City($C["name_city"]);
        }
        return $Cities;

    }

    public function add_city($name_city){
        $query = "INSERT INTO city (name_city) VALUES (:name_city)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name_city', $name_city);
        $stmt->execute();
    }
    
    public function update_city($city){
        $query = "UPDATE city SET name_city=:name_city WHERE name_city=:name_city";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name_city', $city->getNamecity());
        $stmt->execute();
    }
    

    public function delete_city($city_id){
        $query = "DELETE FROM city WHERE city_id=:city_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':city_id', $city_id);
        $stmt->execute();
    }
    



}



