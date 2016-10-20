<?php
/**
 * Theme Helper Functions
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */


function boson_build_atts( $atts, $prefix = '', $quote = '"' ) {

    // check for null
    $atts = array_filter( $atts );
    if ( empty( $atts ) ) return;

    $string = '';
    foreach ( $atts as $k => $v )
        $string .= ' ' . $prefix . $k . '=' . $quote . $v . $quote;

    return $string;
}

/**
 * Theme Path Helper Functions.
 *
 * @since Boson 1.0
 */
if ( ! function_exists( 'boson_get_assests_css' ) ) : 
function boson_get_assests_css( $file = "" ){
    echo esc_url( boson_assests_css( $file )  );
}
endif;


if ( ! function_exists( 'boson_assests_css' ) ) : 
function boson_assests_css( $file = "" ){
    return get_template_directory_uri() . '/assets/css/'.$file ;
}
endif;

if ( ! function_exists( 'boson_get_assests_js' ) ) :
function boson_get_assests_js( $file = "" ){
    echo esc_url( boson_assests( $file ) );
}
endif;


if ( ! function_exists( 'boson_assests_js' ) ) :
function boson_assests_js( $file = "" ){
    return get_template_directory_uri() . '/assets/js/'.$file ;
}
endif;


if ( ! function_exists( 'boson_display_meta_tags' ) ) :
/**
 * Theme Display Header Meta Tags.
 *
 * @since Boson 1.0
 */
function boson_display_meta_tags() {
    
    echo "\t".'<meta charset="' . esc_attr( get_bloginfo( 'charset' ) ) . '" />'."\n";
    echo "\t".'<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">'."\n";
    echo "\t".'<meta name="generator" content="Boson" />'."\n";
    echo "\t".'<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '" />'."\n";
    echo "\t".'<meta name="author" content="CKThemes">'."\n";
    
}
endif;


if ( ! function_exists( 'boson_touch_icons' ) ) :
/**
 * Display Header Touch Icons.
 *
 * @since Boson 1.0
 */
function boson_touch_icons() {
    
    // Favicon
    if ( $boson_favicon = get_theme_mod('boson-favicon') ): ?>
        <link rel="shortcut icon" href="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $boson_favicon )); ?>" />
    <?php endif;
}
endif;


if ( ! function_exists( 'boson_comment' ) ) :
/**
 * Print Html of post user comments.
 *
 * @since Boson 1.0
 */
function boson_comment( $comment, $args, $depth ){
    $GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
		<p><?php _e( 'Pingback:', 'boson' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'boson' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
    <div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" class="comment">
    	<div class="comment-ava">
            <?php echo get_avatar( $comment, 80 ); ?>
   		</div>
        <div class="comment-content">
	       <!-- Comment 4 Meta -->
	       <div class="comment-meta">
				<div>
	               <a href="<?php the_author_link(); ?>" class="comment-name"><?php echo  ucwords( get_comment_author() ); ?></a>
				</div>
				<span class="comment-date"><?php printf( __( '%1$s at %2$s', 'boson' ), get_comment_date( 'M d, Y' ), get_comment_time() ) ?></span>
				<span class="btn-reply"><b>
                <?php
                    comment_reply_link( array_merge( $args, array(
                        'depth' => $depth,
                        'reply_text' => __( 'Reply', 'boson' ),
                        'max_depth' => $args['max_depth'],
                    ) ) );
                ?>
                </b></span>
	       </div>
	       <!-- End Comment 4 Meta -->
	       <!-- Comment 4 Content -->
           <?php if ( $comment->comment_approved == '0' ) { ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'boson' ); ?></em><br />
           <?php } ?>
            <?php comment_text(); ?>
        </div>
      </div>  
	<?php
			break;
	endswitch;
}
endif;


if ( ! function_exists( 'boson_is_str_contain' ) ) :
/**
 * Check input contains string
 *
 * @since Boson 1.0
 */
function boson_is_str_contain( $search, $in ) {
    // if in string
    if ( strpos( $in, $search ) !== false )
        return true;
    // if not in string
    return false;
}
endif;


if ( ! function_exists( 'boson_pagination_defaults' ) ) :
/**
 * Pagination Defaults
 *
 * @since Boson 1.0
 */
function boson_pagination_defaults( $defaults = array() ) {
    
    $defaults['container'] = 'div';
    $defaults['style'] = 'simple';
    $defaults['container_class'] = 'pagination';
    
    return $defaults;
}
add_filter( 'boson_pagination_defaults', 'boson_pagination_defaults' );
endif;


if ( ! function_exists( 'boson_register_plugins' ) ) :
/**
 * Required and Recommended Plugins
 *
 * @since Boson 1.0
 */
function boson_register_plugins() {

    $boson_plugins = array(
    
        // Boson Shortcode Core
        array(
            'name' => 'Boson Shortcode',
            'required' => true,
            'slug' => 'boson-shortcode',
            'source' => 'http://ckthemes.com/plugin/boson/boson-shotcode.zip'
        ),

        // Wordpress SEO
        array(
            'name'      => 'WordPress SEO by Yoast',
            'slug'      => 'wordpress-seo',
            'required'  => false,
        ),
        
        // Meta Box
        array(
            'name' => 'Meta Box',
            'required' => true,
            'slug' => 'meta-box',
        ),

        // Contact Form 7
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        
        // Post Formate 
        array(
            'name' => 'Post Format UI',
            'required' => true,
            'slug' => 'wp-post-formats-develop',
            'source'   => 'http://ckthemes.com/plugin/rica/wp-post-formats-develop.zip'
        )
    );

    tgmpa( $boson_plugins );
}
add_action( 'tgmpa_register', 'boson_register_plugins' );
endif;

if ( ! function_exists( 'boson_generate_html_atts' ) ) :
    /**
     * Build key='value' string from array
     *
     * @param array $atts contains key-value pair for attributes
     * @param string $prefix prefix the key with this string i.e. data-
     * @param string $quote quotation used for attributes
     *
     * @return string
     */
    function boson_generate_html_atts( $atts, $prefix = '', $quote = '"' ) {
    
        // Clean array
        $atts = boson_array_clean( $atts );
    
        // If empty return false
        if ( empty( $atts ) ) {
            return false;
        }
    
        $out = '';
        foreach ( $atts as $k => $val ) {
            $key = $prefix . $k;
    
            if( is_array( $val ) ) {
                $out .= boson_generate_html_atts( $val, $key . '-', $quote );
            }
            else {
                $out .= sprintf( ' %1$s=%3$s%2$s%3$s', $key, $val, $quote );
            }
        }
    
        return $out;
    }
 endif;

 if ( ! function_exists( 'boson_array_clean' ) ) :
    /**
     * Remove empty values from multi-dimensional array
     *
     * @param array $array
     * @return array
     */
    function boson_array_clean( $array ) {
    
        // Check for empty
        if ( empty( $array ) ) {
            return false;
        }
    
        $newArr = array();
        foreach( $array as $key => $val ) {
    
            if( is_array( $val ) ) {
                $val = boson_array_clean( $val );
    
                if( !empty( $val ) ) {
                    $newArr[ $key ] = $val;
                }
            }
            elseif( is_object( $val ) ) {
                $val = (object)boson_array_clean( (array)$val );
    
                if( !empty( $val ) ) {
                    $newArr[ $key ] = $val;
                }
            }
            elseif( '' != trim( $val ) ) {
                $newArr[ $key ] = $val;
            }
        }
    
        return $newArr;
    }
endif;

if ( ! function_exists( 'boson_get_excerpt' ) ) :
    /**
     * Improved Excerpt
     *
     * @since boson 1.0
     */
     
    function boson_get_excerpt( $boson_args = '' ) {
    
        global $post;
    
        $boson_defaults = array(
            'boson_by'            => 'words',
            'boson_length'        => 50,
            'boson_ellipsis'      => false,
            'boson_before_text'   => '<p>',
            'boson_after_text'    => '</p>',
            'boson_link_to_post'  => true,
            'boson_link_text'     => __( 'Read More', 'boson' ),
            'boson_class'         => 'btn colored',
            'boson_text'          => ''
        );
    
        $boson_args = wp_parse_args( $boson_args, $boson_defaults );
        extract( $boson_args );
    
        // Retrieve the post content
        if ( '' == $boson_text ) {
            $boson_text = get_the_content( '' );
        }
    
        $boson_raw_excerpt = $boson_text;
    
        // Delete all shortcodes, scripts and tags
        $boson_text = strip_shortcodes( $boson_text );
        $boson_text = preg_replace( '@<script[^>]*?>.*?</script>@si', '', $boson_text );
        $boson_text = strip_tags( $boson_text, '<em><strong><i><b>' );
    
        // by words
        if ( $boson_by == 'words' ) {
    
            $boson_words = explode( ' ', $boson_text, $boson_length + 1 );
            if ( count( $boson_words ) > $boson_length ) {
                array_pop( $boson_words );
                $boson_text = implode( ' ', $boson_words );
            }
        }
        else {
    
            $boson_text = substr( $boson_text, 0, $boson_length );
            $boson_text = substr( $boson_text, 0, strripos( $boson_text, " " ) );
            $boson_text = trim( preg_replace( '/\s+/', ' ', $boson_text ) );
        }
    
        // Check emptiness
        if ( empty( $boson_text ) ) return '';
    
        $boson_text = stripslashes( $boson_before_text ) . $boson_text . $boson_ellipsis . stripslashes( $boson_after_text );
        if ( $boson_link_to_post ) {
            $boson_permalink = get_permalink( $post->ID );
            $boson_text .= ' <a class="'. esc_attr( $boson_class ) .'" href="' . esc_url( $boson_permalink ) . '">' . $boson_link_text . ' <i class="icon-chevron-sign-right" style="margin: 0 0 0 7px;"></i></a>';
        }
    
        // Apply fixes
        $boson_text = wptexturize( $boson_text );
        $boson_text = convert_smilies( $boson_text );
        $boson_text = convert_chars( $boson_text );
    
        // Return
        return apply_filters( 'wp_trim_excerpt', $boson_text, $boson_raw_excerpt );
    }
 endif;
 

/**
 * oEmbed Modifier
 */
function boson_oembed_modifier( $html ) {
    
    $html = preg_replace( '/(width|height|frameborder)="\d*"\s/', "", $html );
    
    return $html;
   
}
add_filter( 'embed_oembed_html', 'boson_oembed_modifier', 10 );
add_filter( 'oembed_result', 'boson_oembed_modifier', 10 );

/**
 * Theme Check Bypass Functions
 *
 * @since Boson 1.0
 */
 posts_nav_link();
 paginate_links();
 the_posts_pagination();
 next_posts_link();
 previous_posts_link();
 paginate_comments_links();
 next_comments_link();
 previous_comments_link();