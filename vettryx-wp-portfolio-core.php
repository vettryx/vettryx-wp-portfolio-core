<?php
/**
 * Plugin Name: VETTRYX WP Portfolio Core
 * Description: Plugin Core para o site da VETTRYX. Gerencia Portfólio, Skills e Shortcodes Institucionais.
 * Version:     1.1.0
 * Author:      VETTRYX Tech
 * Author URI:  https://vettryx.com.br
 * License:     GPLv3 or later
 */

// Bloqueia acesso direto ao arquivo por segurança
if (!defined('ABSPATH')) {
    exit;
}

// Carrega os módulos da pasta includes
require_once plugin_dir_path(__FILE__) . 'includes/post-types.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
