<?php
if (!defined('ABSPATH')) exit;

// --- 1. VITRINE DE PROJETOS (GRID) ---
// Mantive o CSS Grid aqui pois é estrutural, não estético. 
// Se tirar isso, os projetos ficam um embaixo do outro.
add_shortcode('vitrine_vettryx', function() {
    $query = new WP_Query(['post_type' => 'projects', 'posts_per_page' => -1]);
    
    $html = '<div class="vettryx-projects-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">';
    
    while ($query->have_posts()) : $query->the_post();
        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $link = get_permalink();
        $title = get_the_title();
        $excerpt = get_the_excerpt();
        
        $html .= '
        <div class="card-vettryx">
            <a href="'.$link.'">
                <img src="'.$img.'" alt="'.$title.'">
            </a>
            <div class="card-body">
                <h3><a href="'.$link.'">' . $title . '</a></h3>
                <p>' . $excerpt . '</p>
                <a href="'.$link.'" class="btn-details">Ver Detalhes</a>
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
    // Retorna texto puro. O Elementor decide a cor e a fonte.
    return "&copy; {$ano} {$nome_site}. Todos os direitos reservados.";
});

// --- 3. CRÉDITOS DO DESENVOLVEDOR ---
add_shortcode('vettryx_developer', function($atts) {
    $a = shortcode_atts(['modo' => 'cliente'], $atts);

    // CONFIGURAÇÕES
    $url_api = 'https://vettryx.com.br/wp-json'; 
    $url_site = 'https://vettryx.com.br';
    $link_perfil_andre = 'https://linkedin.com/in/asventura96'; 

    // MODO INTERNO (Seu site)
    if ($a['modo'] === 'interno') {
        // Removi style, strong e spans. Apenas o link.
        return 'Desenvolvido por: <a href="' . esc_url($link_perfil_andre) . '" target="_blank" rel="noopener">André Ventura</a>';
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

    // Removi style, strong e spans. Apenas o link.
    return 'Desenvolvido por: <a href="' . esc_url($url_site) . '" target="_blank" rel="noopener">' . esc_html($nome_vettryx) . '</a>';
});
