<?php 
namespace App;

use App\ProductList;
use App\Product;
use App\RandomGenerator;
/**
 * Product List
 * 
 * @author Ivan Glibko 
 * @version 1.0
 */
class ProductList{
    private array $productList;

    public function getProductList(): array{
        return $this->productList;
    }

    public function setProduct(array|object $product){
        $this->productList[] = $product;
    }
}
?>