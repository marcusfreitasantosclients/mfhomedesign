<?php
function mf_single_product($component_data){ 
    global $product;
    $product = new WC_product($component_data['product_id']);
    $product_data = $product->get_data();
    $attachment_ids = $product->get_gallery_image_ids();
    $product_image = get_the_post_thumbnail($product->id, 'full');
    $purchage_url = add_query_arg('add-to-cart', $product->id, wc_get_cart_url());
    $product_category_terms = wp_get_post_terms($product->get_id(), 'product_cat');
    $product_brand_terms = wp_get_post_terms($product->get_id(), 'product_brand');
    $product_cats = implode(', ', wp_list_pluck($product_category_terms, 'name'));    
    $product_brands = implode(', ', wp_list_pluck($product_brand_terms, 'name')); 
    $product_featured_img = get_the_post_thumbnail($product->id, 'full');
    $attachment_ids = $product->get_gallery_image_ids();


    ?>

    <section class="py-5 mf_single_product_section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if($attachment_ids){ ?>
                        <div class="splide w-100 position-relative mf_single_product_carousel">
                            <div class="splide__track">   
                                <div class="splide__list">
                                    <?php foreach($attachment_ids as $attachment){
                                        $product_gallery_img = wp_get_attachment_url( $attachment );
                                        ?>
                                            <div class="splide__slide rounded">
                                                <a href="<?php echo $product_gallery_img; ?>" data-lightbox="product__img_carousel">                                        
                                                    <img class="img-fluid w-100" src="<?php echo $product_gallery_img; ?>"  />
                                                </a>

                                            </div>
                                    <?php } ?>    
                                </div> 
                            </div>
                        </div>
                    <?php }else{ ?>
                        <?php echo $productImage; ?>
                    <?php } ?>
                </div>

                <div class="col-md-4">
                    <p class="mf_single_product_cat"><strong>Categories:</strong> <?php echo $product_cats; ?></p>

                    <h1 class="mf_single_product_title"><?= the_title(); ?></h1>

                    <hr />
                    <div class="mf_single_product_content">
                        <?= the_content() ?>
                    </div>

                    <hr />


                    <p class="mf_single_product_price my-3"><?php echo $product->get_price_html(); ?></p>

                    <?php
                        // Variable product dropdown
                        if ($product->is_type('variable')) {
                            wc_get_template('single-product/add-to-cart/variable.php');
                        } else {
                            wc_get_template('single-product/add-to-cart/simple.php');
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php }