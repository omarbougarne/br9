<!-- 
include "Contoller/controllerhoraire.php" ;
$controller_horaire = new HoraireController() ; 


if (isset($_GET["action"])) {
    $action = $_GET["action"] ; 
    if ($action === "search") {
        $controller_horaire ->getTravelsBetweenCities() ; 
    }
    if ($action === "Books") {
      
    }
   

}else {
    $contoller_Books->getBooks() ;
}



 

 -->
