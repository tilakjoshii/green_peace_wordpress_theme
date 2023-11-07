<?php
add_theme_support('custom-header');
function gt_setup(){
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime());
}
add_action('wp_enqueue_scripts','gt_setup');

function create_custom_post_type_banner() {
    register_post_type('banner', array(
        'labels' => array(
            'name' => 'Banner',
            'singular_name' => 'banner',
        ),
        'public' => true,
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'banner'),
    ));
}
add_action('init', 'create_custom_post_type_banner');

function register_statement_post_type() {
    register_post_type('statement', array(
        'labels' => array(
            'name' => 'Statement',
            'singular_name' => 'statement',
        ),
        'public' => true,
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'statement'),
    ));
}
add_action('init', 'register_statement_post_type');

function register_service_features_post_type() {
    register_post_type('service_features', array(
        'labels' => array(
            'name' => 'Service Features',
            'singular_name' => 'Service Feature',
        ),
        'public' => true,
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'service_features'),
    ));
}
add_action('init', 'register_service_features_post_type');

// For Photo Gallery

function custom_image_post_type() {
    register_post_type('custom_images', array(
        'labels' => array(
            'name' => 'Gallery',
            'singular_name' => 'Custom Image',
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail'),
    ));
}
add_action('init', 'custom_image_post_type');


if (!defined('CMB2_LOADED')) {
    require_once get_template_directory() . '/cmb2/init.php';
}

function custom_images_metaboxes() {
    $prefix = 'custom_images_gallery_';

    $cmb = new_cmb2_box(array(
        'id'           => 'custom_images_gallery_metabox',
        'title'        => 'Image Gallery',
        'object_types' => array('custom_images'),
    ));

    $cmb->add_field(array(
        'name' => 'Gallery Images',
        'id'   => $prefix . 'images',
        'type' => 'file_list',
    ));
}

add_action('cmb2_admin_init', 'custom_images_metaboxes');

// Register Custom Post Type for Pricing Plans
function create_pricing_plans_post_type() {
    register_post_type('pricing_plan', array(
        'labels' => array(
            'name' => 'Pricing Plans',
            'singular_name' => 'Pricing Plan',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail', 'custom-fields'),
    ));
}
add_action('init', 'create_pricing_plans_post_type');

function create_gallery_post_type() {
    register_post_type('gallery_item',
        array(
            'labels' => array(
                'name' => __('Videos'),
                'singular_name' => __('Gallery Item'),
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-format-video',
            'supports' => array('title','editor'),
        )
    );
}
add_action('init', 'create_gallery_post_type');

function create_custom_post_type() {
    register_post_type('team_members', array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail'), // Customize the supported features
        'rewrite' => array('slug' => 'team-members'), // Change the URL slug
    ));
}
add_action('init', 'create_custom_post_type');

function create_footer_post_type() {
    register_post_type('footer', array(
        'labels' => array(
            'name' => __('Footer'),
            'singular_name' => __('Footer'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-site',
        'supports' => array('title','thumbnail'),
    ));
}
add_action('init', 'create_footer_post_type');




?>
