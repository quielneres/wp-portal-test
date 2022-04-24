<?php
/**
 * Template Name: Questions Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();

$questions = get_posts( array(
	'post_type'      => 'question',
	'posts_per_page' => -1,
	'meta_key'       => 'category',
	'meta_value'      => 'of',
	'orderby'        => 'meta_value',
	'order'          => 'ASC'
) );

$categories = [
	'ustibb' => 'USTIBB',
	'contrato' => 'Contrato',
	'of' => 'Outros',
	'acionamento_empresas' => 'Acionamento de empresas'
]
?>
<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
<style>
	.question__bu:before{
		content: '\f054';
		font-family: "Font Awesome 5 Free";
		color: #2c546e;
		display: inline-block;
		font-size: 20px;
		font-weight: 700;
		width: 32px;
	}
	.question__bu__active:after{
		content: '\f078';
		font-family: "Font Awesome 5 Free";
		color: #2c546e;
		display: inline-block;
		font-size: 20px;
		font-weight: 700;
		width: 32px;
	}


</style>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow">
		<div class="content">

			<?php foreach ($categories as $index => $value): ?>


				<div class="content__body question">

					<a class="question__id question__link question__bu" href="#"></a>


					<h2 class="question__title ">
						<a class="question__link__category" href="#"><?= $value  ?></a>
					</h2>

					<div class="question__answer__category">


						<?php foreach (get_questions_faq($index) as $questions):  ?>

							<?php  $args = [$questions]; get_template_part( 'template-parts/content-question-category', null, $args ) ?>

						<?php endforeach; ?>

					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php get_template_part( 'template-parts/content-call-contact', get_post_type() ); ?>
</main>

<?php get_footer(); ?>
