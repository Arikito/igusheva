<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function passionate_widgets_init() {

    // Register Right Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Right Sidebar', 'passionate' ),
        'id'            => 'dt-right-sidebar',
        'description'   => __( 'Add widgets to Show widgets at right panel of page', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Left Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Left Sidebar', 'passionate' ),
        'id'            => 'dt-left-sidebar',
        'description'   => __( 'Add widgets to Show widgets at Left panel of page', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register sidebar for top social icons
    register_sidebar( array(
        'name'          => esc_html__( 'Top Bar Social', 'passionate' ),
        'id'            => 'dt-top-bar-social',
        'description'   => __( 'Top Bar Search social icons ', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register sidebar for Top Search
    register_sidebar( array(
        'name'          => esc_html__( 'Top Bar Search', 'passionate' ),
        'id'            => 'dt-top-bar-search',
        'description'   => __( 'Top Bar Search Position ', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Image Slider
    register_sidebar( array(
        'name'          => esc_html__( 'Image Slider', 'passionate' ),
        'id'            => 'dt-image-slider',
        'description'   => __( 'Add Image slider widget to show at Frontpage ', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register front page sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Front Page: Widgets', 'passionate' ),
        'id'            => 'dt-front-page-widgets',
        'description'   => __( 'Add widgets to show at Frontpage', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 1
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Position 1', 'passionate' ),
        'id'            => 'dt-footer1',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 1', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 2
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Position 2', 'passionate' ),
        'id'            => 'dt-footer2',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 2', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 3
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Position 3', 'passionate' ),
        'id'            => 'dt-footer3',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 3', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 4
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Position 4', 'passionate' ),
        'id'            => 'dt-footer4',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 4', 'passionate' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'passionate_widgets_init' );

/**
 * Enqueue Admin Scripts
 */
function passionate_media_script( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }

    // Update CSS within in Admin
    wp_enqueue_style( 'passionate-widgets', get_template_directory_uri() . '/inc/widgets/widgets.css' );

    wp_enqueue_media();
    wp_enqueue_script( 'passionate-widgets', get_template_directory_uri() . '/inc/widgets/widgets.js', array( 'jquery' ), '', true );

}
add_action( 'admin_enqueue_scripts', 'passionate_media_script' );

/**
 * Social Icons widget.
 */
class passionate_social_icons extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_social_icons',
            __( 'Daisy: Social Icons', 'passionate' ),
            array(
                'description'   => __( 'Social Icons', 'passionate' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title      = isset( $instance['title'] ) ? $instance['title'] : '';
        $facebook   = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter    = isset( $instance['twitter'] ) ? $instance['twitter'] : '';
        $g_plus     = isset( $instance['g-plus' ] ) ? $instance['g-plus'] : '';
        $instagram  = isset( $instance['instagram'] ) ? $instance['instagram'] : '';
        $github     = isset( $instance['github'] ) ? $instance['github'] : '';
        $flickr     = isset( $instance['flickr'] ) ? $instance['flickr'] : '';
        $pinterest  = isset( $instance['pinterest'] ) ? $instance['pinterest'] : '';
        $wordpress  = isset( $instance['wordpress'] ) ? $instance['wordpress'] : '';
        $youtube    = isset( $instance['youtube'] ) ? $instance['youtube'] : '';
        $vimeo      = isset( $instance['vimeo'] ) ? $instance['vimeo'] : '';
        $linkedin   = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '';
        $behance    = isset( $instance['behance'] ) ? $instance['behance'] : '';
        $dribbble   = isset( $instance['dribbble'] ) ? $instance['dribbble'] : '';

        ?>

        <aside class="widget dt-social-icons">
            <?php if( ! empty( $title ) ) { ?><h2 class="widget-title"><?php echo esc_attr( $title ); ?></h2><?php } ?>

            <ul>
                <?php if( ! empty( $facebook ) ) { ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $twitter ) ) { ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $g_plus ) ) { ?>
                    <li><a href="<?php echo esc_url( $g_plus ); ?>" target="_blank"><i class="fa fa-google-plus transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $instagram ) ) { ?>
                    <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $github ) ) { ?>
                    <li><a href="<?php echo esc_url( $github ); ?>" target="_blank"><i class="fa fa-github transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $flickr ) ) { ?>
                    <li><a href="<?php echo esc_url( $flickr ); ?>" target="_blank"><i class="fa fa-flickr transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $pinterest ) ) { ?>
                    <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fa fa-pinterest transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $wordpress ) ) { ?>
                    <li><a href="<?php echo esc_url( $wordpress ); ?>" target="_blank"><i class="fa fa-wordpress transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $youtube ) ) { ?>
                    <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fa fa-youtube transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $vimeo ) ) { ?>
                    <li><a href="<?php echo esc_url( $vimeo ); ?>" target="_blank"><i class="fa fa-vimeo transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $linkedin ) ) { ?>
                    <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $behance ) ) { ?>
                    <li><a href="<?php echo esc_url( $behance ); ?>" target="_blank"><i class="fa fa-behance transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $dribbble ) ) { ?>
                    <li><a href="<?php echo esc_url( $dribbble ); ?>" target="_blank"><i class="fa fa-dribbble transition35"></i></a> </li>
                <?php } ?>

                <div class="clearfix"></div>
            </ul>
        </aside>

        <?php

    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'             => '',
                'facebook'          => '',
                'twitter'           => '',
                'g-plus'            => '',
                'instagram'         => '',
                'github'            => '',
                'flickr'            => '',
                'pinterest'         => '',
                'wordpress'         => '',
                'youtube'           => '',
                'vimeo'             => '',
                'linkedin'          => '',
                'behance'           => '',
                'dribbble'          => ''
            )
        );

        ?>

        <div class="dt-social-icons">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Title', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" placeholder="<?php _e( 'https://www.facebook.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" placeholder="<?php _e( 'https://twitter.com/', 'passionate' ); ?>" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'g-plus' ); ?>"><?php _e( 'G plus', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'g-plus' ); ?>" name="<?php echo $this->get_field_name( 'g-plus' ); ?>" value="<?php echo esc_attr( $instance['g-plus'] ); ?>" placeholder="<?php _e( 'https://plus.google.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" placeholder="<?php _e( 'https://instagram.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'Github', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo esc_attr( $instance['github'] ); ?>" placeholder="<?php _e( 'https://github.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" placeholder="<?php _e( 'https://www.flickr.com/"', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" placeholder="<?php _e( 'https://www.pinterest.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e( 'WordPress', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" value="<?php echo esc_attr( $instance['wordpress'] ); ?>" placeholder="<?php _e( 'https://wordpress.org/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" placeholder="<?php _e( 'https://www.youtube.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" placeholder="<?php _e( 'https://vimeo.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" placeholder="<?php _e( 'https://linkedin.com', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'Behance', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo esc_attr( $instance['behance'] ); ?>" placeholder="<?php _e( 'https://www.behance.net/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble', 'passionate' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo esc_attr( $instance['dribbble'] ); ?>" placeholder="<?php _e( 'https://dribbble.com/', 'passionate' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
        </div><!-- .dt-social-icons -->

        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance              = $old_instance;
        $instance['title']     = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['facebook']  = strip_tags( stripslashes( $new_instance['facebook'] ) );
        $instance['twitter']   = strip_tags( stripslashes( $new_instance['twitter'] ) );
        $instance['g-plus']    = strip_tags( stripslashes( $new_instance['g-plus'] ) );
        $instance['instagram'] = strip_tags( stripslashes( $new_instance['instagram'] ) );
        $instance['github']    = strip_tags( stripslashes( $new_instance['github'] ) );
        $instance['flickr']    = strip_tags( stripslashes( $new_instance['flickr'] ) );
        $instance['pinterest'] = strip_tags( stripslashes( $new_instance['pinterest'] ) );
        $instance['wordpress'] = strip_tags( stripslashes( $new_instance['wordpress'] ) );
        $instance['youtube']   = strip_tags( stripslashes( $new_instance['youtube'] ) );
        $instance['vimeo']     = strip_tags( stripslashes( $new_instance['vimeo'] ) );
        $instance['linkedin']  = strip_tags( stripslashes( $new_instance['linkedin'] ) );
        $instance['behance']   = strip_tags( stripslashes( $new_instance['behance'] ) );
        $instance['dribbble']  = strip_tags( stripslashes( $new_instance['dribbble'] ) );
        return $instance;

    }

}

/**
 * Image Slider.
 */
class passionate_image_slider extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_image_slider',
            __( 'Daisy: Image Slider', 'passionate' ),
            array(
                'description'   => __( 'Adds Images for Banner Slider', 'passionate' )
            )
        );
    }

    public function widget( $args, $instance ) {

        $dt_img_slider_values = isset( $instance['dt_img_slider'] ) ? $instance['dt_img_slider'] : '';

        ?>

        <div class="widget dt-image-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php if( is_array( $dt_img_slider_values ) ) { ?>

                    <?php foreach ( $dt_img_slider_values as $dt_img_slider_key => $dt_img_slider_value ) : ?>

                        <div class="swiper-slide">
                            <div class="dt-image-slider-holder">
                                <figure class="dt-slider-img">
                                    <a href="<?php echo esc_url( $dt_img_slider_value['url'] ); ?>"><img src="<?php echo esc_url( $dt_img_slider_value['image'] ); ?>" alt="<?php echo esc_attr( $dt_img_slider_value['title'] ); ?>" /></a>

                                    <?php if( $dt_img_slider_value['title'] != '' ) : ?>

                                        <div class="dt-image-slider-desc">
                                            <h2><?php echo esc_attr( $dt_img_slider_value['title'] ); ?></h2>

                                            <?php if( $dt_img_slider_value['description'] != '' ) : ?>

                                                <p><?php echo esc_textarea( $dt_img_slider_value['description'] ); ?></p>

                                            <?php endif; ?>
                                        </div><!-- .dt-image-slider-desc -->

                                    <?php endif; ?>

                                </figure><!-- .dt-featured-post-img -->
                            </div><!-- .dt-image-slider-holder -->
                        </div><!-- .swiper-slide -->

                   <?php endforeach; ?>

                    <?php } ?>

                </div><!-- .swiper-wrapper -->

                <!-- Add Arrows -->
                <div class="swiper-button-next transition5"><i class="fa fa-angle-right"></i></div>
                <div class="swiper-button-prev transition5"><i class="fa fa-angle-left"></i></div>
            </div><!-- .swiper-container -->
        </div>

        <?php

    }

    public function form( $instance ) {

        $dt_img_slider_values = isset( $instance['dt_img_slider'] ) ? $instance['dt_img_slider'] : '';
        if ( ! empty( $dt_img_slider_values ) ) {
            foreach ( $dt_img_slider_values as $dt_img_slider_key => $dt_img_slider_value ) { ?>

                <div class="dt-admin-slider-wrap">
                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_key; ?>"><?php _e( 'Image:', 'passionate' ); ?></label>
                        <img src="<?php if ( ! empty( $dt_img_slider_value['image'] ) ) { echo esc_url( $dt_img_slider_value['image'] ); } ?>" />
                        <input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_key; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_key ); ?>][image]" value="<?php echo esc_url( $dt_img_slider_value['image'] ); ?>" />
                        <input type="button" class="dt-logo-upload" id="custom_media_button" value="<?php _e( 'Select Image', 'passionate' ); ?>" />
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider').$dt_img_slider_key; ?>"><?php _e( 'Title:', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_img_slider').$dt_img_slider_key; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_key ); ?>][title]" value="<?php echo esc_attr( $dt_img_slider_value['title'] ); ?>" placeholder="<?php _e( 'Title', 'passionate' ); ?>">
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_key; ?>"><?php _e( 'Description:', 'passionate' ); ?></label>
                        <textarea id="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_key; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_key ); ?>][description]" placeholder="<?php _e( 'Some description ...', 'passionate' ); ?>" rows="2"><?php echo esc_attr( $dt_img_slider_value['description'] ); ?></textarea>
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_key; ?>"><?php _e( 'Link:', 'passionate' ); ?></label>
                        <input type="url" id="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_key; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_key ); ?>][url]" value="<?php echo esc_attr( $dt_img_slider_value['url'] ); ?>" placeholder="<?php _e( 'URL', 'passionate' ); ?>" >
                    </div><!-- .dt-admin-input-wrap -->
                </div><!-- .dt-admin-slider-wrap -->

            <?php }

        } else {
            for ( $dt_img_slider_counter = 0; $dt_img_slider_counter < 4; $dt_img_slider_counter++ ) { ?>

                <div class="dt-admin-slider-wrap">
                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_counter; ?>"><?php _e( 'Image', 'passionate' ); ?></label>
                        <img src="<?php if ( ! empty( $dt_img_slider_value['image'] ) ) { echo esc_url( $dt_img_slider_value['image'] ); } ?>" />
                        <input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_counter; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_counter ); ?>][image]" value="" />
                        <input type="button" class="dt-logo-upload" id="custom_media_button" value="<?php _e( 'Select Image', 'passionate' ); ?>" />
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider').$dt_img_slider_counter; ?>"><?php _e( 'Title', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_img_slider').$dt_img_slider_counter; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_counter ); ?>][title]" value="" placeholder="<?php _e( 'Title', 'passionate' ); ?>">
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_counter; ?>"><?php _e( 'Description', 'passionate' ); ?></label>
                        <textarea id="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_counter; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_counter ); ?>][description]" placeholder="<?php _e( 'Some description ...', 'passionate' ); ?>" rows="2"></textarea>
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_counter; ?>"><?php _e( 'Link', 'passionate' ); ?></label>
                        <input type="url" id="<?php echo $this->get_field_id( 'dt_img_slider' ).$dt_img_slider_counter; ?>" name="<?php echo $this->get_field_name( 'dt_img_slider' ); ?>[<?php echo esc_attr( $dt_img_slider_counter ); ?>][url]" value="" placeholder="<?php _e( 'URL', 'passionate' ); ?>" >
                    </div><!-- .dt-admin-input-wrap -->
                </div><!-- .dt-admin-slider-wrap -->

            <?php }
        }
    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        $instance['dt_img_slider'] = array();

        if ( isset( $new_instance[ 'dt_img_slider' ] ) ) {
            foreach ( $new_instance[ 'dt_img_slider' ] as $stream_source ) {
                $instance[ 'dt_img_slider' ][] = $stream_source;
            }
        }

        return $instance;
    }

}

/**
 * Services
 */
class passionate_services extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_services',
            __( 'Daisy: Services', 'passionate' ),
            array(
                'description'   => __( 'Show Service pages with shot description and featured image', 'passionate' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title              = isset( $instance['title'] ) ? $instance['title'] : '';
        $dt_description     = isset( $instance['description'] ) ? esc_textarea( $instance['description'] ) : '';
        $dt_service_page    = isset( $instance['dt_service_page'] ) ? $instance['dt_service_page'] : '';
        ?>

        <div class="widget dt-services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="dt-services-meta">
                            <?php if( ! empty( $title ) ) : ?><h2><?php echo esc_attr( $title ); ?><span></span></h2><?php endif; ?>
                            <?php if( ! empty( $dt_description ) ) : ?><p><?php echo esc_attr( $dt_description ); ?></p><?php endif; ?>
                        </div><!-- .dt-services-meta -->

                        <div class="dt-services-wrap">

                            <?php foreach ( $dt_service_page as $dt_service_page_key => $dt_service_page_value ) :
                                $dt_service_page_id = esc_attr( $dt_service_page_value['page'] ); ?>

                                <div class="dt-services-holder">
                                    <figure>
                                        <a href="<?php echo esc_url( get_the_permalink( $dt_service_page_id ) ); ?>">

                                            <?php
                                            $dt_service_page_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $dt_service_page_id ), 'passionate-service-img' );
                                            $dt_service_page_thumbnail_url = $dt_service_page_thumbnail_src[0];
                                            ?>

                                            <img src="<?php echo esc_url( $dt_service_page_thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title( $dt_service_page_id ) ); ?>">
                                        </a>
                                    </figure>

                                    <h3><a href="<?php echo esc_url( get_the_permalink( $dt_service_page_id ) ); ?>"><?php echo esc_attr( get_the_title( $dt_service_page_id ) ); ?></a></h3>

                                    <?php
                                        $dt_service_post = get_post( $dt_service_page_id );
                                        $dt_service_page_content = apply_filters( 'the_content', $dt_service_post->post_content );
                                        $postOutput = preg_replace( '/<img[^>]+./','', $dt_service_page_content );

                                        $dt_service_page_trimmed_content = wp_trim_words( $postOutput, 16, '...' );
                                    ?>

                                    <p><?php echo esc_attr( $dt_service_page_trimmed_content ); ?></p>

                                    <div class="dt-service-more">
                                        <a href="<?php echo esc_url( get_the_permalink( $dt_service_page_id ) ); ?>"><?php _e( 'Read More', 'passionate' ); ?></a>
                                    </div><!--.dt-service-more -->
                                </div><!-- .dt-services-holder -->

                            <?php endforeach; ?>

                            <div class="clearfix"></div>
                        </div><!-- .dt-services-wrap -->
                    </div><!-- .col-lg-12 .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div>

        <?php
    }

    public function form( $instance ) {

        $dt_title           = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $dt_description     = isset( $instance['description'] ) ? esc_textarea( $instance['description'] ) : '';
        ?>

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'passionate' ); ?></label>
            <input type="url" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $dt_title; ?>" placeholder="<?php _e( 'Title', 'passionate' ); ?>" >
        </div><!-- .dt-admin-input-wrap -->

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description', 'passionate' ); ?></label>
            <textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" placeholder="<?php _e( 'Some Description...', 'passionate' ); ?>" ><?php echo esc_attr( $dt_description ); ?></textarea>
        </div><!-- .dt-admin-input-wrap -->

        <?php
        $dt_service_page = isset( $instance['dt_service_page'] ) ? $instance['dt_service_page'] : '';
        if ( ! empty( $dt_service_page ) ) {
            foreach ( $dt_service_page as $dt_service_page_key => $dt_service_page_value ) { ?>

                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_service_page' ).$dt_service_page_key; ?>"><?php _e( 'Select Page', 'passionate' ); ?></label>

                    <?php
                        $arg = array(
                            'name' => $this->get_field_name( "dt_service_page" ).'['.esc_attr( $dt_service_page_key ).'][page]',
                            'id'   => $this->get_field_id( "dt_service_page" ).$dt_service_page_key,
                            'selected' => $dt_service_page_value['page'],
                        );
                    ?>
                    <?php wp_dropdown_pages( $arg ); ?>

                </div><!-- .dt-admin-input-wrap -->

            <?php }

        } else {
            for ( $dt_service_counter = 0; $dt_service_counter < 6; $dt_service_counter++ ) { ?>

                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_service_page' ).$dt_service_counter; ?>"><?php _e( 'Select Page', 'passionate' ); ?></label>

                    <?php
                        $arg = array(
                            'name' => $this->get_field_name( "dt_service_page" ).'['.esc_attr( $dt_service_counter ).'][page]',
                            'id'   => $this->get_field_id( "dt_service_page" ).$dt_service_counter,
                        );
                    ?>
                    <?php wp_dropdown_pages( $arg ); ?>

                </div><!-- .dt-admin-input-wrap -->

            <?php }
        }
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title']              = ( ! empty( $new_instance['title'] ) ) ? wp_kses( $new_instance['title'] ) : '';
        $instance['description']        = ( ! empty( $new_instance['description'] ) ) ? wp_kses( $new_instance['description'] ) : '';
        $instance['dt_service_page']    = array();

        if ( isset( $new_instance['dt_service_page'] ) ) {
            foreach ( $new_instance['dt_service_page'] as $stream_source ) {
                $instance['dt_service_page'][] = $stream_source;
            }
        }
        return $instance;
    }

}

/**
 * Recent Works.
 */
class passionate_recent_works extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_recent_works',
            __( 'Daisy: Recent Works', 'passionate' ),
            array(
                'description'   => __( 'Recent Works Widget', 'passionate' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title                  = isset( $instance['title'] ) ? $instance['title'] : '';
        $dt_description         = isset( $instance['description'] ) ? esc_textarea( $instance['description'] ) : '';
        $dt_recent_works_page   = isset( $instance['dt_recent_works_page'] ) ? $instance['dt_recent_works_page'] : '';

        ?>

        <div class="widget dt-recent-works">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="dt-works-meta">
                            <?php if( ! empty( $title ) ) : ?><h2><?php echo esc_attr( $title ); ?><span></span></h2><?php endif; ?>
                            <?php if( ! empty( $dt_description ) ) : ?><p><?php echo esc_attr( $dt_description ); ?></p><?php endif; ?>
                        </div>

                        <div class="dt-works-wrap">

                            <?php foreach ( $dt_recent_works_page as $dt_work_page_key => $dt_recent_works_page_value ) :
                                $dt_work_page_id = esc_attr( $dt_recent_works_page_value['page'] ); ?>

                                <div class="dt-works-holder">
                                    <figure>
                                        <?php
                                            $dt_work_page_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $dt_work_page_id ), 'passionate-works-img' );
                                            $dt_work_page_thumbnail_url = $dt_work_page_thumbnail_src[0];
                                        ?>

                                        <img src="<?php echo esc_url( $dt_work_page_thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title( $dt_work_page_id ) ); ?>">

                                        <div class="dt-works-desc transition5">
                                            <div class="dt-work-ttl transition5">
                                                <h3><?php echo esc_attr( get_the_title( $dt_work_page_id ) ); ?></h3>

                                                <a href="<?php echo esc_url( get_the_permalink( $dt_work_page_id ) ); ?>"><?php _e( 'Views Details', 'passionate' ); ?></a>
                                            </div>
                                        </div><!-- .dt-works-desc -->
                                    </figure>
                                </div><!-- .dt-works-holder -->

                            <?php endforeach; ?>

                            <div class="clearfix"></div>
                        </div><!-- .dt-works-wrap -->
                    </div><!-- .col-lg-12 .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div>

        <?php
    }

    public function form( $instance ) {

        $dt_title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $dt_description = isset( $instance['description'] ) ? esc_textarea( $instance['description'] ) : '';
        ?>

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'passionate' ); ?></label>
            <input type="url" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $dt_title; ?>" placeholder="<?php _e( 'Title', 'passionate' ); ?>" >
        </div><!-- .dt-admin-input-wrap -->

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description', 'passionate' ); ?></label>
            <textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" placeholder="<?php _e( 'Some Description...', 'passionate' ); ?>" ><?php echo esc_textarea( $dt_description ); ?></textarea>
        </div><!-- .dt-admin-input-wrap -->

        <?php
        $dt_recent_works_page = isset( $instance['dt_recent_works_page'] ) ? $instance['dt_recent_works_page'] : '';
        if ( ! empty( $dt_recent_works_page ) ) {
            foreach ( $dt_recent_works_page as $dt_recent_works_page_key => $dt_recent_works_page_value ) { ?>

                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_recent_works_page' ).$dt_recent_works_page_key; ?>"><?php _e( 'Select Page', 'passionate' ); ?></label>

                    <?php
                        $arg = array(
                            'name' => $this->get_field_name( "dt_recent_works_page" ).'['.esc_attr( $dt_recent_works_page_key ).'][page]',
                            'id'   => $this->get_field_id( "dt_recent_works_page" ).$dt_recent_works_page_key,
                            'selected' => $dt_recent_works_page_value['page'],
                        );
                    ?>
                    <?php wp_dropdown_pages( $arg ); ?>

                </div><!-- .dt-admin-input-wrap -->

            <?php }

        } else {
            for ( $dt_recent_works_counter = 0; $dt_recent_works_counter < 6; $dt_recent_works_counter++ ) { ?>

                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_recent_works_page' ).$dt_recent_works_counter; ?>"><?php _e( 'Select Page', 'passionate' ); ?></label>

                    <?php
                        $arg = array(
                            'name' => $this->get_field_name( "dt_recent_works_page" ).'['.esc_attr( $dt_recent_works_counter ).'][page]',
                            'id'   => $this->get_field_id( "dt_recent_works_page" ).$dt_recent_works_counter,
                        );
                    ?>
                    <?php wp_dropdown_pages( $arg ); ?>

                </div><!-- .dt-admin-input-wrap -->

            <?php }
        }
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title']                  = ( ! empty( $new_instance['title'] ) ) ? wp_kses( $new_instance['title'] ) : '';
        $instance['description']            = ( ! empty( $new_instance['description'] ) ) ? wp_kses( $new_instance['description'] ) : '';
        $instance['dt_recent_works_page']   = array();

        if ( isset( $new_instance['dt_recent_works_page'] ) ) {
            foreach ( $new_instance['dt_recent_works_page'] as $stream_source ) {
                $instance['dt_recent_works_page'][] = $stream_source;
            }
        }
        return $instance;
    }

}

