<?php

class Questions
{

	public function list_questions($category): array
	{
		return get_posts( array(
			'post_type'      => 'question',
			'posts_per_page' => -1,
			'meta_key'       => 'order',
			'meta_type'      => 'NUMERIC',
			'orderby'        => 'meta_value',
			'meta_query'    => array(
				array(
					'key'       => "category",
					'value'     => "{$category}",
					'compare'   => '=',
				),
			),
			'order'          => 'ASC'
		) );
	}
}
