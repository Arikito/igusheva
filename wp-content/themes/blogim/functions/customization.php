<?php

 // SANITiZE TEXT
function blogim_get_pages(){
  $blogim_args = array(
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'post_type' => 'page',
  );
  $blogim_all_pages = get_pages($blogim_args);
  $blogim_pair_pages = array();
  foreach($blogim_all_pages as $blogim_p){
    $blogim_pair_pages[$blogim_p->ID] = $blogim_p->post_title;
  }
  return $blogim_pair_pages;
}
function blogim_sanitize_text($blogim_input){
  return wp_kses_post( force_balance_tags( $blogim_input ) );
}

function blogim_sanitize_select_page( $blogim_input ) {
  $blogim_valid = blogim_get_pages();

  if ( array_key_exists( $blogim_input, $blogim_valid ) ) {
    return $blogim_input;
  } else {
    return '';
  }
}

function blogim_sanitize_select_layout( $blogim_input ) {
  $blogim_valid = array(
    'full-width' => __('Full Width', 'blogim'),
    'boxed' => __('Boxed', 'blogim'),
    'framed' => __('Framed', 'blogim'),
    'rounded' => __('Rounded', 'blogim'),
    'h-1' => __('Header 1', 'blogim'),
    'none' => __('None', 'blogim'),
    'tile' => __('Tile', 'blogim'),
    'carousel' => __('Carousel', 'blogim'),
    'slideshow' => __('Slideshow', 'blogim'),
    'full-post-grid' => __('Full Post then Grid Style', 'blogim'),
    'full-post-list' => __('Full Post then List Style', 'blogim'),
    'full-post' => __('Full Post Style', 'blogim'),
    'grid' => __('Grid Style', 'blogim'),
    'list' => __('List Style', 'blogim'),
    'right-sidebar' => __('Right Sidebar', 'blogim'),
    'left-sidebar' => __('Left Sidebar', 'blogim'),
    'col-6-3-3' => __('Column : 50% + 25% + 25%', 'blogim'),
    'col-3-3-3-3' => __('Column : 25% + 25% + 25% + 25%', 'blogim'),
    'col-3-3-6' => __('Column : 25% + 25% + 50%', 'blogim'),
    'col-4-4-4' => __('Column : 33% + 33% + 33%', 'blogim'),
    'col-6-6' => __('Column : 50% + 50%', 'blogim'),
    'copy-menu' => __('Copyright and Menu', 'blogim'),
    'copy' => __('Copyright Only', 'blogim'),
    'menu' => __('Menu Only', 'blogim'),
    'copy-menu-vert' => __('Copyright and Menu Center', 'blogim'),
    'yes' => __('Yes', 'blogim'),
    'no' => __('No', 'blogim'),
  );

  if ( array_key_exists( $blogim_input, $blogim_valid ) ) {
    return $blogim_input;
  } else {
    return '';
  }
}

function blogim_register_customize ($wp_customize){
  require get_template_directory() . '/functions/settings/general.php';
  require get_template_directory() . '/functions/settings/layout.php';
  require get_template_directory() . '/functions/settings/social.php';
  require get_template_directory() . '/functions/settings/content.php';
  require get_template_directory() . '/functions/settings/styling.php';
}
add_action('customize_register','blogim_register_customize');

function blogim_custom_css(){ ?>
                
  <style type="text/css">


  body, #menubar,#footer-widget, .panel , .entry-content, .wc-tab, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, 
  .woocommerce-checkout #payment div.payment_box, #page-title,
  .comment-area.form-basic input[type='text'], .comment-area.form-basic input[type='email'], .comment-area.form-basic textarea,
  .form-basic textarea, #menubar.stuck, .slicknav_nav a, .slicknav_nav a:hover > a, .slicknav_nav a:hover, .sf-menu > li ul a
  {
    background-color: <?php echo (get_theme_mod('background_color') == '') ?  '#FCFFF5' : get_theme_mod('background_color') ;?> !important ;
  }

  <?php $blogim_main_color = sanitize_text_field((get_theme_mod('blogim_main_color'))); ?>

    a, #comment-nav-below .nav-next a:hover,
    #comment-nav-below .nav-previous a:hover,
    #comment-nav-above .nav-next a:hover,
    #comment-nav-above .nav-previous a:hover,
   .comment-reply-link:hover,
    #respond #cancel-comment-reply-link,
    .comment-reply-link,
    .single-content .page-links a:hover span,
    .single-content .page-links span, .single-content .page-links a:hover,
    .widget_rss cite,
    .author-content .author-social a:hover,
    .format-text a,
    .format-text a:hover,
    .bread span,
    .bread a:hover,
    .slicknav_nav a:hover,
    #tribute ul a:hover,
    #tribute p a,
    .widget_tag_cloud a:hover,
    .widget_social a:hover,
    .widget_profile .profile-info strong,
    .page-pagination a:hover,
    .content .format-text .more-post,
    .more-post,
    #posts-wrap .meta .share i:hover,
    #posts-wrap .meta .share.active i,
    #posts-wrap .meta .share ul a:hover,
    .cat a:visited, .cat a:link, .cat span,
    .cat a,.cat a:hover,
    #top .social .search-trigger.active,
    #top .social a:hover,
    .sf-menu > li ul a:hover,
    .sf-menu > li.current-menu-item > a,
    .sf-menu > li > a:hover,.sf-menu > li:hover > a,.sf-menu > li.active > a, #top #logo span, .title a{
            color: <?php echo ($blogim_main_color == '') ? '#193441' : $blogim_main_color ;?>;
    }
    
    #reply-title:after,
    .slicknav_open .slicknav_icon .slicknav_icon-bar,
    .slicknav_icon:hover .slicknav_icon-bar,
    .widget-title:after,
    .page-pagination a:before,
    .wpcf7 input[type='submit']:hover,
    .form-basic input[type='submit']:hover,
    .button:hover{
            background: <?php echo ( $blogim_main_color == '') ? '#193441' :  $blogim_main_color ;?>;      
    }
    .wpcf7 input[type='submit'],
    .form-basic input[type='submit'],
    .button,.button:visited,.button:link,
    #top .social .search-trigger.active,
    #top .social .search-trigger:hover,
    .widget_tag_cloud a{
            border: 1px solid  <?php echo ( $blogim_main_color == '') ? '#193441' :  $blogim_main_color ;?>;
    }                 
  </style>
<?php }
add_action('wp_head','blogim_custom_css',900);