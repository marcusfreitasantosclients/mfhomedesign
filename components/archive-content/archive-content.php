<?php function mf_archive_content(){ 
    $product_categories = get_product_categories();
    $product_brands = get_product_brands(); 
    $product_designers = get_filtered_content(["post_type" => "designer"]);
    $queried_object = get_queried_object();
    ?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="filter_content_column">
                    
                        <h4>Filter your products</h4>
                        <?php import_component("searchform", [
                            "searchform" => []
                        ]) ?>

                        <hr/>

                        <div class="">
                            <h5>Categories</h5>

                            <div class="filter_content_categories d-flex flex-column">
                                <?php foreach($product_categories as $product_cat){ ?>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" id="<?= $product_cat->name ?>" name="<?= $product_cat->name ?>" value="<?= $product_cat->slug ?>" <?= $queried_object->name == $product_cat->name ? 'checked' : '' ?>>
                                        <label for="<?= $product_cat->name ?>"> <?= $product_cat->name ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <hr/>

                        <div class="">
                            <h5>Brands</h5>

                            <div class="filter_content_brands d-flex flex-column">
                                <?php foreach($product_brands as $product_brand){ ?>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" id="<?= $product_brand->name ?>" name="<?= $product_brand->name ?>" value="<?= $product_brand->slug ?>">
                                        <label for="<?= $product_brand->name ?>"> <?= $product_brand->name ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <hr/>

                        <div class="mb-5">
                            <h5>Designers</h5>

                            <div class="filter_content_designers d-flex flex-column">
                                <?php foreach($product_designers->posts as $designer){ ?>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" id="<?= $designer->post_title ?>" name="<?= $designer->post_title ?>" value="<?= $designer->ID ?>">
                                        <label for="<?= $designer->post_title ?>"> <?= $designer->post_title ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <?php
                        import_component('button', [
                            'button' => [
                                'text'     => 'Filter',
                                'type'     => 'primary',
                                'color'    => 'dark'
                            ]
                        ]);
                        ?>
                    </div>
                </div>

                <div class="col-md-9 position-relative">
                    <?php import_component('loading-spinner', []); ?>

                    <?php if ( woocommerce_product_loop() ) : ?>
                        <div class="row g-2 filtered_content">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-md-3">
                                <?php
                                    import_component('product-card', [
                                        'product-card' => get_the_ID(),
                                    ]);
                                ?>                                
                            </div>
                        <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <?php do_action( 'woocommerce_no_products_found' ); ?>
                    <?php endif; ?>

                    <?php import_component("post-pagination", [
                        "post-pagination" => []
                    ])?>
                </div>        
            </div>
        </div>
    </section>
<?php }