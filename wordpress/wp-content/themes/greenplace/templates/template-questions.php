<?php
/**
 * Template Name: Questions Template
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

			<?php foreach ( get_question_category() as $index => $value):
                if($index != 'of'):?>
				<div class="content__body question ">

					<a class="question__id question__link question__icon__index question__link__index index_question"
					   href="#"></a>
					<h2 class="question__title index_question">
						<a class="question__link__category" href="#"><?= $value ?></a>
					</h2>


					<div class="question__answer__category">


						<?php foreach (get_questions_faq($index) as $questions): ?>

							<?php $args = [$questions];
							get_template_part('template-parts/content-question-category', null, $args) ?>

						<?php endforeach; ?>

					</div>
				</div>

			<?php endif;

			 endforeach; ?>

		</div>
	</div>
</main>

<?php get_footer(); ?>
