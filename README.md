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
````

## 🛠️ Instalação

1. Faça o download do arquivo `.zip` deste repositório (ou clone na pasta de plugins).
2. No painel do WordPress, vá em **Plugins > Adicionar Novo > Enviar Plugin**.
3. Faça o upload e clique em **Ativar**.
4. Os menus "Projetos" e "Skills" aparecerão automaticamente na barra lateral.

## 💻 Documentação dos Shortcodes

Utilize os shortcodes abaixo dentro do Elementor ou Editor de Blocos:

### 1. Vitrine de Projetos

Exibe um grid responsivo com os últimos projetos cadastrados, incluindo imagem, título, resumo e link.
`[vitrine_vettryx]`

### 2. Rodapé Dinâmico (Copyright)

Exibe o símbolo de copyright, o ano atual (automático via PHP) e o nome do site configurado.
`[vettryx_copyright]`
*Saída:* © 2026 VETTRYX Tech. Todos os direitos reservados.

### 3. Assinatura do Desenvolvedor

Exibe os créditos. Possui dois modos de operação:

**Modo Interno (Para o site da agência):**
Linka diretamente para o perfil do desenvolvedor (André Ventura).
`[vettryx_developer modo="interno"]`

**Modo Cliente (Para sites de terceiros):**
Busca o nome da VETTRYX via API JSON para garantir que a marca esteja sempre atualizada, com cache de 24h para performance.
`[vettryx_developer modo="cliente"]`

## 📝 Requisitos

* PHP 7.4 ou superior.
* WordPress 6.0 ou superior.

---

**Desenvolvido por André Ventura**
*Engenheiro de Software | VETTRYX Tech*