/**
 * Call to Action
 */
class passionate_call_to_action extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_call_to_action',
            __( 'Daisy: Call to Action', 'passionate' ),
            array(
                'description'   => __( 'Show call to action button with link', 'passionate' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title          = isset( $instance['title'] ) ? $instance['title'] : '';
        $description    = isset( $instance['description'] ) ? $instance['description'] : '';
        $button         = isset( $instance['button'] ) ? $instance['button'] : '';
        $button_url     = isset( $instance['button-url'] ) ? $instance['button-url'] : 'Button';

        ?>

        <div class="widget dt-call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="dt-call-to-action-wrap">
                            <div class="dt-call-to-action-meta">
                                <?php if( ! empty ( $title ) ) : ?><h2><?php echo esc_attr( $title ); ?></h2> <?php endif; ?>
                                <?php if( ! empty ( $description ) ) : ?><p><?php echo esc_attr( $description ); ?></p><?php endif; ?>
                            </div><!-- .dt-call-to-action-meta -->

                            <div class="dt-call-to-action-btn">
                                <a href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_attr( $button ); ?></a>
                            </div><!-- .dt-call-to-action-btn -->

                            <div class="clearfix"></div>
                        </div><!-- .dt-call-to-action-wrap -->
                    </div><!-- .col-lg-12 .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div>

        <?php
    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => '',
                'description'        => '',
                'button'             => '',
                'button-url'         => ''
            )
        );

        ?>

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'passionate' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Title', 'passionate' ); ?>" >
        </div><!-- .dt-admin-input-wrap -->

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description', 'passionate' ); ?></label>
            <textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" placeholder="<?php _e( 'Some Description ...', 'passionate' ); ?>" ><?php echo esc_attr( $instance['description'] ); ?></textarea>
        </div><!-- .dt-admin-input-wrap -->

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php _e( 'Button Text', 'passionate' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" value="<?php echo esc_attr( $instance['button'] ); ?>" placeholder="<?php _e( 'Button Text', 'passionate' ); ?>" >
        </div><!-- .dt-admin-input-wrap -->

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'button-url' ); ?>"><?php _e( 'Button URL', 'passionate' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'button-url' ); ?>" name="<?php echo $this->get_field_name( 'button-url' ); ?>" value="<?php echo esc_attr( $instance['button-url'] ); ?>" placeholder="<?php _e( 'Button URL', 'passionate' ); ?>" >
        </div><!-- .dt-admin-input-wrap -->

        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance                   = $old_instance;
        $instance['title']        = esc_attr( $new_instance['title'] );
        $instance['description']  = esc_textarea( $new_instance['description'] );
        $instance['button']       = esc_attr( $new_instance['button'] );
        $instance['button-url']   = esc_url( $new_instance['button-url'] );
        return $instance;

    }

}

