<?php

function load_stylesheets()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');
    wp_register_style('style', get_template_directory_uri() . './style.css', array(), false, 'all');
    wp_enqueue_style('style');
    wp_register_style('sass', get_template_directory_uri() . './dist/app.css', array(), false, 'all');
    wp_enqueue_style('sass');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function include_jquery()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', '', 1, true);
    add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');

function loadjs()
{

    wp_register_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), 1, true);
    wp_enqueue_script('bootstrapjs');

    wp_register_script('customjs', get_template_directory_uri() . '/dist/app.js', '', 1, true);
    wp_enqueue_script('customjs');
}

add_action('wp_enqueue_scripts', 'loadjs');

add_theme_support('menus');

register_nav_menus(array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme')
));

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
        // file does not exist... return an error.
        return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
    } else {
        // file exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}
add_action('after_setup_theme', 'register_navwalker');

/**
 * Define Custom Post Types
 */
function task_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Tasks',
            'singular_name' => 'Task'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-hammer'
    );

    register_post_type('tasks', $args);
}

add_action('init', 'task_post_type');

function task_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Task Types',
            'singular_name' => 'Task Type'
        ),
        'public' => true,
        'hierarchical' => true
    );

    register_taxonomy('task_types', array('tasks'), $args);
}
add_action('init', 'task_taxonomy');

function project_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-networking'
    );

    register_post_type('projects', $args);
}

add_action('init', 'project_post_type');

function project_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Project Types',
            'singular_name' => 'Project Type'
        ),
        'public' => true,
        'hierarchical' => true
    );

    register_taxonomy('project_types', array('projects'), $args);
}
add_action('init', 'project_taxonomy');
