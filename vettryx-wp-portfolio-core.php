<?php
/**
 * Plugin Name: VETTRYX WP Portfolio Core
 * Description: Plugin Core para o site da VETTRYX. Gerencia Portfólio, Skills e Shortcodes Institucionais.
 * Version:     1.0.0
 * Author:      VETTRYX Tech
 * Author URI:  https://vettryx.com.br
 * License:     GPLv3 or later
 */

if (!defined('ABSPATH')) exit;

// --- INÍCIO DA ATUALIZAÇÃO AUTOMÁTICA (GITHUB) ---
// Define o caminho exato do arquivo da biblioteca
$puc_file = plugin_dir_path(__FILE__) . 'plugin-update-checker/plugin-update-checker.php';

// Só executa a atualização se a pasta da biblioteca realmente existir
if (file_exists($puc_file)) {
    require $puc_file;
    
    $myUpdateChecker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
        'https://github.com/vettryx/vettryx-wp-portfolio-core',
        __FILE__,
        'vettryx-wp-portfolio-core'
    );
}
// --- FIM DA ATUALIZAÇÃO AUTOMÁTICA ---

// Carrega os módulos da pasta includes
require_once plugin_dir_path(__FILE__) . 'includes/post-types.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';
