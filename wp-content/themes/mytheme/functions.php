<?php
// подключение style.css
function MyTheme_resources(){
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'MyTheme_resources');

// Регистрация меню
function register_my_menu(){
  register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu' );

// Регистрация сайдбара
function register_my_sidebar(){
	register_sidebar(array(
		'name' => __('Main Sidebar', 'sidebar-1'),
		'id' => 'sidebar-1',
		'description' => __('Widgets in this area will be shown on all posts and pages.', 'sidebar-1'),
		'before_widget' => '<div id="%1$s" class="block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
	));
}
add_action('widgets_init', 'register_my_sidebar');
// включение миниатюр
add_theme_support('post-thumbnails', array('post'));

add_action('widgets_init', 'register_my_widgets');

// Новый виджет профиля
class AboutProfile extends WP_Widget {
	function __construct(){
		$widget_ops = array( 
			'classname' => 'widget_profile',
			'description' => __('Блок краткой информации об авторе в сайдбаре'),
		);
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('about_profile', __('О себе'), $widget_ops, $control_ops);
		add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
	}
	function widget($args, $instance){
		$name = apply_filters('widget_text', empty($instance['name'])?'':$instance['name'], $instance, $this->id_base);
		$surname = apply_filters('widget_text', empty($instance['surname'])?'':$instance['surname'], $instance, $this->id_base);
		$avatar = empty($instance['avatar'])?'https://freeiconshop.com/files/edd/person-flat.png':$instance['avatar'];
		$bg_image = empty($instance['bg_image'])?'https://freeiconshop.com/files/edd/person-flat.png':$instance['bg_image'];
		$description = apply_filters('widget_text', $instance['description'], $instance, $this);
		echo $args['before_widget'];?>
			<div class="about_profile" style="background-image: url('<?php echo $bg_image; ?>');">
				<div class="avatar"><img src="<?php echo $avatar; ?>" alt="This is my avatar"></div>
				<?php if(!empty($name) || !empty($surname)){?>
					<p class="name"><?php echo $name;?></br><?php echo $surname;?></p>
				<?php } ?>
				<?php if(!empty($description)){?>
					<p class="description"><?php echo $description;?></p>
				<?php } ?>
			</div>
		<?php
		echo $args['after_widget'];
	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['avatar'] = sanitize_text_field($new_instance['avatar']);
		$instance['bg_image'] = sanitize_text_field($new_instance['bg_image']);
		$instance['name'] = sanitize_text_field($new_instance['name']);
		$instance['surname'] = sanitize_text_field($new_instance['surname']);
		$instance['description'] = sanitize_text_field($new_instance['description']);
		return $instance;
	}
	function upload_scripts(){
		wp_enqueue_media();
		wp_enqueue_script('upload_media_widget', Get_template_directory_uri().'/upload-media.js', array('jquery'));
	}
	function form($instance){
		$instance = wp_parse_args((array) $instance, array('bg_image' => '', 'avatar' => '', 'name' => '', 'surname' => '', 'description' => ''));?>
		<p>
			<label for="<?php echo $this->get_field_id('avatar'); ?>"><?php _e('Avatar:'); ?></label>
			<input class="media-input" id="<?php echo $this->get_field_id('avatar'); ?>" name="<?php echo $this->get_field_name('avatar'); ?>" type="text" value="<?php echo $instance['avatar']; ?>"/>
			<button class="media-button"><?php echo _e('Select'); ?></button>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('bg_image'); ?>"><?php _e('Background:'); ?></label>
			<input class="media-input" id="<?php echo $this->get_field_id('bg_image'); ?>" name="<?php echo $this->get_field_name('bg_image'); ?>" type="text" value="<?php echo $instance['bg_image']; ?>"/>
			<button class="media-button"><?php echo _e('Select'); ?></button>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $instance['name']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('surname'); ?>"><?php _e('Surname:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('surname'); ?>" name="<?php echo $this->get_field_name('surname'); ?>" type="text" value="<?php echo $instance['surname']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Content:'); ?></label>
			<textarea class="widefat" rows="3" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo esc_textarea($instance['description']); ?></textarea>
		</p>
		<?php
	}
}

// Виджет "Подписаться"
class FollowMe extends WP_Widget {
	function __construct(){
		$widget_ops = array( 
			'classname' => 'follow_me',
			'description' => __('Блок социальных сетей в сайдбаре'),
		);
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('follow_me', __('Социальные сети'), $widget_ops, $control_ops);
	}
	function widget($args, $instance){
		$title = apply_filters('widget_title', !empty($instance['title'])?$instance['title']:__('Социальные сети'), $instance, $this->id_base);
		echo $args['before_widget'];
			if(!empty($title)){
				echo $args['before_title'].$title.$args['after_title'];
			}?>
			<div class="follow_me">
				<?php foreach($instance['socials'] as $key => $value){
					if($value != ''){?>
						<a href="<?php echo $value; ?>" class="<?php echo $key; ?>" target="_blank" title="<?php echo $key; ?>"><i class="fa fa-<?php echo $key; ?>"></i></a>
					<?php
					}
				} ?>
			</div>
		<?php
		echo $args['after_widget'];
	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		foreach($new_instance['socials'] as $key => $value){
			$instance['socials'][$key] = sanitize_text_field($value);
		}
		// print_r($new_instance);die();
		// $instance['socials'] = $new_instance['bg_image'];
		// $instance['name'] = sanitize_text_field($new_instance['name']);
		// $instance['surname'] = sanitize_text_field($new_instance['surname']);
		// $instance['description'] = sanitize_text_field($new_instance['description']);
		return $instance;
	}
	function form($instance){
		$instance = wp_parse_args((array) $instance, array(
			'title' => '',
			'socials' => array(
				'facebook' => '',
				'vk' => '',
				'google-plus' => '',
				'youtube-play' => '',
				'twitter' => '',
				'instagram' => ''
			)
		));?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>">
		</p>
		<p>Вставьте ссылку на свой аккаунт в социальной сети.</p>
		<?php foreach($instance['socials'] as $key => $value){ ?>
			<p>
				<label for="<?php echo $this->get_field_id($key); ?>"><?php _e($key.':'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name('socials['.str_replace('\'', '', $key).']'); ?>" type="text" value="<?php echo $value; ?>">
			</p>
		<?php } ?>
		<!-- <p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name($key); ?>" type="text" value="<?php echo $instance['facebook']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('vk'); ?>"><?php _e('VK:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('vk'); ?>" name="socials[]" type="text" value="<?php echo $instance['vk']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google-plus'); ?>"><?php _e('Google Plus:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('google-plus'); ?>" name="socials[]" type="text" value="<?php echo $instance['google-plus']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="socials[]" type="text" value="<?php echo $instance['twitter']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="socials[]" type="text" value="<?php echo $instance['instagram']; ?>">
		</p> -->
		<?php
	}
}

function register_my_widgets(){
	register_widget('AboutProfile');
	register_widget('FollowMe');
}