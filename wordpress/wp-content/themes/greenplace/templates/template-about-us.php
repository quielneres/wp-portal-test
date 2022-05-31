<?php
/**
 * Template Name: About Us Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

?>
<style>
    .tx-muted {
        opacity: unset;
    }

    .head__desc {
        opacity: unset;
        font-weight: normal;
    }

    .head--xl {
        font-size: 1.8rem;
        font-weight: 300;
    }

    .blockquote {
        font-weight: 300;
        margin: 0 0 -1rem;
    }

    .blockquote__body ::before, ::after {
        text-decoration: inherit;
        vertical-align: inherit;
        color: #ACA8F5;
    }
</style>

<main class="layout__body">
    <?php get_template_part('template-parts/page-headline', get_post_type()); ?>

    <div class="pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col col--lg-6 col--lg-offset-3 center-lg">
                    <blockquote class="blockquote blockquote--quoted">
                        <p class="blockquote__body">
                            <span class="blockquote__icon"><i class="i i--quote-left tx-white"></i></span>
                            <?php the_field('mission'); ?>
                            <span class="blockquote__icon"><i class="i i--quote-right tx-white"></i></span>
                        </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-yellow pt-4 pb-2 about-us-manager">
        <?php get_template_part('template-parts/content-about-us-manager', get_post_type()); ?>
    </div>

    <div class="container pt-5 pb-2">
        <?php get_template_part('template-parts/content-about-us-manager-teams', get_post_type()); ?>
    </div>
</main>

<?php get_footer(); ?>
