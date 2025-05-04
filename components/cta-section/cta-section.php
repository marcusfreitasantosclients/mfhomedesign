<?php
function mf_cta_section($component_data){ 
    $site_img = $component_data['side_image'];
    ?>
    
    <section class="bg-light">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="p-2 p-md-5">
                    <?php import_component('simple-text', [
                        'simple-text' => [
                            'title' => $component_data['title'],
                            'text' => $component_data['text'],
                            'cta'   => $component_data['call_to_action']
                        ]
                    ]) ?>
                </div>
                <div class="position-relative">
                    <div class="mf_cta_section_img_wrapper">
                        <img class="" src="<?= $site_img['url'] ?>" alt="<?= $site_img['alt'] ?>" />
                    </div>
                </div>
            </div>
    </section>

<?php }