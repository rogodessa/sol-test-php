<?php

namespace Solo\TestPhp;

use Solo\TestPhp\Products;

class Ajax
{
    public function __construct()
    {
        if($_REQUEST['ajax'] === 'products') {
            $this->productsFilter();
        }
    }

    private function productsFilter() {

        $products = (new Products())->getProducts();

        $html = '';

        if(!empty($products)) {
            ob_start();
            foreach($products as $product) {
                include TEST_PHP_VIEWS . '/parts/product.php';
            }
            $html = ob_get_clean();
        }
        else {
            $html = '<div class="col-12">No products found</div>';
        }

        echo json_encode([
            'html' => $html
        ]);
        exit();
    }
}