<?php
$posts = $this->get_relative_posts();

if ( $posts->have_posts() ) {
    $html = '<ul style="margin:0;">';

    while ($posts->have_posts()) {
        $posts->the_post();
        $image = ( has_post_thumbnail() ) ? get_the_post_thumbnail( $posts->id, array( 50,50 ) ) : '<img width="50" height="50" src="' . plugins_url() . '/relative-posts/images/no-image.jpg' . '" >';
        $post_title = ( $this->title_check == 1 ) && ( strlen( get_the_title() ) > $this->title_length ) ? substr( get_the_title(), 0, $this->title_length ) . "..." : get_the_title();
        $html .= 
        '<li class="relative-post-thumbnail clear">
        <a href="' . get_permalink() . '">' . '<div>' . $image . $post_title . '</div></a>
        </li>';
    }//end while

    $html.='</ul>';
} else {
    $html = 'There Are No Similar Posts!';
}