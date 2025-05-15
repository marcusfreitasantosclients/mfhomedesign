<?php
function mf_cta_section($component_data){ 
    $site_img = $component_data['side_image'];
    ?>
    
    <section class="bg-light">
            <div class="row align-items-center">
                <div class="p-5 col-md-3">
                    <?php import_component('simple-text', [
                        'simple-text' => [
                            'title' => $component_data['title'],
                            'text' => $component_data['text'],
                            'cta'   => $component_data['call_to_action']
                        ]
                    ]) ?>
                </div>
                <div class="col-md-9">
                    <div class="mf_cta_section_img_wrapper">
                        <img class="" src="<?= $site_img['url'] ?>" alt="<?= $site_img['alt'] ?>" />
                    </div>
                </div>
            </div>
    </section>

<?php }