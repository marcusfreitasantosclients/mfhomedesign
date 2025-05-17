<?php get_header() ?>

<section class="py-5">
    <?php
    $product_id = "";
    if(isset($_GET["product_id"])){
        $product_id = $_GET["product_id"];
        $product = wc_get_product($product_id);

        if($product){
            $brand_names = wp_get_post_terms( $product_id, 'product_brand', array( 'fields' => 'names' ) );
            $brand_name = reset( $brand_names );
    
            if ( $product && $product->is_type( 'variable' ) ) {
                $attributes = $product->get_attributes();
    
                foreach ( $attributes as $attribute_name => $attribute ) {
                
                    $image_cards = [];
                    $attribute_description = "";
                    $attribute_label = "";
    
                    if ( $attribute->is_taxonomy() ) {
                        $attribute_label = wc_attribute_label( $attribute_name );
    
                        $terms = wp_get_post_terms( $product_id, $attribute->get_name() );
                        
                        foreach ( $terms as $term ) {
                            $image_id = get_term_meta( $term->term_id, 'finish_attribute_image', true );
                            
                            $image_cards[] = [
                                "image" => [
                                    "url" => $image_id ? wp_get_attachment_url( $image_id ) : wc_placeholder_img_src(),
                                ],
                                "title" => $term->name
                            ];
                        }
    
                    } else {
                        $options = $attribute->get_options();
                        foreach ( $options as $option ) {
                            echo esc_html( $option ) . 'nope<br>';
                        }
                    }
    
                    import_component("text-with-image-cards", [
                        "text-with-image-cards" => [
                            "title" => $brand_name,
                            "subtitle" => $attribute_label  ,
                            "image_cards" => $image_cards
                        ]
                    ]);
                }
            }
        }else{ 
            status_header( 404 );
            nocache_headers();
            include( get_query_template( '404' ) );
            die();
         }
    }else{
        $components = get_field('component_select');
        if($components){
            foreach ($components as $component) {
                $component_name = $component['model'];
                import_component($component_name, $component);
            }
        }
    }
?>

</section>

<?php get_footer() ?>