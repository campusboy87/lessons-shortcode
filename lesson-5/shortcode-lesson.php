<?php
/**
 * Plugin Name: Shortcode Lessons
 * Plugin URI: https://github.com/campusboy87/lessons-shortcode
 * Author: Обучающий YouTube канал "WP-PLUS"
 * Author URI: https://www.youtube.com/c/wpplus
 */


/**
 * Контенты шоткод - динамичная версия (доработанная)
 */
add_shortcode( 'quote', 'show_quote' );
function show_quote( $atts, $content, $tag ) {
	//$text_top    = empty( $atts['top'] ) ? 'Цитата' : esc_html( $atts['top'] );
	//$text_bottom = empty( $atts['bottom'] ) ? 'Неизвестно' : esc_html( $atts['bottom'] );
	
	$atts = shortcode_atts( [
		'top'    => 'Цитата',
		'bottom' => 'Неизвестно',
	], $atts, 'quote' );
	
	ob_start();
	?>
    <div class="quote">
        <p class="line-through top">
            <span><?php echo esc_html( $atts['top'] ); ?></span>
        </p>
        <div class="stripe-border">
            <blockquote>
                <p>&ldquo;<?php echo esc_html( $content ); ?>&rdquo; </p>
            </blockquote>
        </div>
        <p class="line-through bottom">
            <span><?php echo esc_html( $atts['bottom'] ); ?></span>
        </p>
    </div>
	<?
	return ob_get_clean();
}

/**
 * Шоткод «Подготовка ко дню рождения»
 */
add_shortcode( 'birthday', 'show_birthday' );
function show_birthday( $atts ) {
	$atts = shortcode_atts( [
		'present' => 'деньги',
		'clothes' => 'штаны с рубашкой',
	], $atts, 'birthday' );
	
	$text = sprintf( 'Вы решили, что %s - лучший подарок.', esc_html( $atts['present'] ) );
	$text .= sprintf( ' А %s - лучшая одежда для этого праздника.', esc_html( $atts['clothes'] ) );
	
	return $text;
}

/**
 * Фильтр для параметров шоткода [birthday]
 */
add_filter( 'shortcode_atts_birthday', 'shortcode_atts_birthday_callback', 10, 4 );
function shortcode_atts_birthday_callback( $out, $pairs, $atts, $shortcode ) {
	$out['present'] = 'компас';
	
	return $out;
}
