<?php
/**
 * Template Name: Questions Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$filter_questions = new Stt_filter_question();
$questions = (object) $filter_questions->get_questions();

?>

<main class="layout__body">
    <?php get_template_part('template-parts/page-headline', get_post_type()); ?>

  <div class="container pt-4 pb-2 fx-grow">
    <div class="content">
      <div class="widget">
        <div class="widget__body">

            <?php get_template_part('template-parts/widget-filter-question', ''); ?>

          <hr class="hr">

          <div id="todos-questions">
              <?php
              if ($questions->todos):
                  foreach ($questions->todos as $post):

                      setup_postdata($post)
                      ?>
                      <?php get_template_part('template-parts/list-question', ''); ?>
                  <?php endforeach;
              endif;
              wp_reset_postdata();
              ?>
          </div>
          <div id="ustibb-questions" style="display: none">
              <?php
              if ($questions->ustibb):
                  foreach ($questions->ustibb as $post):

                      setup_postdata($post)
                      ?>
                      <?php get_template_part('template-parts/list-question', ''); ?>
                  <?php endforeach;
              endif;
              wp_reset_postdata();
              ?>
          </div>
          <div id="contrato-questions" style="display: none">
              <?php
              if ($questions->contrato):
                  foreach ($questions->contrato as $post):

                      setup_postdata($post)
                      ?>
                      <?php get_template_part('template-parts/list-question', ''); ?>
                  <?php endforeach;
              endif;
              wp_reset_postdata();
              ?>
          </div>
          <div id="outros-questions" style="display: none">
              <?php
              if ($questions->outros):
                  foreach ($questions->outros as $post):

                      setup_postdata($post)
                      ?>
                      <?php get_template_part('template-parts/list-question', ''); ?>
                  <?php endforeach;
              endif;
              wp_reset_postdata();
              ?>
          </div>


        </div>
      </div>


    </div>
  </div>

    <?php get_template_part('template-parts/content-call-contact', get_post_type()); ?>
</main>

<?php get_footer(); ?>

<script>
    jQuery(document).ready(function ($) {


        jQuery('.select-category-question').click(function () {

            let category = jQuery(this).data('category')

            const todos_questions = jQuery('#todos-questions')
            const ustibb_questions = jQuery('#ustibb-questions')
            const contrato_questions = jQuery('#contrato-questions')
            const outros_questions = jQuery('#outros-questions')

            if (category === 'todos') {
                ustibb_questions.hide()
                contrato_questions.hide()
                outros_questions.hide()
                todos_questions.show()
            }

            if (category === 'ustibb') {

                todos_questions.hide()
                contrato_questions.hide()
                outros_questions.hide()

                ustibb_questions.show()
            }

            if (category === 'contrato') {
                todos_questions.hide()
                ustibb_questions.hide()
                outros_questions.hide()

                contrato_questions.show()
            }

            if (category === 'outros') {
                todos_questions.hide()
                ustibb_questions.hide()
                contrato_questions.hide()

                outros_questions.show()
            }

        })

    })
</script>
