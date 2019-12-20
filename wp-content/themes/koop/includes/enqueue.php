<?php

function koop_enqueue() {
	wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script( 'ableplayercookie-js', 'https://raw.githack.com/ableplayer/ableplayer/master/thirdparty/js.cookie.js', 'jquery');
    wp_enqueue_script( 'ableplayer-js', 'https://raw.githack.com/ableplayer/ableplayer/master/build/ableplayer.min.js', 'jquery');
    wp_enqueue_script( 'fontawesome-js', 'https://kit.fontawesome.com/63478864d0.js');
	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/dist/app.js', false, filemtime($_SERVER["DOCUMENT_ROOT"] . '/wp-content/themes/koop/js/dist/app.min.js') );

    wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style( 'ableplayer-css', 'https://raw.githack.com/ableplayer/ableplayer/master/build/ableplayer.min.css');
	//wp_enqueue_style( 'fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css');
    wp_enqueue_style( 'font-futura-css', 'https://use.typekit.net/jra0jgn.css');
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/css/dist/style.css', false, filemtime($_SERVER["DOCUMENT_ROOT"] . '/wp-content/themes/koop/css/dist/style.css') );

}
add_action( 'wp_enqueue_scripts', 'koop_enqueue', 20 );

function koop_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/editor.css' );
}
//add_action( 'after_setup_theme', 'koop_add_editor_styles' );
