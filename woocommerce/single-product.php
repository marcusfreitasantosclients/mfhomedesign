<?php get_header(); ?>

<?php
global $product;
   
//ACFs
$header_img = get_field("banner_field");
?>

<style>
    body{
        padding: 0 !important;
    }
</style>

<?php if($header_img){ ?>
    <section class="w-100">
        <img class="img-fluid w-100" style="height: 50vh; object-fit:cover;" src="<?php echo $header_img['url']; ?>" alt="<?php echo $header_img['alt']; ?>" />
    </section>
<?php } ?>

<?php import_component("single-product", [
    "single-product" => [
        "product_id" => get_the_ID()
    ]
]) ?>

<?php get_footer(); ?>