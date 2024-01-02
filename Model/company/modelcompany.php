<?php
class Company{
    private $company_id;
    private $company_name;
    private $company_image;

    public function __construct($company_id, $company_name, $company_image){
        $this->company_id = $company_id;
        $this->company_name = $company_name;
        $this->company_image = $company_image;
    }

    public function getCompanyId(){
        return $this->company_id;
    }

    public function getCompanyName(){
        return $this->company_name;
    }

    public function getCompanyImage(){
        return $this->company_image;
    }
}
?>
