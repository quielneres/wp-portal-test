<?php

class CustomRewriteService
{

	public function getPostTypeIndexs(): array
	{
		$translations = array(
			"system" => [
				"index" => "sistema",
				"index_plural" => "sistemas",
				"title" => "Sistema",
				"title_plural" => "Sistemas",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-admin-generic',
			],
			"company" => [
				"index" => "empresa",
				"index_plural" => "empresas",
				"title" => "Empresa",
				"title_plural" => "Empresas",
				"article" => "a",
				"pronoun" => "esta",
				"preposition" => "de",
				"contraction" => "da",
				"personal_pronoun" => "na",
				"indefinite pronoun" => "Nenhuma",
				'menu_icon' => 'dashicons-businessman',

			],
			"process" => [
				"index" => "processo",
				"index_plural" => "processos",
				"title" => "Processo",
				"title_plural" => "Processos",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-book-alt',
			],
			"contract" => [
				"index" => "contrato",
				"index_plural" => "contratos",
				"title" => "Contrato",
				"title_plural" => "Contratos",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-text-page',
			],
			"tutorial" => [
				"index" => "tutorial",
				"index_plural" => "tutoriais",
				"title" => "Tutorial",
				"title_plural" => "Tutoriais",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-welcome-learn-more',
			],
			"panel" => [
				"index" => "painel",
				"index_plural" => "paineis",
				"title" => "Painel",
				"title_plural" => "Paineis",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-chart-area',
			],
			"question" => [
				"index" => "pergunta",
				"index_plural" => "perguntas",
				"title" => "Pergunta",
				"title_plural" => "Perguntas",
				"article" => "a",
				"pronoun" => "esta",
				"preposition" => "de",
				"contraction" => "da",
				"personal_pronoun" => "na",
				"indefinite pronoun" => "Nenhuma",
				'menu_icon' => 'dashicons-editor-help',
			],
			"bulletin" => [
				"index" => "comunicado",
				"index_plural" => "comunicados",
				"title" => "Comunicado",
				"title_plural" => "Comunicados",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-megaphone',
			],
			"guide" => [
				"index" => "guia",
				"index_plural" => "guias",
				"title" => "Guia",
				"title_plural" => "Guias",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-book',
			],
			"guide-acionamento" => [
				"index" => "guia-acionamento",
				"index_plural" => "guias-acionamento",
				"title" => "Guia Acionamento",
				"title_plural" => "Guias Acionamento",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-book',
			],
			"employee" => [
				"index" => "onboard",
				"index_plural" => "onboarding",
				"title" => "Onboarding",
				"title_plural" => "Onboarding",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-editor-help',
			],
			"user" => [
				"index" => "usuario",
				"index_plural" => "usuarios",
				"title" => "Usuário",
				"title_plural" => "Usuários",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-admin-post',
			],
			"team" => [
				"index" => "equipe",
				"index_plural" => "equipes",
				"title" => "Equipe",
				"title_plural" => "Equipes",
				"article" => "a",
				"pronoun" => "esta",
				"preposition" => "de",
				"contraction" => "da",
				"personal_pronoun" => "na",
				"indefinite pronoun" => "Nenhuma",
				'menu_icon' => 'dashicons-businessman',
			],
			"simple" => [
				"index" => "simples",
				"index_plural" => "simples",
				"title" => "Simples",
				"title_plural" => "Simples",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-book-alt',
			],
			"portal-map" => [
				"index" => "mapa-do-portal",
				"index_plural" => "mapas-do-portal",
				"title" => "Mapa do Portal",
				"title_plural" => "Mapas do Portal",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-book-alt',
			],
			"professional_profile" => [
				"index" => "perfil-professional",
				"index_plural" => "perfis-profissionais",
				"title" => "Perfil Profissional",
				"title_plural" => "Perfis Profissionais",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-book-alt',
			],
			"outsourcing_journey" => [
				"index" => "jornada-de-terceirização",
				"index_plural" => "jornadas-de-terceirizações",
				"title" => "Jornada de Terceirização",
				"title_plural" => "Jornadas de Terceirizações",
				"article" => "o",
				"pronoun" => "este",
				"preposition" => "de",
				"contraction" => "do",
				"personal_pronoun" => "no",
				"indefinite pronoun" => "Nenhum",
				'menu_icon' => 'dashicons-book-alt',
			],
		);

		return $translations;
	}

