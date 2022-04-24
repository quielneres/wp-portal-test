<?php

$posts = $args;

?>

<style>
    .question_cat {
        padding-left: 4.5rem;
        padding-top: 0;
        padding-bottom: 0;
    }
</style>

<?php
if ( $posts ):

foreach($posts as $post):

setup_postdata( $post )
?>

<div class=" question_cat content__body">
    <a class="question__id question__link question__bu" href="#"></a>


    <h2 class="question__title ">
        <a class="question__link" href="#"><?php the_title(); ?></a>
    </h2>

    <div class="question__answer">
        <?php the_content(); ?>
    </div>
</div>

<?php endforeach;

endif;

wp_reset_postdata();

?>