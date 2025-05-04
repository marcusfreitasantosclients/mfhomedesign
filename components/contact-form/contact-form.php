<?php
function mf_contact_form($component_data){    
    $side_images = $component_data['side_images'];
    ?>
    <section class="py-5 my-5 mf_contact_form">
        <div class='container'>
            <div class='row'>
                <div class='col-md-6'>
                    <?php import_component('simple-text', [
                        'simple-text' => [
                            'title' => $component_data['title'],
                            'text' => $component_data['text'],
                        ]
                    ]) ?>

                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your name">
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Your message"></textarea>
                        </div>
                        
                        <?php
                        import_component('button', [
                            'button' => [
                                'text'     => 'Send message',
                                'url'      => '#',
                                'target'   => '_blank',
                                'type'     => 'primary',
                                'color'    => 'dark'
                            ]
                        ]); 
                        ?>
                    </form>
                </div>

                <div class='col-md-6'>
                    <div class="row">
                        <?php if(isset($side_images) && !empty($side_images)){
                            $count = 0;
                            $is_gallery = sizeof($side_images) > 1;
                            foreach($side_images as $image){ 
                                $count++;
                                ?>
                                <div class="mb-4 <?= $count == 1 ? 'col-12' : 'col-md-6' ?>">
                                    <div class="mf_contact_form_image_wrapper" style="<?= $is_gallery ? 'height: 300px' : '' ?>">
                                        <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" />                          
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }