<?php
if (!defined('ABSPATH')) exit;

// Adicionar a caixa de campos no editor
add_action('add_meta_boxes', function() {
    add_meta_box('project_details', 'Detalhes do Projeto', function($post) {
        $url = get_post_meta($post->ID, 'project_url', true);
        $company = get_post_meta($post->ID, 'project_company', true);
        ?>
        <p>
            <label><strong>URL do Projeto:</strong></label><br>
            <input type="url" name="project_url" value="<?php echo esc_attr($url); ?>" style="width:100%;">
        </p>
        <p>
            <label><strong>Nome da Empresa/Cliente:</strong></label><br>
            <input type="text" name="project_company" value="<?php echo esc_attr($company); ?>" style="width:100%;">
        </p>
        <?php
    }, 'projects');
});

// Salvar os dados quando o post for atualizado
add_action('save_post', function($post_id) {
    // Verificações de segurança e salvamento
    if (isset($_POST['project_url'])) {
        update_post_meta($post_id, 'project_url', sanitize_text_field($_POST['project_url']));
    }
    if (isset($_POST['project_company'])) {
        update_post_meta($post_id, 'project_company', sanitize_text_field($_POST['project_company']));
    }
});
