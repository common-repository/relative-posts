<?php
/**
 * @package  RelativePosts
 */
/*
Plugin Name: Relative Posts
Plugin URL:
Description: Simple and Lite widget shows relative posts on the SideBar with or without thumbnails.
Version: 1.3.1
Author: Panagiotis Angelidis (paaggeli)
Author URL: https://www.linkedin.com/in/panos-angelidis-3a9a4036
*/ 
//=======================================================================================
add_action( 'wp_enqueue_scripts', array( 'pa_Relative', 'styles_method' ) );
//=======================================================================================
define( 'RELATIVE_POSTS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

class pa_Relative extends WP_Widget {
	function __construct(){
		$options=array(
			'description'=>'Show relative posts',
			'name'=>'Relative Posts'
		);
		parent::__construct('pa_Relative','', $options);
	}

	public function styles_method(){
		wp_register_style( 'pa_Relative', plugins_url( 'css/style.css', __FILE__ ) );
		wp_enqueue_style( 'pa_Relative' );
	}

	public function form($instance){
		extract($instance);
		include( RELATIVE_POSTS_PLUGIN_PATH . 'templates/form.php' );
	}

	public function update($new_instance, $old_instance){
		$instance=array();
		$instance['title'] = $new_instance['title'];
		$instance['max_number'] = $new_instance['max_number'];
		$instance['thumb_check'] = $new_instance['thumb_check'];
		$instance['title_check'] = $new_instance['title_check'];
		$instance['title_length'] = $new_instance['title_length'];
		return $instance;
	}

	public function widget($args, $instance){
		if (is_singular('post')){
			require( plugin_dir_path( __FILE__ ) . 'inc/relative-post.php' );
			$relative_posts = new Relative_Post($args, $instance);

			$relative_posts->render_posts();

		}
		
	}
}

add_action('widgets_init','pa_register_relative');
function pa_register_relative(){
	register_widget('pa_Relative');
}?>