<?php
/**
 * Template part for displaying link to contact in pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

?>

<div class="container pb-2">
	<div class="row center-xs start-md middle-md">
		<div class="col col--md-6 end-md">
			<p>
				<strong>Não encontrou o que precisava?</strong>
			</p>
		</div>

		<div class="col col--md-6">
			<a class="btn btn--primary tx-white" href="<?php echo get_page_link( get_page_by_title( 'Fale Conosco' )->ID ); ?>">Fale Conosco</a>
		</div>
	</div>
</div>
