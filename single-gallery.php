<?php get_header(); ?>
<?php
global $post;
$post_slug = $post->post_name;
$gallery_items = get_field('images');

?>
<section class="py-5">
    <div class="container">
        <div class="col-md-12">
            <?php import_component('simple-text', [
                    'simple-text' => [
                        'title' => get_the_title(),
                    ]
            ]) ?>
        </div>

        <div class="mf_gallery_container d-grid gap-1">
            <?php foreach($gallery_items as $image){ ?>
                <div class="">
                    <a href="<?= $image['url'] ?>" data-lightbox="<?= $post_slug ?>" class="mf_gallery_img_wrapper">
                        <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" />
                    </a>
                </div>
            <?php } ?>
        </div>  
    </div>
</section>




<?php get_footer(); ?>