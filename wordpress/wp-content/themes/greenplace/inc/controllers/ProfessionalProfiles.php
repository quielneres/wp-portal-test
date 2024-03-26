<?php

class ProfessionalProfiles
{

    public function get_professional_profiles(): array
    {
        $professional_profiles = get_posts(array(
			'post_type'      => 'professional_profile',
			'posts_per_page' => -1,
			'meta_key'       => 'order',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
        ));

        $result = array();

        foreach ($professional_profiles as $post) {
            $result[] = [
                'title'  => $post->post_title,
                'link'   => $post->link,
            ];
        }

        return $result;
    }

}
