<?php

$current_category = $_GET["category"] ?? 'all';

$order_array = [
    'none' => 'Order products',
    'price' => 'Cheap ones first',
    'name' => 'Alphabetically',
    'date' => 'New ones first',
];

?>
<h1 class="pt-5 mb-3">Products list</h1>
<hr>
<div class="row mt-4">
    <div class="col-12 col-md-3">
        <div class="position-relative">
            <?php if(!empty($categories)) : ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if(empty($_GET['category'])) echo 'active'; ?>" data-category="all">
                        <span class="fw-semibold">All</span>
                    </li>
                    <?php foreach ($categories as $category) : ?>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php if( $current_category == $category['id'] ) echo 'active' ?>" data-category="<?php echo $category['id'] ?>">
                            <span class="fw-semibold"><?php echo $category['name'] ?></span>
                            <span class="badge text-bg-secondary"><?php echo $category['count'] ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="categories-spinner">
                <div class="spinner-border text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-9">
        <?php if(!empty($products)) : ?>
        <div class="mb-3 w-50">
            <select class="form-select" aria-label="Order products" id="orderProducts">
                <?php
                foreach($order_array as $key => $item) {
                    $selected = '';
                    $order = $_GET['order'] ?? 'none';
                    if($order == $key) {
                        $selected = 'selected';
                    }
                    echo '<option value="'.$key.'" '. $selected .'>'.$item.'</option>';
                }
                ?>
            </select>
        </div>
        <div class="row" id="productsList">
            <?php foreach ($products as $product) : ?>
                <?php include TEST_PHP_VIEWS . '/parts/product.php'; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>


<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h1 modal-title fs-5" id="productModalLabel">Modal title</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>