<?php
require_once __DIR__ . '/../connexion.php';
require_once  'modelcompany.php';

class CompanyDAO{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_companies(){
        $query = "SELECT * FROM company";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $companiesData = $stmt->fetchAll();
        $companies = array();
        foreach ($companiesData as $companyData) {
            $companies[] = new Company(
                $companyData["company_id"],
                $companyData["company_name"],
                $companyData["company_image"]
            );
        }
        return $companies;
    }

    public function add_company($company){
        $query = "INSERT INTO company (company_id, company_name, company_image) VALUES (:company_id, :company_name, :company_image)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':company_id', $company->getCompanyId());
        $stmt->bindParam(':company_name', $company->getCompanyName());
        $stmt->bindParam(':company_image', $company->getCompanyImage(), PDO::PARAM_LOB);
        $stmt->execute();
    }

    public function update_company($company){
        $query = "UPDATE company SET company_name=:company_name, company_image=:company_image WHERE company_id=:company_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':company_name', $company->getCompanyName());
        $stmt->bindParam(':company_image', $company->getCompanyImage(), PDO::PARAM_LOB);
        $stmt->bindParam(':company_id', $company->getCompanyId());
        $stmt->execute();
    }

    public function delete_company($company_id){
        $query = "DELETE FROM company WHERE company_id=:company_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':company_id', $company_id);
        $stmt->execute();
    }
}
?>