/**
 * Testimonial.
 */
class passionate_testimonial extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_testimonial',
            __( 'Daisy: Testimonial', 'passionate' ),
            array(
                'description'   => __( 'to Show client Testimonials', 'passionate' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title                  = isset( $instance['title'] ) ? $instance['title'] : '';
        $dt_testimonial_values  = isset( $instance['dt_testimonial'] ) ? $instance['dt_testimonial'] : '';

        ?>

        <div class="widget dt-testimonial">
            <div class="dt-testimonial-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <?php if( ! empty( $title ) ) { ?><h2 class="widget-title"><?php echo esc_attr( $title ); ?></h2><?php } ?>

                            <div class="dt-testimonial-slider">
                                <div class="swiper-wrapper">

                                    <?php foreach ( $dt_testimonial_values as $dt_testimonial_key => $dt_testimonial_value ) : ?>

                                        <div class="swiper-slide">
                                            <div class="dt-testimonial-holder">

                                                <?php if( ! empty( $dt_testimonial_value['description']) ) : ?>

                                                    <div class="dt-testimonial-desc">
                                                        <p><?php echo esc_textarea( $dt_testimonial_value['description'] ); ?></p>
                                                    </div><!-- .dt-testimonial-desc -->

                                                <?php endif; ?>

                                                <div class="dt-testimonial-meta">

                                                    <?php if( ! empty ( $dt_testimonial_value['image'] ) ) : ?><figure><img src="<?php echo esc_url( $dt_testimonial_value['image'] ); ?>" alt="<?php if( ! empty ( $dt_testimonial_value['name'] ) ) : echo esc_attr( $dt_testimonial_value['name'] ); else : _e( 'Testimonial User', 'passionate' ); endif; ?>" /> </figure><?php endif; ?>

                                                    <?php if( ! empty ( $dt_testimonial_value['name'] ) ) : ?><h5><?php echo esc_attr( $dt_testimonial_value['name'] ); ?></h5><?php endif; ?>

                                                    <?php if( ! empty ( $dt_testimonial_value['company'] ) ) : ?><span><?php echo esc_attr( $dt_testimonial_value['company'] ); ?></span><?php endif; ?>

                                                </div><!-- .dt-testimonial-meta -->
                                            </div><!-- .dt-testimonial-holder -->
                                        </div><!-- .swiper-slide -->

                                    <?php endforeach; ?>

                                </div><!-- .swiper-wrapper -->

                                <!-- Add Arrows -->
                                <div class="swiper-button-next transition5"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-button-prev transition5"><i class="fa fa-angle-left"></i></div>
                            </div><!-- .dt-testimonial-slider -->
                        </div><!-- .col-lg-12 .col-md-12 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .dt-testimonial-wrap-->
        </div>

        <?php
    }

    public function form( $instance ) {
        $dt_title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : ''; ?>

        <div class="dt-admin-input-wrap">
            <label for="<?php echo $this->get_field_id( 'title'); ?>"><?php _e( 'Section Title', 'passionate' ); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $dt_title ); ?>" placeholder="<?php _e( 'Title', 'passionate' ); ?>">
        </div><!-- .dt-admin-input-wrap -->

        <?php
        $dt_testimonial_values = isset( $instance['dt_testimonial'] ) ? $instance['dt_testimonial'] : '';
        if ( ! empty( $dt_testimonial_values ) ) {

            foreach ( $dt_testimonial_values as $dt_testimonial_key => $dt_testimonial_value ) { ?>

                <div class="dt-admin-testimonials">
                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_key; ?>"><?php _e( 'Image', 'passionate' ); ?></label>
                        <img src="<?php if ( ! empty( $dt_testimonial_value['image'] )) { echo esc_url( $dt_testimonial_value['image'] ); } ?>" />
                        <input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_key; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_key ); ?>][image]" value="<?php echo esc_url( $dt_testimonial_value['image'] ); ?>" />
                        <input type="button" class="dt-logo-upload" id="custom_media_button" value="<?php _e( 'select Image', 'passionate' ); ?>" />
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial').$dt_testimonial_key; ?>"><?php _e( 'Name', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_testimonial').$dt_testimonial_key; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_key ); ?>][name]" value="<?php echo esc_attr( $dt_testimonial_value['name'] ); ?>" placeholder="<?php _e( 'Name', 'passionate' ); ?>">
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_key; ?>"><?php _e( 'Company', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_key; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_key ); ?>][company]" value="<?php echo esc_attr( $dt_testimonial_value['company'] ); ?>" placeholder="<?php _e( 'Company', 'passionate' ); ?>" >
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_key; ?>"><?php _e( 'Description', 'passionate' ); ?></label>
                        <textarea id="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_key; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_key ); ?>][description]" placeholder="<?php _e( 'Some description ...', 'passionate' ); ?>" rows="5"><?php echo esc_textarea( $dt_testimonial_value['description'] ); ?></textarea>
                    </div><!-- .dt-admin-input-wrap -->
                </div><!-- .dt-admin-testimonials -->

            <?php }

        } else {
            for ( $dt_testimonial_counter = 0; $dt_testimonial_counter < 3; $dt_testimonial_counter++ ) { ?>

                <div class="dt-admin-testimonials">
                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial').$dt_testimonial_counter; ?>"><?php _e( 'Name', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_testimonial').$dt_testimonial_counter; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_counter ); ?>][name]" value="" placeholder="<?php _e( 'Name', 'passionate' ); ?>">
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_counter; ?>"><?php _e( 'Company', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_counter; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_counter ); ?>][company]" value="" placeholder="<?php _e( 'Company', 'passionate' ); ?>" >
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_counter; ?>"><?php _e( 'Image', 'passionate' ); ?></label>
                        <img src="<?php if ( ! empty( $dt_testimonial_value['image'] )) { echo esc_url( $dt_testimonial_value['image'] ); } ?>" />
                        <input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_counter; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_counter ); ?>][image]" value="" />
                        <input type="button" class="dt-logo-upload" id="custom_media_button" value="<?php _e( 'Select Image', 'passionate' ); ?>" />
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_counter; ?>"><?php _e( 'Description', 'passionate' ); ?></label>
                        <textarea id="<?php echo $this->get_field_id( 'dt_testimonial' ).$dt_testimonial_counter; ?>" name="<?php echo $this->get_field_name( 'dt_testimonial' ); ?>[<?php echo esc_attr( $dt_testimonial_counter ); ?>][description]" placeholder="<?php _e( 'Some description ...', 'passionate' ); ?>" rows="5"></textarea>
                    </div><!-- .dt-admin-input-wrap -->
                </div><!-- .dt-admin-testimonials -->

            <?php }
        }
    }

    public function update( $new_instance, $old_instance ) {

        $instance                   = $old_instance;
        $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? wp_kses( $new_instance['title'] ) : '';
        $instance['dt_testimonial'] = array();

        if ( isset( $new_instance['dt_testimonial'] ) ) {
            foreach ( $new_instance['dt_testimonial'] as $stream_source ) {
                $instance['dt_testimonial'][] = $stream_source;
            }
        }
        return $instance;
    }

}

