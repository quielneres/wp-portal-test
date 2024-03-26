<?php

class OutsourcingJourney
{
    public function get_outsourcing_journey(): array
    {
        $outsourcing_journey = get_posts(array(
			'post_type'      => 'outsourcing_journey',
			'posts_per_page' => -1,
			'meta_key'       => 'order',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
        ));

        $result = array();

        foreach ($outsourcing_journey as $post) {
            $result[] = [
                'title'  => $post->post_title,
                'link'   => $post->link,
            ];
        }

        return $result;
    }
}

