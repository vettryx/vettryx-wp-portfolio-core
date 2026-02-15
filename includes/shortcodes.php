<?php
if (!defined('ABSPATH')) exit;

// --- 1. VITRINE DE PROJETOS (GRID) ---
add_shortcode('vitrine_vettryx', function() {
    $query = new WP_Query(['post_type' => 'projects', 'posts_per_page' => -1]);
    
    // HTML com CSS inline para garantir funcionamento independente do tema
    $html = '<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; padding: 20px;">';
    
    while ($query->have_posts()) : $query->the_post();
        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $link = get_permalink();
        $title = get_the_title();
        $excerpt = get_the_excerpt();
        
        $html .= '
        <div class="card-vettryx" style="background: #101e2c; border-radius: 20px; overflow: hidden; border: 1px solid #1e2d3d;">
            <img src="'.$img.'" style="width:100%; height: 200px; object-fit: cover;">
            <div style="padding: 25px; color: #fff; font-family: sans-serif;">
                <h3 style="margin: 0 0 10px 0;">' . $title . '</h3>
                <p style="color: #a5b4c0; font-size: 14px;">' . $excerpt . '</p>
                <a href="'.$link.'" style="color: #00ff88; text-decoration: none; font-weight: bold; text-transform: uppercase; font-size: 12px;">VER DETALHES →</a>
            </div>
        </div>';
    endwhile;
    
    wp_reset_postdata();
    return $html . '</div>';
});

// --- 2. COPYRIGHT DINÂMICO ---
add_shortcode('vettryx_copyright', function() {
    $ano = date('Y');
    $nome_site = get_bloginfo('name');
    return "&copy; {$ano} {$nome_site}. Todos os direitos reservados.";
});

// --- 3. CRÉDITOS DO DESENVOLVEDOR ---
add_shortcode('vettryx_developer', function($atts) {
    $a = shortcode_atts(['modo' => 'cliente'], $atts);

    // CONFIGURAÇÕES
    $url_api = 'https://vettryx.com.br/wp-json'; 
    $url_site = 'https://vettryx.com.br';
    $link_perfil_andre = 'https://linkedin.com/in/andreventura'; // Atualize conforme preferir

    // MODO INTERNO (Seu site)
    if ($a['modo'] === 'interno') {
        return 'Desenvolvido por: <a href="' . esc_url($link_perfil_andre) . '" target="_blank" rel="noopener" style="color:inherit; text-decoration:none;"><strong>André Ventura</strong></a>';
    }

    // MODO CLIENTE (Busca externa)
    $nome_vettryx = get_transient('vettryx_brand_name');

    if (false === $nome_vettryx) {
        $response = wp_remote_get($url_api);
        
        if (is_wp_error($response)) {
            $nome_vettryx = 'VETTRYX Tech';
        } else {
            $dados = json_decode(wp_remote_retrieve_body($response), true);
            $nome_vettryx = isset($dados['name']) ? $dados['name'] : 'VETTRYX Tech';
            set_transient('vettryx_brand_name', $nome_vettryx, 86400);
        }
    }

    return 'Desenvolvido por: <a href="' . esc_url($url_site) . '" target="_blank" rel="noopener" style="color:inherit; text-decoration:none;"><strong>' . esc_html($nome_vettryx) . '</strong></a>';
});
