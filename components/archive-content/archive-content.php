<?php function mf_archive_content(){ ?>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="filter_content_column">
                    
                        <h4>Filter your products</h4>
                        <?php import_component("searchform", [
                            "searchform" => []
                        ]) ?>

                        <div class="my-5">
                            <h5>Categories</h5>
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
                </div>        
            </div>
        </div>
    </section>
<?php }