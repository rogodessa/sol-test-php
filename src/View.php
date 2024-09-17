<?php

namespace Solo\TestPhp;

use Solo\TestPhp\Products;
use Solo\TestPhp\Categories;

class View
{
    public function home() {
        $this->render('home', [
            'categories' => (new Categories())->getCategories(),
            'products' => (new Products())->getProducts()
        ]);
    }

    public function render($view, $data = []){
        try {
            $this->header();

            $file = TEST_PHP_VIEWS . '/' . $view . '.php';
            if(file_exists($file)){
                extract($data);
                include $file;
            }
            else {
                include TEST_PHP_VIEWS . '/404.php';
            }

            $this->footer();
        }
        catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function header() {
        include TEST_PHP_VIEWS . '/parts/header.php';
    }

    public function footer() {
        include TEST_PHP_VIEWS . '/parts/footer.php';
    }
}