/**
 * Logo Slider
 */
class passionate_logo_slider extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_logo_slider',
            __( 'Daisy: Logo Display','passionate' ),
            array(
                'description'   => __( 'Widget to show clients logos', 'passionate' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $dt_logo_slider_values  = isset( $instance['dt_logo_slider'] ) ? $instance['dt_logo_slider'] : '';
        ?>

        <div class="widget dt-logo-display">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <ul>
                            <?php foreach ( $dt_logo_slider_values as $dt_logo_slider_key => $dt_logo_slider_value ) : ?>
                                <?php if( ! empty ( $dt_logo_slider_value['image'] ) ) : ?><li class="transition35"><a href="<?php if( ! empty ( $dt_logo_slider_value['url'] ) ) : echo esc_url( $dt_logo_slider_value['url'] ); else : echo esc_attr( '#' ); endif; ?>" title="<?php if( ! empty ( $dt_logo_slider_value['title'] ) ) : echo esc_attr( $dt_logo_slider_value['title'] ); else : echo _e( 'Logo', 'passionate' ); endif; ?>" target="_blank"><img src="<?php echo esc_url( $dt_logo_slider_value['image'] ); ?>" title="<?php if( ! empty ( $dt_logo_slider_value['title'] ) ) : echo esc_attr( $dt_logo_slider_value['title'] ); else : echo _e( 'Logo', 'passionate' ); endif; ?>" alt="<?php if( ! empty ( $dt_logo_slider_value['title'] ) ) : echo esc_attr( $dt_logo_slider_value['title'] ); else : echo _e( 'Logo', 'passionate' ); endif; ?>" /> </a></li><?php endif; ?>
                            <?php endforeach; ?>

                            <div class="clearfix"></div>
                        </ul>
                    </div><!-- .col-lg-12 .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div>

        <?php
    }

    public function form( $instance ) { ?>

        <?php
        $dt_logo_slider_values = isset( $instance['dt_logo_slider'] ) ? $instance['dt_logo_slider'] : '';
        if ( ! empty( $dt_logo_slider_values ) ) {
            foreach ( $dt_logo_slider_values as $dt_logo_slider_key => $dt_logo_slider_value ) { ?>

                <div class="dt-admin-logos-wrap">
                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_key; ?>"><?php _e( 'Image', 'passionate' ); ?></label>
                        <img src="<?php if ( ! empty( $dt_logo_slider_value['image'] ) ) { echo esc_url( $dt_logo_slider_value['image'] ); } ?>" />
                        <input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_key; ?>" name="<?php echo $this->get_field_name( 'dt_logo_slider' ); ?>[<?php echo esc_attr( $dt_logo_slider_key ); ?>][image]" value="<?php echo esc_url( $dt_logo_slider_value['image'] ); ?>" />
                        <input type="button" class="dt-logo-upload" id="custom_media_button" value="<?php _e( 'Select Image', 'passionate' ); ?>" />
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_logo_slider').$dt_logo_slider_key; ?>"><?php _e( 'Title', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_logo_slider').$dt_logo_slider_key; ?>" name="<?php echo $this->get_field_name( 'dt_logo_slider' ); ?>[<?php echo esc_attr( $dt_logo_slider_key ); ?>][title]" value="<?php echo esc_attr( $dt_logo_slider_value['title'] ); ?>" placeholder="<?php _e( 'Title', 'passionate' ); ?>">
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_key; ?>"><?php _e( 'Link', 'passionate' ); ?></label>
                        <input type="url" id="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_key; ?>" name="<?php echo $this->get_field_name( 'dt_logo_slider' ); ?>[<?php echo esc_attr( $dt_logo_slider_key ); ?>][url]" value="<?php echo esc_attr( $dt_logo_slider_value['url'] ); ?>" placeholder="<?php _e( 'URL', 'passionate' ); ?>" >
                    </div><!-- .dt-admin-input-wrap -->
                </div><!-- .dt-admin-logos-wrap -->

            <?php }

        } else {
            for ( $dt_logo_slider_counter = 0; $dt_logo_slider_counter < 5; $dt_logo_slider_counter++ ) { ?>

                <div class="dt-admin-logos-wrap">
                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_counter; ?>"><?php _e( 'Image', 'passionate' ); ?></label>
                        <img src="<?php if ( ! empty( $dt_logo_slider_value['image'] ) ) { echo esc_url( $dt_logo_slider_value['image'] ); } ?>" />
                        <input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_counter; ?>" name="<?php echo $this->get_field_name( 'dt_logo_slider' ); ?>[<?php echo esc_attr( $dt_logo_slider_counter ); ?>][image]" value="" />
                        <input type="button" class="dt-logo-upload" id="custom_media_button" value="<?php _e( 'Select Image', 'passionate' ); ?>" />
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_logo_slider').$dt_logo_slider_counter; ?>"><?php _e( 'Title', 'passionate' ); ?></label>
                        <input type="text" id="<?php echo $this->get_field_id( 'dt_logo_slider').$dt_logo_slider_counter; ?>" name="<?php echo $this->get_field_name( 'dt_logo_slider' ); ?>[<?php echo esc_attr( $dt_logo_slider_counter ); ?>][title]" value="" placeholder="<?php _e( 'Title', 'passionate' ); ?>">
                    </div><!-- .dt-admin-input-wrap -->

                    <div class="dt-admin-input-wrap">
                        <label for="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_counter; ?>"><?php _e( 'Link', 'passionate' ); ?></label>
                        <input type="url" id="<?php echo $this->get_field_id( 'dt_logo_slider' ).$dt_logo_slider_counter; ?>" name="<?php echo $this->get_field_name( 'dt_logo_slider' ); ?>[<?php echo esc_attr( $dt_logo_slider_counter ); ?>][url]" value="" placeholder="<?php _e( 'URL', 'passionate' ); ?>" >
                    </div><!-- .dt-admin-input-wrap -->
                </div><!-- .dt-admin-logos-wrap -->

            <?php }
        }
    }

    public function update( $new_instance, $old_instance ) {

        $instance                   = $old_instance;
        $instance['dt_logo_slider'] = array();

        if ( isset( $new_instance['dt_logo_slider'] ) ) {
            foreach ( $new_instance['dt_logo_slider'] as $stream_source ) {
                $instance['dt_logo_slider'][] = $stream_source;
            }
        }
        return $instance;
    }

}

