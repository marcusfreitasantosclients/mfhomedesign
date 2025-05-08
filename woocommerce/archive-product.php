<?php get_header(); ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                filter
            </div>

            <div class="col-md-10">
                <?php if ( woocommerce_product_loop() ) : ?>
                    <div class="row g-2">
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
</section

<?php get_footer(); ?>
