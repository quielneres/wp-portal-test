<?php

class Questions
{

    public function list_questions($category): array
    {

        return get_posts( array(
            'post_type'      => 'question',
            'posts_per_page' => -1,
            'meta_key'       => 'category',
            'meta_value'      => "{$category}",
            'orderby'        => 'meta_value',
            'order'          => 'ASC'
        ) );
    }
}