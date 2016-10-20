<?php
/**
 *
 * REGISTER STYLE AND SCRIPT
 *
 * @package WordPress
 * @subpackage blogim
 * @since blogim 1.0.0
 *
 * */

if( ! class_exists('blogim_CSSJS')){

	class blogim_CSSJS {

		public function __construct(){
			add_action('wp_enqueue_scripts' ,array(&$this,'blogim_action_register_script'));
			add_action('wp_enqueue_scripts'	,array(&$this,'blogim_action_register_style'));
			add_action('admin_enqueue_scripts', array(&$this, 'blogim_action_register_admin_style_pro_features') );
			add_action('customize_controls_enqueue_scripts',array(&$this,'blogim_action_register_admin_style' ));
		}

		public function  blogim_action_register_style(){
			wp_register_style('blogim_bootstrap',get_template_directory_uri().'/assets/css/bootstrap.min.css');      
			wp_register_style('blogim_reset',get_template_directory_uri().'/assets/css/reset.css');
			wp_register_style('blogim_superfish',get_template_directory_uri().'/assets/css/jquery.superfish.css');
			wp_register_style('blogim_font-awesome',get_template_directory_uri().'/assets/css/font-awesome.min.css');
			wp_register_style('blogim_slicknav',get_template_directory_uri().'/assets/css/slicknav.css');
			wp_register_style('blogim_slick',get_template_directory_uri().'/assets/css/slick.css');
			wp_register_style('blogim_post-comment',get_template_directory_uri().'/assets/css/post-comment.css');
			wp_register_style('blogim_style',get_template_directory_uri().'/assets/css/style.css');
			
			$blogim_protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( 'blogim-fonts', "$blogim_protocol://fonts.googleapis.com/css?family=Lato:400,700,400italic|Playfair+Display:400' rel='stylesheet' type='text/css" );
			wp_enqueue_style('blogim_bootstrap');
			wp_enqueue_style('blogim_reset');
			wp_enqueue_style('blogim_superfish');
			wp_enqueue_style('blogim_font-awesome');
			wp_enqueue_style('blogim_slicknav');
			wp_enqueue_style('blogim_slick');
			wp_enqueue_style('blogim_post-comment');
			wp_enqueue_style('blogim_style');
		}
		
		public function blogim_action_register_admin_style_pro_features() {
			wp_register_style('blogim_custom_admin',get_template_directory_uri().'/assets/css/custom_admin.css');
			wp_enqueue_style('blogim_custom_admin');
		}
		public function blogim_action_register_admin_style(){
			wp_register_style('blogim_admin',get_template_directory_uri().'/assets/css/admin.css');
			wp_enqueue_style('blogim_admin');
			$blogim_protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( 'blogim-fonts', "$blogim_protocol://fonts.googleapis.com/css?family=Lato:400,700,400italic|Playfair+Display:400' rel='stylesheet' type='text/css" );
		}

		public function  blogim_action_register_script() {

			wp_register_script('blogim_bootstrap-min',get_template_directory_uri().'/assets/js/bootstrap.min.js',array('jquery'),NULL,true);
			wp_register_script('blogim_bootstrap',get_template_directory_uri().'/assets/js/bootstrap.js',array('jquery'),NULL,true);
			wp_register_script('blogim_superfish',get_template_directory_uri().'/assets/js/jquery.superfish.js',array('jquery'),NULL,true);
			wp_register_script('blogim_slick',get_template_directory_uri().'/assets/js/slick.js',array('jquery'),NULL,true);
			wp_register_script('blogim_slicknav',get_template_directory_uri().'/assets/js/jquery.slicknav.js',array('jquery'),NULL,true);
			wp_register_script('blogim_slicknav-min',get_template_directory_uri().'/assets/js/jquery.slicknav.min.js',array('jquery'),NULL,true);
			wp_register_script('blogim_waypoint',get_template_directory_uri().'/assets/js/waypoint.js',array('jquery'),NULL,true);
			wp_register_script('blogim_waypoint-sticky',get_template_directory_uri().'/assets/js/waypoint.sticky.js',array('jquery'),NULL,true);
			wp_register_script('blogim_fitvid',get_template_directory_uri().'/assets/js/fitvid.js',array('jquery'),NULL,true);
			wp_register_script('blogim_scripts',get_template_directory_uri().'/assets/js/scripts.js',array('jquery'),NULL,true);
		
			wp_enqueue_script('jquery');
			wp_enqueue_script('blogim_bootstrap');
			wp_enqueue_script('blogim_bootstrap-min');
			wp_enqueue_script('blogim_superfish');
			wp_enqueue_script('blogim_slick');
			wp_enqueue_script('blogim_slicknav-min');
			wp_enqueue_script('blogim_slicknav');
			wp_enqueue_script('blogim_waypoint');
			wp_enqueue_script('blogim_waypoint-sticky');
			wp_enqueue_script('blogim_fitvid');
			wp_enqueue_script('blogim_scripts');
			
			wp_enqueue_script( 'blogim_html5shiv', get_template_directory_uri() . '/assets/js/html5.js');
			wp_script_add_data( 'blogim_html5shiv', 'conditional', 'lt IE 9' );
			wp_enqueue_script( 'blogim_respond', get_template_directory_uri() . '/assets/js/respond.min.js' );
			wp_script_add_data( 'blogim_respond', 'conditional', 'lt IE 9' );
			
			if(is_singular('post') || is_page()){
				wp_enqueue_script( 'comment-reply');
			}
		}
	}
}

function blogim_CSSJS(){
	$blogim_CSSJS = new blogim_CSSJS;
}
add_action('init','blogim_CSSJS',1);