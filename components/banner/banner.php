<?php

function mf_banner($component_data){   

    function set_banner_background($banner_item){
        $banner_background = "";
        $background_color = $banner_item['background_color'];
        $background_image = $banner_item['background_img'];
        $background_video = $banner_item['background_video'];

        switch($banner_item['background']){
            case "color":
                $banner_background = "background: $background_color";
                break;
            case "image":
                $banner_background = "background: url($background_image)";
                break;
            default:
                $banner_background = "background: var(--light_gray_color)";
        }

        return $banner_background;
    }
    ?>
    <section class="splide mf_banner">
        <div class="splide__track">
            <div class="splide__list">
                <?php foreach($component_data as $banner_item){ ?>
                    <div class="splide__slide d-flex align-items-center" style="<?= set_banner_background($banner_item); ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2><?= $banner_item['title']; ?></h2>
                                    <p><?= $banner_item['text']; ?></p>
                                    
                                    <?php 
                                    import_component('button', [
                                        'button' => [
                                            'text'     => $banner_item['button_text'],
                                            'url'      => $banner_item['button_url'],
                                            'target'   => '_blank',
                                            'type'     => 'primary',
                                            'color'    => $banner_item['button_type']
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }