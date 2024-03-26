<?php
/**
 * Template part for displaying contract search
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Greenplace
 */

$systems = get_posts( array(
	'post_type'      => 'system',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );

$contracts = get_posts( array(
	'post_type'      => 'contract',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );

$companies = get_posts( array(
	'post_type'      => 'company',
	'posts_per_page' => -1,
	'orderby'        => 'title',
	'order'          => 'ASC'
) );
?>

<div class="widget">
	<div class="widget__body">
		<h2 class="widget__title widget__title--upper">Encontre informações dos contratos de desenvolvimento</h2>
		<form class="form contract" action="<?php echo get_page_link( get_page_by_title( 'Contratos' )->ID ); ?>">

            <input type="hidden" name="type"  value="company">

			<div id="select-system" class="form-field is-hidden" style="margin-top: 35px; margin-bottom: 35px;">
				<div class="form-select">
					<select name="company_id">
						<option value="" hidden="true">Selecione uma empresa</option>


                        <?php
                        if ( $companies ):

                            foreach($companies as $post):

                                setup_postdata( $post )
                                ?>
                                <option value="<?php the_id(); ?>"<?php if ( get_query_var( 'company_id' ) == $post->ID ): ?> selected="true"<?php endif; ?>><?php the_title(); ?></option>
                            <?php endforeach;

                        endif;

                        wp_reset_postdata();
                        ?>


                    </select>
				</div>
			</div>

		</form>

		<hr class="hr">

		<!-- <p>Se preferir, acesse nossa área de contratos.</p> -->

		<div class="fx"><a class="btn btn--primary btn--block" href="<?php echo get_page_link( get_page_by_title( 'Contratos' )->ID ); ?>">Ver Todos</a></div>
	</div>
</div>
