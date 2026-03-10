<?php
/**
 * Plugin Name: VETTRYX WP Portfolio Core
 * Plugin URI:  https://github.com/vettryx/vettryx-wp-portfolio-core
 * Description: Plugin Core para o site da VETTRYX. Gerencia Portfólio, Skills e Shortcodes Institucionais.
 * Version:     1.3.0
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
    public function init_update_checker() {

        // Verifica se o arquivo do PUC existe antes de tentar incluí-lo, para evitar erros caso o autoload do Composer não esteja configurado corretamente.
        $puc_file = plugin_dir_path(__FILE__) . 'vendor/plugin-update-checker/plugin-update-checker.php';

        // Se o arquivo do PUC não existir, simplesmente retorna sem inicializar o sistema de atualização, permitindo que o plugin funcione normalmente sem atualizações automáticas.
        if (!file_exists($puc_file)) {
            return;
        }

        // Inclui o arquivo do PUC para ter acesso às suas funcionalidades e classes necessárias para configurar o sistema de atualização automática.
        require_once $puc_file;

        // Configura o PUC para apontar para o repositório correto no GitHub
        $this->update_checker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
            'https://github.com/vettryx/vettryx-wp-portfolio-core',
            __FILE__,
            'vettryx-wp-portfolio-core'
        );

        // Define a branch que o PUC deve monitorar para atualizações (pode ser 'main', 'master' ou qualquer outra)
        $this->update_checker->setBranch('main');

        // Habilita o suporte para arquivos de lançamento (release assets) no GitHub, permitindo que o PUC baixe o .zip do release automaticamente.
        $this->update_checker->getVcsApi()->enableReleaseAssets();

        // Adiciona um filtro para personalizar as informações do plugin exibidas na tela de atualizações, incluindo os ícones personalizados.
        $this->update_checker->addResultFilter(function ($info) {
            $info->icons = [
                '1x' => plugin_dir_url(__FILE__) . 'assets/icon-128x128.png',
                '2x' => plugin_dir_url(__FILE__) . 'assets/icon-256x256.png',
            ];
            return $info;
        });
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
