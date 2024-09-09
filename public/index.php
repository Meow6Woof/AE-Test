<?php
header('Content-Type: text/xml; charset=utf-8');

require_once '../app/classes/product.php';
require_once '../app/classes/productList.php';
require_once '../app/classes/randomGenerator.php';
require_once '../app/classes/productListGenerator.php';
require_once '../app/classes/YMLGenerator.php';

use App\ProductListGenerator;
use App\YMLGenerator;

$productListGenerator = new ProductListGenerator();
$productListGenerator->productCategoryGenerate(4);
$productListGenerator->productListGenerate(mt_rand(100, 200));

$ymlGenerator = new YMLGenerator($productListGenerator->getProductList(), 'Test Shop', 'Test Company', 'https://ae-test.ru');
$ymlGenerator->YMLGenerate();

$ymlGenerator->getFileYML('../xml/market.xml');
echo $ymlGenerator->getStringYML();
?>