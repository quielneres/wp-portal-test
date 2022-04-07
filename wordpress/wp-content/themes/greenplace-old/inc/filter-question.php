<?php

class Stt_filter_question
{
    public function get_questions(): array
    {
        $todos = get_posts(array(
            'post_type' => 'question',
            'posts_per_page' => -1,
            'meta_key' => 'id',
            'meta_type' => 'NUMERIC',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ));

        $contrato = get_posts(array(
            'post_type' => 'question',
            'posts_per_page' => -1,
            'meta_key' => 'category',
            'meta_value' => 'contrato',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ));

        $ustibb = get_posts(array(
            'post_type' => 'question',
            'posts_per_page' => -1,
            'meta_key' => 'category',
            'meta_value' => 'ustibb',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ));

        $outros = get_posts(array(
            'post_type' => 'question',
            'posts_per_page' => -1,
            'meta_key' => 'category',
            'meta_value' => 'of',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        ));

        return array(
            'todos' => $todos,
            'contrato' => $contrato,
            'ustibb' => $ustibb,
            'outros' => $outros,
        );
    }
}
