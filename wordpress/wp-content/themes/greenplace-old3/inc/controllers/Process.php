<?php

require get_template_directory() . '/inc/controllers/Controller.php';


class Process extends Controller
{
    public function list_process($category): array
    {
        return  $this->get_posts([
            'post_type' => 'process',
            'meta_key'  => 'categoria',
            'value'  => $category,
        ]);
    }
}