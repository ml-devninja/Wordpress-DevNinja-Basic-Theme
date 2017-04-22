<?php

/**
 * PREVENT TO DOWNLOAD EMOJI FILES
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');


/**
 * REGISTER CUSTOM MENU
 */

function devNinjaRegisterMenu()
{
    register_nav_menus(
        array(
            'desktop-menu' => __('Desktop'),
        )
    );
}

add_action('init', 'devNinjaRegisterMenu');

/**
 * ENABLE SVG UPLOAD
 *
 * @param $mimes
 * @return mixed
 */
function devNinjaSvgUploadEnable( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'devNinjaSvgUploadEnable' );


/**
 * REMOVE SOME UNUSED STUFF FROM HEADER
 */

function devNinjaHeaderCleanup() {
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
    remove_action( 'wp_head', 'index_rel_link' ); // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
    remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

}
add_action('init', 'devNinjaHeaderCleanup');


/**
 * ADD NEWER VERSION OF JQUERY
 */

function devNinjaCustomJQueryImport() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, null);
    wp_enqueue_script('jquery');
}
if (!is_admin()) add_action("wp_enqueue_scripts", "devNinjaCustomJQueryImport", 11);


/**
 * ENQUEUE STYLES
 */

function devNinjaEnqueueStyles() {
	wp_enqueue_style( 'custom', get_template_directory_uri().'/css/styles.min.css' , array(), NULL);
}
add_action( 'wp_enqueue_scripts', 'devNinjaEnqueueStyles' );

/**
 * ENQUEUE SCRIPTS
 */

function devNinjaEnqueueScripts(){
    wp_enqueue_script( 'custom', get_template_directory_uri().'/js/scripts.min.js' , array(), NULL, true );
}
add_action( 'wp_enqueue_scripts', 'devNinjaEnqueueScripts' );

function devNinjaDebugHard($data){
    echo '<div class="debugger"><pre>';
    var_dump($data);
    echo '</pre></div>';
}