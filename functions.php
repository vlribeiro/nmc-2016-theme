<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

//Abre espaço para os menus
function register_menus() {
  register_nav_menu('principal',__( 'Menu Topo' ));
}
add_action( 'init', 'register_menus' );

//Carrega os scripts necessários para o tema

function add_theme_scripts() {
  wp_enqueue_style( 'font-awesome', 'https://cdn.jsdelivr.net/fontawesome/4.6.3/css/font-awesome.min.css');
  wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css');

  wp_enqueue_script( 'modernizr', 'https://cdn.jsdelivr.net/g/jquery@3.1.0,modernizr@2.8.3');
  wp_enqueue_script( 'jquery', 'https://cdn.jsdelivr.net/jquery/2.2.4/jquery.min.js');

  wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/vendor/foundation.min.js');
  wp_enqueue_script( 'nmc', get_template_directory_uri() . '/js/nmc.js');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

//Adiciona a chamada do foundation ao final do body

function call_foundation() {
    echo '<script>$(document).foundation();</script>';
}
add_action( 'wp_footer', 'call_foundation' );

//Altera a classe sticky, por conflito com o foundation

function remove_sticky_class($classes) {
  $classes = array_diff($classes, array("sticky"));
  $classes[] = 'wordpress-sticky';
  return $classes;
}
add_filter('post_class','remove_sticky_class');


// register custom post type 'my_custom_post_type'
add_action( 'init', 'create_my_post_type' );
function create_my_post_type() {
  register_post_type( 'my_custom_post_type',
    array(
      'labels' => array( 'name' => __( 'Products' ) ),
      'public' => true
    )
  );
}

//add post-formats to post_type 'my_custom_post_type'
add_post_type_support( 'my_custom_post_type', 'post-formats' );


add_filter( 'embed_oembed_html', 'custom_youtube_oembed' );
function custom_youtube_oembed( $code ){
    if( stripos( $code, 'youtube.com' ) !== FALSE && stripos( $code, 'iframe' ) !== FALSE )
        $code = '<div class="flex-video widescreen">' . $code . '</div>';
    return $code;
}
