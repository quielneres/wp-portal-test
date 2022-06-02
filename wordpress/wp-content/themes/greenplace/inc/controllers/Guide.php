<?php

class Guide
{
    public function list_guides($category)
    {
        $last_guide = new WP_Query(array(
            'post_type' => $category,
            'posts_per_page' => 1,
            'meta_key' => 'version',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ));

        $two_next_guides = new WP_Query(array(
            'post_type' => $category,
            'posts_per_page' => 2,
            'meta_key' => 'version',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'offset' => 1
        ));

        return [
            'last_guide'      => $last_guide,
            'two_next_guides' => $two_next_guides
        ];
    }
}