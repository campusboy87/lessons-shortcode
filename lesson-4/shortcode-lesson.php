<?php
/**
 * Plugin Name: Shortcode Lessons
 * Plugin URI: https://github.com/campusboy87/lessons-shortcode
 * Author: Обучающий YouTube канал "WP-PLUS"
 * Author URI: https://www.youtube.com/c/wpplus
 */

// Стили и вёрстка взята отсюда https://codepen.io/devinsays/pen/NPXeYv

/**
 * Контенты шоткод - обычная версия
 * Использование: [quote]Я этого хочу. Значит, это будет.[/quote]
 */
add_shortcode( 'quote', 'show_quote' );
function show_quote( $atts, $content, $tag ) {
	ob_start();
	?>
    <div class="quote">
        <p class="line-through top">
            <span>Цитаты великих людей</span>
        </p>
        <div class="stripe-border">
            <blockquote>
                <p>&ldquo;<?php echo esc_html( $content ); ?>&rdquo; </p>
            </blockquote>
        </div>
        <p class="line-through bottom">
            <span>wp-plus</span>
        </p>
    </div>
	<?
	return ob_get_clean();
}

/**
 * Контенты шоткод - динамичная версия
 * Использование: [quote top="Цитаты великих людей" bottom="Генри Форд"]Я этого хочу. Значит, это будет.[/quote]
 */
add_shortcode( 'quote', 'show_quote' );
function show_quote( $atts, $content, $tag ) {
	$text_top    = empty( $atts['top'] ) ? 'Цитата' : esc_html( $atts['top'] );
	$text_bottom = empty( $atts['bottom'] ) ? 'Неизвестно' : esc_html( $atts['bottom'] );
	
	ob_start();
	?>
    <div class="quote">
        <p class="line-through top">
            <span><?php echo $text_top; ?></span>
        </p>
        <div class="stripe-border">
            <blockquote>
                <p>&ldquo;<?php echo esc_html( $content ); ?>&rdquo; </p>
            </blockquote>
        </div>
        <p class="line-through bottom">
            <span><?php echo $text_bottom; ?></span>
        </p>
    </div>
	<?
	return ob_get_clean();
}
