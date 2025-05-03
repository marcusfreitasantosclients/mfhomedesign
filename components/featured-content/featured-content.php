<?php
function mf_featured_content($component_data){
    ?>
    <section class="py-5 my-5">
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'>
                    <?php import_component('simple-text', [
                        'simple-text' => [
                            'title' => $component_data['title'],
                            'text' => $component_data['text'],
                            'cta'   => $component_data['call_to_action']
                        ]
                    ]) ?>
                </div>

                <div class='col-md-8'>
                    content
                </div>
            </div>
        </div>
    </section>

<?php }