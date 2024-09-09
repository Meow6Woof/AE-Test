<?php 
namespace App;

use stdClass;
use App\RandomGenerator;

/**
 * Product
 * 
 * @author Ivan Glibko 
 * @version 1.0
 */
class Product{
    private string $name;
    private int $categoryId;
    private float $price;
    private int $count;
    private string $picture;
    private object $random;

    public function __construct(){
        $this->random = new randomGenerator();
    }

    public function productGenerate(array $category){
        $this->name = $this->random->randomWord(mt_rand(10, 30));
        $this->categoryId = mt_rand(0, count($category) - 1);
        $this->price = $this->random->randomFloat(100, 20000, 2);
        $this->count = mt_rand(0, 100);
        $this->picture = 'http://ae-test.ru/images/'.$this->random->randomWord(mt_rand(10, 50)).mt_rand(1, 1000);
    }

    public function getProductObject(): stdClass{
        $product = new stdClass();
        $product->name = $this->name;
        $product->categoryId = $this->categoryId;
        $product->price = $this->price;
        $product->count = $this->count;
        $product->picture = $this->picture;

        return $product;
    }
}
?>