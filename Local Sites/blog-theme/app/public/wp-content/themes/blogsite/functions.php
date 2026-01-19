<?php

function blogsite_theme_support(){
    // Add Dynamic Website Title Name - adds dynamic title tag support
    add_theme_support('title-tag');

    //add extra support for the theme

    //add a logo
    add_theme_support('custom-logo'); //adds logo
 
    //custom thumbnail sizes - limits size of images in a section

    //add "Set featured image" feature on "Add New Post"
    add_theme_support('post-thumbnails');

}
add_action('after_setup_theme', 'blogsite_theme_support');


//WordPress Menus - creates Menus tab in the Appearance navigation in the wp-admin
function blogsite_menus(){
    //set up menu locations
    //key-value pair arrays
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);    

}
//add another hook
add_action('init', 'blogsite_menus');



//make dynamic stylesheets
function blogsite_register_styles(){

    //make version of the theme dynamic
    $version = wp_get_theme() -> get('Version'); //version from the style.css

    wp_enqueue_style('blogsite-style', get_template_directory_uri() . "/style.css", array('blogsite-bootstrap'), '1.0', 'all');
    wp_enqueue_style('blogsite-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('blogsite-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'blogsite_register_styles');


//make dynamic javascript scripts
function blogsite_register_scripts(){

    wp_enqueue_script('blogsite-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true); //true to appear in the footer
    wp_enqueue_script('blogsite-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
    wp_enqueue_script('blogsite-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
    wp_enqueue_script('blogsite-main', get_template_directory_uri()."/assets/js/main.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'blogsite_register_scripts');


?>