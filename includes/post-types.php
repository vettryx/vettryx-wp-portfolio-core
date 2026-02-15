<?php
if (!defined('ABSPATH')) exit;

add_action('init', function() {
    // 1. REGISTRAR PROJETOS
    register_post_type('projects', [
        'labels' => ['name' => 'Projetos', 'singular_name' => 'Projeto'],
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'],
        'show_in_rest' => true,
    ]);

    // 2. REGISTRAR SKILLS
    register_post_type('skills', [
        'labels' => ['name' => 'Skills', 'singular_name' => 'Skill'],
        'public' => true,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'thumbnail', 'custom-fields'],
        'show_in_rest' => true,
    ]);
});
