<?php
/**
 * Template Name: Employee Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

?>
<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">


<main class="layout__body">
    <?php get_template_part('template-parts/page-headline', get_post_type()); ?>

    <div class="container pt-4 pb-2 fx-grow">
        <div class="content">

            <?php foreach (get_employees() as $index => $value): setup_postdata($value); ?>
                <div class="content__body employee ">

                    <a class="employee__id employee__link employee__icon__index employee__link__index index_employee"
                       href="#"></a>
                    <h2 class="employee__title index_question">
                        <a class="employee__link__category" href="#"><?= $value->post_title ?></a>
                    </h2>

                    <div class="employee__answer__category">
                        <?php the_content(); ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
