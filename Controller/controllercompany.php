<?php
require_once 'Model/company/CompanyDAO.php';
require_once 'Model/company/ModelCompany.php';

class CompanyController{
    private $companyDAO;

    public function __construct(){
        $this->companyDAO = new CompanyDAO();
    }

    public function displayCompanies(){
        $companies = $this->companyDAO->get_companies();
    }

    public function addCompany($company_id, $company_name, $company_image){
        $company = new Company($company_id, $company_name, $company_image);
        $this->companyDAO->add_company($company);
    }

    public function updateCompany($company_id, $company_name, $company_image){
        $company = new Company($company_id, $company_name, $company_image);
        $this->companyDAO->update_company($company);
    }

    public function deleteCompany($company_id){
        $this->companyDAO->delete_company($company_id);
    }
}
?>
