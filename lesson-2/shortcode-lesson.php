<?
/**
 * Plugin Name: Shortcode Lesson 2
 * Plugin URI: https://github.com/campusboy87/lessons-shortcode
 * Author: Обучающий YouTube канал "WP-PLUS"
 * Author URI: https://www.youtube.com/c/wpplus
 */
 
// Обычный шоткод
add_shortcode( 'tags', 'show_post_tags' );
function show_post_tags() {
	
	$tags = get_the_tags();
	
	if ( is_array( $tags ) && ! empty( $tags ) ) {
		$posts = get_posts( [
			'showposts' => 10,
			'exclude'   => get_the_ID(),
			'tag_id'    => $tags[0]->term_id,
		] );
		
		if ( $posts ) {
			$html = '<h3>Также читайте:</h3>';
			
			$html .= '<ul>';
			foreach ( $posts as $post ) {
				$html .= sprintf( '<li><a href="%s">%s</a></li>', get_permalink( $post ), get_the_title( $post ) );
			}
			$html .= '</ul>';
			
			return $html;
		}
		
	}
	
}

// Обычный Динамичный шоткод
/*add_shortcode( 'tags', 'show_post_tags' );
function show_post_tags( $args ) {
	
	$tags = get_the_tags();
	if ( is_array( $tags ) && $tags ) {
		$tags = wp_list_pluck( $tags, 'name', 'term_id' );
	} else {
		$tags = false;
	}
	
	if ( $tags && in_array( $args['name'], $tags ) ) {
		
		$posts = get_posts( [
			'showposts' => 10,
			'exclude'   => get_the_ID(),
			'tag__in'   => array_keys( $tags, $args['name'] ),
		] );
		
		if ( $posts ) {
			$html = '<h3>Также читайте:</h3>';
			
			$html .= '<ul>';
			foreach ( $posts as $post_item ) {
				$html .= sprintf( '<li><a href="%s">%s</a></li>', get_permalink( $post_item ), get_the_title( $post_item ) );
			}
			$html .= '</ul>';
			
			return $html;
		}
		
	}
	
}*/
