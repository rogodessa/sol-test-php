<?php

if(empty($product)) return;

?>
<div class="col-12 cal-md-6 col-xl-4 mb-3">
    <div class="card" style="height: 100%">
        <h5 class="card-header"><?php echo $product['name'] ?></h5>
        <div class="card-body">
            <div class="product-content mb-3">
                <h5 class="card-title">Price: $<?php echo $product['price'] ?></h5>
                <p class="card-text">
                    Date: <?php echo date('d.m.Y', strtotime($product['date'])) ?>
                    <?php if(!empty($product['categories'])) : ?>
                        <br/>Category: <?php echo $product['categories'] ?>
                    <?php endif; ?>
                </p>
            </div>
            <button class="btn btn-outline-secondary product-modal-toggle" data-bs-toggle="modal" data-bs-target="#productModal">Buy</button>
        </div>
    </div>
</div>
