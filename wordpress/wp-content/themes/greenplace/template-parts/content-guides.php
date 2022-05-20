<?php
/**
 * Template part for displaying ...
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

/**
 *
 */
// function filter_case($orderby = '') {
// 	$orderby .= " CASE WHEN wp_postmeta.meta_value RLIKE '^[0-9]' THEN '' ELSE wp_postmeta.meta_value END ASC, wp_postmeta.meta_value+0 ASC";

// 	return $orderby;
// }

// add_filter( 'posts_orderby', 'filter_case' );

$last_guide = new WP_Query(array(
    'post_type' => 'guide',
    'posts_per_page' => 1,
    'meta_key' => 'version',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
));

// echo $last_guide->request;

// remove_filter( 'posts_orderby', 'filter_case' );

$two_next_guides = new WP_Query(array(
    'post_type' => 'guide',
    'posts_per_page' => 2,
    'meta_key' => 'version',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'offset' => 1
));

?>


<style type="text/css">
    /**/
    /*    *, ::after, ::before {*/

    /*        box-sizing: border-box;*/

    /*        -webkit-box-sizing: border-box;*/

    /*        -moz-box-sizing: border-box;*/

    /*    }*/

    .tabs {
        /*display: flex;*/
        /*flex-wrap: wrap;*/
        /*height: auto;*/
        width: 100%;
        /*margin-bottom: 20px*/;
    }

    .tabs ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
        /*border-bottom: 1px solid #eee;*/
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .tabs ul li {
        width: 50%;
        justify-content: center;


    }

    .tabs ul li a {
        display: block;
        outline: none;
        /*padding: 0.5rem;*/
        padding: 0.5rem 2rem;
        text-decoration: none;
        /*border: 1px solid #eee;*/
        border-bottom: 0;
        background-color: #eee;
        color: #455AFF;
        transform: translateY(1px);
        -webkit-transform: translateY(1px);
        -moz-transform: translateY(1px);

    }

    .tabs ul li a.active {
        background-color: #FFF;
        color: #0c0c0c;
    }

    .tabs ul li.active {
        background-color: red;
    }

    .tabs > div > div {
        display: none;
        /*border: 1px solid #eee;*/
        border-top: 0;
        padding: 1.5rem 2rem 0.4rem;
    }

    .tabs > div > div.active {
        display: block;
    }

    .tabs .fw-450 {
        font-weight: normal;
    }

    .tabs .fw-450 i {
        font-weight: bold;
        margin-right: 0.5rem;
        color: #F97A70;
    }


    .tabs .previous-versions {
        display: flex;
        justify-content: space-between;
    }

    .tabs .previous-versions .fw-450 {
        font-weight: normal;
        font-size: 0.8rem;
    }


    .tabs .row a {
        color: #455AFF;
    }

    .tabs .row h5 {
        margin-bottom: 0.7rem;
    }

    .tabs .mb-3, .my-3 {
        margin-bottom: 1.9rem !important;
    }


</style>


<div class="tabs">

    <ul>

        <li><a href="#">Guia USTIBB <br> Acionamento</a></li>

        <li><a href="#">Guia USTIBB <br> fábrica</a></li>

    </ul>

    <div>
        <div>
            <div class="row">
                <?php
                if ($last_guide->have_posts()):

                    while ($last_guide->have_posts()) : $last_guide->the_post();
                        ?>

                        <div class="col col--sm">
                            <div class="mb-3">
                                <h5>Versão Atual:</h5>
                                <a class="fw-450" href="<?php the_field('file'); ?>" target="_blank">
                                    <i class="i i--download tx-muted"></i>
                                    <span>Guia USTIBB versão <?php the_field('version'); ?></span>
                                </a>
                            </div>
                        </div>


                    <?php endwhile;

                endif;

                wp_reset_postdata();
                ?>
            </div>

            <div class="row">


                <div class="col col--sm">
                    <h5>Versões Anteriores :</h5>
                    <div class="mb-3 previous-versions">
                        <?php
                        if ($two_next_guides->have_posts()):

                            while ($two_next_guides->have_posts()) : $two_next_guides->the_post();
                                ?>


                                <a class="fw-450" href="<?php the_field('file'); ?>" target="_blank">
                                    <i class="i i--download tx-muted"></i>
                                    <span>Guia USTIBB <?php the_field('version'); ?></span>
                                </a>
                            <?php endwhile;

                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>

                </div>


            </div>
        </div>

        <div>

            <div class="row">
                <?php
                if ($last_guide->have_posts()):

                    while ($last_guide->have_posts()) : $last_guide->the_post();
                        ?>

                        <div class="col col--sm">
                            <div class="mb-3">
                                <h5>Versão Atual fábrica:</h5>
                                <a class="fw-450" href="<?php the_field('file'); ?>" target="_blank">
                                    <i class="i i--download tx-muted"></i>
                                    <span>Guia USTIBB versão <?php the_field('version'); ?></span>
                                </a>
                            </div>
                        </div>


                    <?php endwhile;

                endif;

                wp_reset_postdata();
                ?>
            </div>

            <div class="row">


                <div class="col col--sm">
                    <h5>Versões Anteriores fábrica:</h5>
                    <div class="mb-3 previous-versions">
                        <?php
                        if ($two_next_guides->have_posts()):

                            while ($two_next_guides->have_posts()) : $two_next_guides->the_post();
                                ?>


                                <a class="fw-450" href="<?php the_field('file'); ?>" target="_blank">
                                    <i class="i i--download tx-muted"></i>
                                    <span>Guia USTIBB <?php the_field('version'); ?></span>
                                </a>
                            <?php endwhile;

                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>


<script type="text/javascript">


    tabs(document.querySelector('.tabs'));

    function tabs(parameter) {
        const tabTriggers = parameter.children[0], tabContents = parameter.children[1];

        tabTriggers.children[0].firstElementChild.classList.add('active');
        tabContents.children[0].classList.add('active');

        for (let i = 0; i < tabTriggers.children.length; i++) {
            tabTriggers.children[i].firstElementChild.dataset.tab = i;
            tabContents.children[i].dataset.tab = i;

            tabTriggers.children[i].addEventListener('click', e => {
                e.preventDefault();
                for (let j = 0; j < tabContents.children.length; j++) {
                    tabContents.children[j].dataset.tab == tabTriggers.children[i].firstElementChild.dataset.tab ? tabContents.children[j].classList.add('active') : tabContents.children[j].classList.remove('active');
                    tabTriggers.children[j].firstElementChild.dataset.tab == tabTriggers.children[i].firstElementChild.dataset.tab ? tabTriggers.children[j].firstElementChild.classList.add('active') : tabTriggers.children[j].firstElementChild.classList.remove('active');
                }
            });
        }
    }


</script>
