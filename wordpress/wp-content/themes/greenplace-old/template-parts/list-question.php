
<div class="content__body question">
    <div class="question__id"><?php the_field('id'); ?></div>

    <h2 class="question__title">
        <a class="question__link" href="#"><?php the_title(); ?></a>
    </h2>

    <div class="question__answer">
        <?php the_content(); ?>

        <a class="btn btn--primary" href="<?php the_permalink(); ?>">Link da Faq</a>
    </div>
</div>
