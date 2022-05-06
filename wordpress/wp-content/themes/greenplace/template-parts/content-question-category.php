<?php

$posts = $args;

?>

<style>
    .list_question {
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

<div class=" content__body list_question">
    <a class="question__id question__link question__icon__list list_question_action question__link__list" href="#"></a>


    <h2 class="question__title list_question_action">
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