# VETTRYX WP Portfolio Core

> O motor central de funcionalidades para o ecossistema digital da VETTRYX Tech.

Este plugin atua como o **Core Plugin** do site institucional da VETTRYX. Ele foi desenvolvido para desacoplar a lógica de negócios (Portfólio, Skills e Identidade) do tema visual (Elementor/Divi), garantindo que os dados permaneçam intactos independentemente de mudanças no design.

## 🚀 Funcionalidades

* **Custom Post Types (CPT):**
  * `projects`: Gerenciamento de portfólio com suporte a editor clássico e imagem destacada.
    * `skills`: Cadastro de habilidades técnicas.
* **Campos Personalizados (Meta Boxes):**
  * Campos nativos para inserção de *URL do Projeto* e *Nome da Empresa/Cliente* sem depender de plugins pesados como ACF.
* **Shortcodes Institucionais:**
  * Vitrine de projetos automática (Grid CSS).
  * Copyright com atualização automática de ano.
  * Créditos de desenvolvimento com consumo de API externa.
* **Arquitetura Modular:** Código organizado em módulos (includes) para fácil manutenção.

## 📂 Estrutura do Projeto

O plugin segue uma estrutura limpa para facilitar a escalabilidade:

```text
vettryx-wp-portfolio-core/
├── includes/
│   ├── meta-boxes.php    # Gerenciamento de campos personalizados (Admin)
│   ├── post-types.php    # Registro de CPTs (Projetos e Skills)
│   └── shortcodes.php    # Renderização de componentes no Front-end
├── vettryx-wp-portfolio-core.php  # Arquivo mestre (Loader)
└── README.md