	public function getPostType(): array
	{
		$post_types = $this->getPostTypeIndexs();
		$reserved_post_types = $this->postTypesReserved();

		$group_post_type = [];

		foreach ($post_types as $item => $post_type) {
			// Verifica se o post type está na lista de reservados
			if (in_array($post_type, $reserved_post_types)) {
				continue; // Ignora post type reservado
			}

			$args = [
				'index' => $item,
				'translation' => $post_type['index_plural'],
				'labels' => [
					'name' => ucfirst($post_type['title_plural']),
					'singular_name' => ucfirst($post_type['title']),
					'all_items' => "Todos " . $post_type['article'] . "s " . ucfirst($post_type['title_plural']),
					'archives' => "Arquivos " . $post_type['preposition'] . " " . ucfirst($post_type['title']),
					'attributes' => "Atributos " . $post_type['contraction'] . " " . ucfirst($post_type['title']),
					'insert_into_item' => "Inserir " . $post_type['personal_pronoun'] . " " . $post_type['title'],
					'uploaded_to_this_item' => "Enviado para " . $post_type['pronoun'] . " " . $post_type['title'],
					'featured_image' => "Imagem em Destaque " . $post_type['contraction'] . " " . $post_type['title'],
					'set_featured_image' => "Definir imagem em destaque " . $post_type['contraction'] . " " . $post_type['title'],
					'remove_featured_image' => "Remover imagem em destaque " . $post_type['contraction'] . " " . $post_type['title'],
					'use_featured_image' => "Usar como imagem em destaque " . $post_type['contraction'] . " " . $post_type['title'],
					'filter_items_list' => "Filtrar lista " . $post_type['preposition'] . " " . $post_type['index_plural'],
					'items_list_navigation' => "Navegação na lista " . $post_type['preposition'] . " " . $post_type['index_plural'],
					'items_list' => "Lista " . $post_type['preposition'] . " " . ucfirst($post_type['title_plural']),
					'new_item' => "Novo " . ucfirst($post_type['title_plural']),
					'add_new' => "Adicionar Nov" . $post_type['article'] . " " . ucfirst($post_type['title']),
					'add_new_item' => "Adicionar Nov" . $post_type['article'] . " " . ucfirst($post_type['title']),
					'edit_item' => "Editar " . ucfirst($post_type['title']),
					'view_item' => "Visualizar " . ucfirst($post_type['title']),
					'view_items' => "Visualizar " . ucfirst($post_type['title']),
					'search_items' => "Pesquisar " . $post_type['title'],
					'not_found' => $post_type['indefinite pronoun'] . " " . $post_type['title'] . " encontrad" . $post_type['article'],
					'not_found_in_trash' => $post_type['indefinite pronoun'] . " " . $post_type['title'] . " encontrad" . $post_type['article'] . " na lixeira",
					'parent_item_colon' => ucfirst($post_type['title']) . " Pai:",
					'menu_name' => ucfirst($post_type['title_plural']),
					'menu_icon' => $post_type['menu_icon'],
				]
			];

			$group_post_type[] = $args;
		}

		return $group_post_type;
	}

	public function postTypesReserved(): array
	{
		return [
			'post',
			'page',
			'attachment',
			'revision',
			'nav_menu_item',
			'custom_css',
			'customize_changeset',
			'oembed_cache',
			'user_request',
			'wp_block',
			'wp_template',
			'wp_template_part',
			'wp_global_styles',
			'wp_navigation',
			'acf-field-group',
			'acf-field',
			'wpcf7_contact_form'
		];
	}
}
