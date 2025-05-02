<?php 
    function mf_searchform($component_data){ ?>
        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
            <div class="input-group align-items-center">
                <input type="text" placeholder="Pesquisar" aria-label="Recipient's username" aria-describedby="button-addon2" name="s" id="s">
                <box-icon name='search' color="var(--primary_color_dark)" ></box-icon>
             </div>
        </form>
    <?php }
?>

