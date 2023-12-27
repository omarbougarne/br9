<?php
require_once 'Model\connexion.php';
require_once 'Model\book\modelBook.php';
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

    // public function update_book($city){
    //     $query = "UPDATE city SET name_city=$city->getNamecity()";
    //     // echo $query;
    //     $stmt = $this->db->query($query);
    //     $stmt -> execute();
    // }

    // function getBookByID($isbn) {
    //     $query = "SELECT * FROM BOOK where ISBN = $isbn";
    //     $stmt = $this->db->query($query);
    //     $stmt -> execute();
    //     $B = $stmt->fetch();
     
    //         $Book = new City($B["ISBN"],$B["Title"],$B["Genra"], $B["NbrofPages"],$B["Price"],$B["Author"]);
        
    //     return $Book;
          
    // }



}



