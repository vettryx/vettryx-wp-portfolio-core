# VETTRYX WP Portfolio Core

> O motor de dados estruturados para o portfólio digital da VETTRYX Tech.

Este plugin atua como o **Core Data Provider** do site institucional da VETTRYX. Ele foi reestruturado sob o conceito de *Separation of Concerns* (Separação de Responsabilidades), desacoplando totalmente a lógica de banco de dados da renderização visual. 

O plugin foca exclusivamente em fornecer a infraestrutura de dados (Projetos e Skills), enquanto o design e a vitrine ficam a cargo do Theme Builder (Elementor), garantindo máxima performance e flexibilidade.

## 🚀 Funcionalidades

* **Custom Post Types (CPT):**
  * `projects`: Gerenciamento de portfólio com suporte a editor clássico e imagem destacada.
  * `skills`: Cadastro de habilidades técnicas.
* **Campos Personalizados (Meta Boxes Nativos):**
  * Campos leves em puro PHP para inserção de *URL do Projeto* e *Nome da Empresa/Cliente*, eliminando a dependência de plugins pesados como ACF.
* **Atualizações Automáticas (CI/CD):**
  * Integração nativa com o GitHub via Plugin Update Checker (PUC). Atualizações enviadas para a branch `main` são distribuídas automaticamente para o painel do WordPress.
* **Conformidade LGPD:**
  * Declaração de conformidade pronta para a WP Consent API.

## 📂 Estrutura do Projeto

A arquitetura foi limpa para manter apenas o essencial para a modelagem de dados:

vettryx-wp-portfolio-core/
├── includes/
│   ├── meta-boxes.php          # Gerenciamento de campos personalizados (Admin)
│   └── post-types.php          # Registro de CPTs (Projetos e Skills)
├── plugin-update-checker/      # Biblioteca de atualizações OTA via GitHub
├── vettryx-wp-portfolio-core.php # Arquivo mestre (Loader)
└── README.md

## 🛠️ Instalação e Deploy

O gerenciamento de versão é automatizado. Para a primeira instalação:
1. Faça o download do arquivo `.zip` deste repositório.
2. No painel do WordPress, vá em **Plugins > Adicionar Novo > Enviar Plugin**.
3. Faça o upload e clique em **Ativar**.
4. Os menus "Projetos" e "Skills" aparecerão automaticamente na barra lateral administrativa.
5. As próximas atualizações chegarão automaticamente no painel de Atualizações do WordPress.

## 💻 Integração com o Front-end (Elementor)

Como este plugin é focado em dados (*Headless approach* para o tema), a renderização visual deve ser feita através do seu Page Builder:

* **Vitrine de Projetos:** Utilize o recurso **Loop Builder** ou o widget de **Posts** do Elementor Pro, apontando a "Fonte" para o CPT `Projetos`.
* **Assinatura e Copyright:** Utilize o plugin **VETTRYX WP Core** em conjunto com este. Insira o shortcode `[vettryx_developer modo="interno"]` no rodapé do Elementor para puxar os créditos unificados do ecossistema.

## 📝 Requisitos

* PHP 7.4 ou superior.
* WordPress 6.0 ou superior.

---

**Desenvolvido por André Ventura**
*Engenheiro de Software | VETTRYX Tech*