/**
 * News Recent Posts
 */
class passionate_recent_posts extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'passionate_recent_posts',
            __( 'Daisy: Front Recent Posts', 'passionate' ),
            array(
                'description'   => __( 'Posts display widget for recently published post', 'passionate' )
            )
        );
    }

    public function widget( $args, $instance ) {

        global $post;
        $title          = isset( $instance['title'] ) ? $instance['title'] : '';
        $category       = isset( $instance['category'] ) ? $instance['category'] : '';
        $no_of_posts    = isset( $instance['no_of_posts'] ) ? $instance['no_of_posts'] : '';

        $news_layout1 = new WP_Query( array(
            'post_type'         => 'post',
            'category__in'      => $category,
            'posts_per_page'    => $no_of_posts
        ) );

        ?>

        <div class="widget dt-recent-posts">

            <div class="dt-news-layout-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <?php
                                if ( $news_layout1->have_posts() ) :

                                    if ( !empty( $title ) ) : ?> <h2><?php echo esc_attr( $title ); ?><span></span></h2> <?php endif; ?>

                                    <div class="dt-front-blog-wrap">

                                        <?php while ( $news_layout1->have_posts() ) : $news_layout1->the_post(); ?>

                                            <div class="dt-recent-post-holder">
                                                <figure class="dt-recent-post-img transition5">

                                                    <?php

                                                        if ( has_post_thumbnail() ) :
                                                            $image = '';
                                                            $title_attribute = get_the_title( $post->ID );
                                                            $image .= '<a href="'. esc_url( get_permalink() ) . '" title="' . esc_attr( the_title( '', '', false ) ) .'">';
                                                            $image .= get_the_post_thumbnail( $post->ID, 'passionate-front-blog-img', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
                                                            echo $image;
                                                        endif;
                                                    ?>

                                                </figure><!-- .dt-recent-post-img -->

                                                <div class="dt-recent-post-content">
                                                    <h3><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_attr( the_title() ); ?></a></h3>

                                                    <p><?php
                                                            $excerpt = get_the_excerpt();
                                                            $limit   = "125";
                                                            $pad     = "...";

                                                            if( strlen( $excerpt ) <= $limit ) {
                                                                echo esc_attr( $excerpt );
                                                            } else {
                                                                $excerpt = substr( $excerpt, 0, $limit ) . $pad;
                                                                echo esc_attr( $excerpt );
                                                            }
                                                        ?></p>
                                                </div><!-- .dt-recent-post-content -->
                                            </div><!-- .dt-recent-post-holder -->

                                        <?php endwhile; ?>

                                        <?php wp_reset_postdata(); ?>

                                    </div>

                                <?php else : ?>
                                    <p><?php _e( 'Sorry, no posts found in selected category.', 'passionate' ); ?></p>
                                <?php endif; ?>

                            <div class="clearfix"></div>
                        </div><!-- .col-lg-12 .col-md-12 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .dt-news-layout-wrap -->
        </div>

        <?php
    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'              => '',
                'category'           => '',
                'no_of_posts'        => '4'
            )
        );

        ?>

        <div class="dt-admin-recent-posts">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title', 'passionate' ); ?></strong></label>

                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'category' ); ?>"><strong><?php _e( 'Category', 'passionate' ); ?></strong></label>

                <select id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
                    <?php foreach( get_terms( 'category','parent=0&hide_empty=0' ) as $term ) { ?>
                        <option <?php selected( $instance['category'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                    <?php } ?>
                </select>
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><strong><?php _e( 'No. of Posts', 'passionate' ); ?></strong></label>

                <input type="number" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" value="<?php echo esc_attr( $instance['no_of_posts'] ); ?>">
            </div><!-- .dt-admin-input-wrap -->
        </div><!-- .dt-news-list-1 -->
        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance                   = $old_instance;
        $instance['title']          = strip_tags( stripslashes( $new_instance['title'] ) );
        $instance['category']       = $new_instance['category'];
        $instance['no_of_posts']    = strip_tags( stripslashes( $new_instance['no_of_posts']  ) );
        return $instance;

    }

}

// Register widgets
function passionate_register_widgets() {

    register_widget( 'passionate_social_icons' );
    register_widget( 'passionate_image_slider' );
    register_widget( 'passionate_services' );
    register_widget( 'passionate_recent_works' );
    register_widget( 'passionate_call_to_action' );
    register_widget( 'passionate_testimonial' );
    register_widget( 'passionate_logo_slider' );
    register_widget( 'passionate_recent_posts' );

}
add_action( 'widgets_init', 'passionate_register_widgets' );
