<?php

class Employee
{

	public function list_employees(): array
	{
        return get_posts( array(
            'post_type'      => 'employee',
            'posts_per_page' => -1,
            'meta_key'       => 'order',
            'meta_type'      => 'NUMERIC',
            'orderby'        => 'meta_value',
            'meta_query'    => array(
                array(
                    'key'       => 'category',
                    'value'     => 'order_topics',
                    'compare'   => '=',
                ),
            ),
            'order'          => 'ASC'
        ) );
	}
}

