<?php

require_once get_template_directory() . '/inc/services/CustomRewriteService.php';

class CustomRewriteController
{
	private $customRewriteService;

	public function __construct()
	{
		$this->customRewriteService = new CustomRewriteService();

		// Adiciona as regras de reescrita
		add_action('init', array($this, 'custom_rewrite_rules'));

		// Adiciona as tags de reescrita
		add_action('init', array($this, 'custom_rewrite_tags'));

		// Adiciona o filtro para link permanente
		add_filter('post_type_link', array($this, 'custom_post_type_link'), 10, 2);

		// Adiciona a tradução do post type
		add_action('init', array($this, 'custom_post_type_translation'));
	}

	public function custom_rewrite_rules()
	{
		foreach ($this->customRewriteService->getPostTypeIndexs() as $item => $translation) {
			add_rewrite_rule(
				'^' . $translation['index'] . '/([^/]+)/?$',
				'index.php?' . $translation['index'] . '=$matches[1]',
				'top'
			);
		}
	}

	public function custom_rewrite_tags()
	{
		// Adicionar tags para capturar os valores dos post_types traduzidos
		foreach ($this->customRewriteService->getPostTypeIndexs() as $item => $translation) {
			add_rewrite_tag('%' . $translation['index'] . '%', '([^&]+)');
		}
	}

	public function custom_post_type_link($post_link, $post)
	{
		foreach ($this->customRewriteService->getPostTypeIndexs() as $item => $translation) {
			$contract_term = get_the_terms($post, $translation['index']);
			if ($contract_term && is_array($contract_term)) {
				$post_link = str_replace('%' . $translation['index'] . '%', $contract_term[0]->slug, $post_link);
			}
		}
		return $post_link;
	}

	public function custom_post_type_translation()
	{
		foreach ($this->customRewriteService->getPostType() as $type) {

			$labels = array(
				'name' => $type['labels']['name'],
				'singular_name' => $type['labels']['singular_name'],
				'all_items' => $type['labels']['all_items'],
				'archives' => $type['labels']['archives'],
				'attributes' => $type['labels']['attributes'],
				'uploaded_to_this_item' => $type['labels']['uploaded_to_this_item'],
				'featured_image' => $type['labels']['featured_image'],
				'set_featured_image' => $type['labels']['set_featured_image'],
				'remove_featured_image' => $type['labels']['remove_featured_image'],
				'use_featured_image' => $type['labels']['use_featured_image'],
				'filter_items_list' => $type['labels']['filter_items_list'],
				'items_list_navigation' => $type['labels']['items_list_navigation'],
				'items_list' => $type['labels']['items_list'],
				'new_item' => $type['labels']['new_item'],
				'add_new' => $type['labels']['add_new'],
				'add_new_item' => $type['labels']['add_new_item'],
				'edit_item' => $type['labels']['edit_item'],
				'view_item' => $type['labels']['view_item'],
				'view_items' => $type['labels']['view_items'],
				'search_items' => $type['labels']['search_items'],
				'not_found' => $type['labels']['not_found'],
				'not_found_in_trash' => $type['labels']['not_found_in_trash'],
				'parent_item_colon' => $type['labels']['parent_item_colon'],
				'menu_name' => $type['labels']['menu_name'],
			);


			$args= array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'query_var' => true,
				'rewrite' => array('slug' => $type['translation']),
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'menu_icon'  => $type['labels']['menu_icon'],
				'supports' => array('title', 'editor'),
				'show_in_rest' => true,
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			);

			register_post_type($type['index'], $args);
		}

	}
}

new CustomRewriteController(); // Inicia a instância do controlador
?>
