<?php
$posts = $this->get_relative_posts();

if ( $posts->have_posts() ) {	
    $html = '<ul>';

    while ( $posts->have_posts() ) {
        $posts->the_post();
        $post_title = ( $this->title_check == 1 ) && ( strlen( get_the_title() ) > $this->title_length ) ? substr( get_the_title(), 0, $this->title_length ) . "..." : get_the_title();
        $html .= 
        '<li>
        <a href="' . get_permalink() . '">' . $post_title . '</a>
        </li>';
    }//end while


    $html.= '</ul>';
} else {
    $html = 'There Are No Similar Posts!';
}