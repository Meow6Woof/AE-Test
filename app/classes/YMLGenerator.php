<?php 
namespace App;

/**
 * YML Generator
 * 
 * @author Ivan Glibko 
 * @version 1.0
 */
class YMLGenerator{
    private array $categories; 
    private array $products;
    private string $yml;
    private string $nameShop;
    private string $nameCompany;
    private string $urlShop;
    
    public function __construct(array $dataProducts, $nameShop, $nameCompany, $urlShop){
        $this->nameShop = $nameShop;
        $this->nameCompany = $nameCompany;
        $this->urlShop = $urlShop;
        $this->categories = $dataProducts[0];
        $this->products = array_slice($dataProducts, 1);
    }

    public function YMLGenerate(){
        /**
         * Header YML/XML
         */
        $this->yml = '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n";
        $this->yml .= '<yml_catalog date="' . date('Y-m-d').'T'.date('H:i').'+4:00' . '">' . "\r\n";
        $this->yml .= '<shop>' . "\r\n";

        /**
         * Information about the store and company
         */
        $this->yml .= '<name> ' . $this->nameShop . ' </name>' . "\r\n";
        $this->yml .= '<company> ' . $this->nameCompany . ' </company>' . "\r\n";
        $this->yml .= '<url> ' . $this->urlShop . '</url>' . "\r\n";

        /**
         * Categries section
         */
        $this->yml .= '<categories>' . "\r\n";
        for($id = 0; $id < count($this->categories); $id++){
            $this->yml .= '<category id="' . $id . '">' . $this->categories[$id] . '</category>' . "\r\n";
        }
        $this->yml .= '</categories>' . "\r\n";

        /**
         * Products section
         */
        $this->yml .= '<offers>' . "\r\n";
        foreach ($this->products as $row) {
            $this->yml .= '<offer>' . "\r\n";
            $this->yml .= '<price>' . $row->price . '</price>' . "\r\n";
            $this->yml .= '<categoryId>' . $row->categoryId . '</categoryId>' . "\r\n";
            $this->yml .= '<picture>'. $row->picture .'</picture>' . "\r\n";
            $this->yml .= '<name>'.$row->name.'</name>' . "\r\n";  
            $this->yml .= '</offer>' . "\r\n";
        }
         
        $this->yml .= '</offers>' . "\r\n";
        $this->yml .= '</shop>' . "\r\n";
        $this->yml .= '</yml_catalog>' . "\r\n";
    }

    public function getFileYML(string $url){
        $file = fopen($url,"w");
        fwrite($file, $this->yml);
        fclose($file);
    }

    public function getStringYML(){
        return $this->yml;
    }
}
?>