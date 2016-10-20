<div class="content shortcodes">
    <div class="layout">
        <div class="row">
            <div class="row-item col-3_4">
                <?php
                    while( have_posts() ) {
                        the_post();

                        get_template_part( 'templates/blog/formats/content',get_post_format()); 
                    }
                    
                    //Pagination
                    boson_wp_paginate();
                ?>                
            </div>

            <div class="row-item col-1_4 sidebar">
                <?php dynamic_sidebar( 'primary' ); ?>
            </div>
        </div>
    </div>
</div>