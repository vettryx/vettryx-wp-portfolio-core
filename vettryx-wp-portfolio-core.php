<?php
/**
 * Plugin Name: VETTRYX WP Portfolio Core
 * Plugin URI:  https://github.com/vettryx/vettryx-wp-portfolio-core
 * Description: Plugin Core para o site da VETTRYX. Gerencia Portfólio, Skills e Shortcodes Institucionais.
 * Version:     1.3.1
 * Author:      VETTRYX Tech
 * Author URI:  https://vettryx.com.br
 * License:     GPLv3 or later
 */

// Evita acesso direto ao arquivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Inicializa o Plugin Update Checker (GitHub)
 */
$puc_file = plugin_dir_path(__FILE__) . 'vendor/plugin-update-checker/plugin-update-checker.php';

if (file_exists($puc_file)) {
    require_once $puc_file;
    
    // Instancia o PUC proceduralmente (sem usar $this)
    $vettryx_portfolio_update_checker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
        'https://github.com/vettryx/vettryx-wp-portfolio-core',
        __FILE__,
        'vettryx-wp-portfolio-core'
    );

    // Define a branch que o PUC deve monitorar para atualizações (pode ser 'main', 'master' ou qualquer outra)
    $vettryx_portfolio_update_checker->setBranch('main');
    
    // Habilita o suporte para arquivos de lançamento (release assets) no GitHub, permitindo que o PUC baixe o .zip do release automaticamente.
    $vettryx_portfolio_update_checker->getVcsApi()->enableReleaseAssets();
}

// Carrega os módulos da pasta includes
require_once plugin_dir_path(__FILE__) . 'includes/post-types.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';

/**
 * Declaração de conformidade com a API de Consentimento
 */
add_action('plugins_loaded', function() {
    $plugin_slug = plugin_basename(__FILE__);
    add_filter("wp_consent_api_registered_{$plugin_slug}", '__return_true');
});
