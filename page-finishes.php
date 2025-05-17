<?php get_header() ?>

<?php
$product_id = "";
if(isset($_GET["product_id"])){
    $product_id = $_GET["product_id"];
}

$product = wc_get_product($product_id);

//PEGAR PRODUTO PELO ID DA URL
//PEGAR A BRAND DESSE PRODUTO
//PEGAR TODOS OS ATRIBUTOS SETADOS PRA ESSE PRODUTO
//

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
                "title" => "Marca",
                "subtitle" => $attribute_label  ,
                "image_cards" => $image_cards
            ]
        ]);
        
    }
}


?>


<?php get_footer() ?>