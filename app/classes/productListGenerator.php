<?php 
namespace App;

use App\ProductList;
use App\Product;
use stdClass;

/**
 * Product List Generator
 * 
 * @author Ivan Glibko 
 * @version 1.0
 */
class ProductListGenerator{
    private object $productList;
    private object $product;
    private object $random;
    private array $category;

    public function __construct(){
        $this->productList = new ProductList();
        $this->product = new Product();
        $this->random = new randomGenerator();
    }

    public function productCategoryGenerate(int $countCategories){
        for($i = 0; $i < $countCategories; $i++){
            $this->category[] = $this->random->randomWord(mt_rand(10, 30));
        }
        $this->productList->setProduct($this->category);
    }

    public function productListGenerate(int $countProducts){
        while($countProducts--){
            $this->product->productGenerate($this->category);
            $this->productList->setProduct($this->product->getProductObject());
        }
    }

    public function getProductList(){
        return $this->productList->getProductList();
    }
}
?>