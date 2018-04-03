<?php
/**
 * LAGD functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LAGD
 */

require 'definitions.php';

add_theme_support('post-thumbnails');
add_filter('show_admin_bar', '__return_false');

add_action('init', function () {
    register_post_type('lagd_person', [
      'labels' => [
            'name' => __('People'),
            'singular_name' => __('Person')
        ],
        'public' => true,
        'supports' => ['title', 'thumbnail']
    ]);
});

add_action('init', function () {
    register_post_type('lagd_game', [
      'labels' => [
            'name' => __('Games'),
            'singular_name' => __('Game')
        ],
        'public' => true,
        'supports' => ['title', 'thumbnail']
    ]);
});

add_action('init', function () {
    register_post_type('lagd_studio', [
        'labels' => [
            'name' => __('Studios'),
            'singular_name' => __('Studio')
        ],
        'public' => true,
        'supports' => ['title', 'thumbnail']
    ]);
});

add_action('init', function () {
    register_post_type('lagd_organization', [
        'labels' => [
            'name' => __('Organizations'),
            'singular_name' => __('Organization')
        ],
        'public' => true,
        'supports' => ['title', 'thumbnail']
    ]);
});
