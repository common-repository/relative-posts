<?php
/**
 * @package  RelativePosts
 */

class Relative_Post
{
    public $title;
    public $max_number;
    public $title_length;
    public $title_check;
    public $thumb_check;
    public $post_id;
    public $args;

    public function __construct($args, $instance)
    {
        $this->title = $instance['title'] ?: 'You Also Might Like...';
        $this->max_number = (int)$instance['max_number'] ?: 5;
        $this->thumb_check = $instance['thumb_check'];
        $this->title_check = $instance['title_check'];
        $this->title_length = (int)$instance['title_length'] ?: 50;
        $this->post_id = $this->get_the_post_id();
        $this->args = $args;
    }

    public function get_the_post_id()
    {
        global $post;
        return $post->ID;
    }

    public function get_categories()
    {
        $terms=get_the_terms($this->post_id, 'category');
        
        $categories=array();
        
        foreach ($terms as $term) {
            $categories[]=$term->term_id;
        }

        return $categories;
    }

    public function get_relative_posts()
    {
        $posts = new WP_Query(
            array(
                'posts_per_page'=> $this->max_number,
                'category__in'=>$this->get_categories(),
                'orderby'=>'rand',
                'post__not_in'=>array($this->post_id)
            )
        );

        return $posts;
    }

    public function render_posts()
    {
        echo $this->args['before_widget'];
        echo $this->args['before_title']. $this->title . $this->args['after_title'];
        
        if ( $this->thumb_check == 1 ) {
            include( RELATIVE_POSTS_PLUGIN_PATH . 'templates/posts-with-thumbnails.php' );
        } else {
            include( RELATIVE_POSTS_PLUGIN_PATH . 'templates/posts-without-thumbnails.php' );
        }
        echo $html;

        echo $this->args['after_widget'];

        wp_reset_postdata();
    }
}
