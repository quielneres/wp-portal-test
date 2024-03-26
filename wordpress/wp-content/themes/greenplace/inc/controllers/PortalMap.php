<?php

class PortalMap
{
	function get_map_footer(): array
	{
		$maps_portal = get_posts(array(
			'post_type' => 'portal-map',
			'posts_per_page' => -1,
		));

		$unique_categories = array();

		$field_key = 'field_658454b9190b0';
		$field = acf_get_field($field_key);
		$category_choices = $field['choices'];

		$category_keys = array_keys($category_choices);

		foreach ($maps_portal as $post) {
			$category_key = get_post_meta($post->ID, 'category', true);

			if ($category_key && in_array($category_key, $category_keys)) {
				$category_value = $category_choices[$category_key];
				$unique_categories[$category_key] = $category_value;
			}
		}

		$result = array();

		foreach ($category_keys as $key) {
			if (isset($unique_categories[$key])) {
				$args = array(
					'post_type' => 'portal-map',
					'posts_per_page' => -1,
					'meta_query' => array(
						array(
							'key' => 'category',
							'value' => $key,
						),
					),
					'meta_key' => 'order',
					'meta_type' => 'NUMERIC',
					'orderby' => 'meta_value',
					'order' => 'ASC',
				);

				$category_posts = get_posts($args);

				foreach ($category_posts as $category_post) {
					$category_link = get_post_meta($category_post->ID, 'link', true);
					$result[$category_choices[$key]][] = [
						'post_type' => $category_post->post_title,
						'description' => $category_link['title'],
						'url' => $category_link['url'],
						'target' => $category_link['target']
					];
				}
			}
		}

		return $result;
	}
}
