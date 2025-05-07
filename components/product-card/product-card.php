<?php function mf_product_card($component_data){
    $product = wc_get_product($component_data);
    $site_url = site_url();
    $product_image = get_the_post_thumbnail($product->id, 'full');
    $product_terms = wp_get_post_terms($product->get_id(), 'product_cat');
    $product_cats = implode(', ', wp_list_pluck($product_terms, 'name'));    
    $currency_symbol = get_woocommerce_currency_symbol();
    ?>
        <a class="mf_product_card" href=<?= "$site_url/produto/$product->slug";?>>
            <div class="mf_product_card_cat d-flex gap-2 justify-content-center align-items-center py-3">
                <?= $product_cats ?>
            </div>

            <div class="mf_product_card_img">
                <?= $product_image; ?>
            </div>

            <div class="mf_product_card_info d-flex flex-row justify-content-between align-items-center">
                <h3>
                    <?= $product->name; ?>
                </h3>

                <span class="mf_product_card_price">
                    Startging at <?= $currency_symbol . $product->get_price(); ?>
                </span>
            </div>
        </a> 
    <?php
} ?>