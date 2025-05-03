<?php
function mf_cards_side_img($component_data){
    ?>
    <section class='py-5 bg-light'>
        <div class='container'>
            <div class='row align-items-center'>
                <div class='col-md-6'>
                    <?php import_component('simple-text', [
                        'simple-text' => [
                            'title' => $component_data['title'],
                            'text' => $component_data['text'],
                        ]
                    ]) ?>

                    <?php if(is_array($component_data['cards']) && !empty($component_data['cards'])){ ?>
                        <div class="row">
                            <?php foreach($component_data['cards'] as $icon_card){ ?>
                                <div class="col-md-6 my-3">
                                    <div class="mf_cards_side_img_icon_card d-flex flex-column gap-2">
                                        <div class="position-relative" style="width: 40px">
                                            <img width="40px" class='img-fluid position-relative' src="<?= $icon_card['icon'] ?>" alt="<?= $icon_card['title'] ?>"  />
                                            <div class="mf_cards_side_img_icon_bg_element"></div>
                                        </div>
                                        <h3><?= $icon_card['title'] ?></h3>
                                        <p><?= $icon_card['text'] ?></p> 
                                    </div>                   
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div class='col-md-6'>
                    <div class='mf_cards_side_img'>                    
                        <img class="img-fluid" src="<?= $component_data['side_image']['url'] ?>" alt="<?= $component_data['side_image']['alt'] ?>"  />
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }