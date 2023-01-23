<?php


abstract class Controller
{

    public function get_posts($params): array
    {
        return get_posts( array(
            'post_type'      => "{$params['post_type']}",
            'posts_per_page' => -1,
            'meta_key'       => 'order',
            'meta_type'      => 'NUMERIC',
            'orderby'        => 'meta_value',
            'meta_query'    => array(
                array(
                    'key'       => "{$params['meta_key']}",
                    'value'     => "{$params['value']}",
                    'compare'   => '=',
                ),
            ),
            'order'          => 'ASC'
        ) );
    }
}