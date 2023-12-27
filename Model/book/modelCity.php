
<?php 
    class City{
        private $name_city;



        public function __construct($name_city){
            $this->name_city = $name_city ;
        }
        public function getNamecity ()
        {
                return $this->name_city;
        }
}
?>