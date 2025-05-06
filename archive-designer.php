<?php get_header(); ?>

<style>
.designers_card_wrapper .mf_horizontal_card:nth-child(odd){
    flex-direction: row-reverse;
}
</style>

<section>
    <div class="container my-5">
        <h1 class="mb-4">Our designers</h1>
    
        <div class="designers_card_wrapper">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); 
                    $current_post = get_post();
                    ?>
                    <?php import_component("horizontal-card", [
                        "horizontal-card" => [
                            "title"     => $current_post->post_title,
                            "content"   => $current_post->post_content,
                            "image"     => get_the_post_thumbnail_url(get_the_ID()),
                            "link"      => [
                                "text" => "Explore products",
                                "target" => "_self",
                                "url" => get_post_permalink(get_the_ID())
                            ]
                        ]
                    ]) ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php esc_html_e('No designers found.', 'textdomain'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
