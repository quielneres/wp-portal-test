<?php
/**
 * Template Name: Contact Template
 * Template Post Type: post, page
 *
 * @package Greenplace
 */

get_header();
?>

<main class="layout__body">
	<?php get_template_part( 'template-parts/page-headline', get_post_type() ); ?>

	<div class="container pt-4 pb-2 fx-grow push-up">
		<div class="row">
			<div class="col col--md-6 push-down">

				<div class="mb-4">
					<h3 class="h5 mb-0">Teams</h3>
					<p><a href="<?php the_field( 'teams_url' ); ?>" target="_blank"><span><?php the_field( 'teams' ); ?></span></a></p>
				</div>

				<div class="mb-4">
					<h3 class="h5 mb-0">E-mail</h3>
					<p><a href="mailto:<?php the_field( 'email' ); ?>"><i class="i i--mail tx-muted"></i><span><?php the_field( 'email' ); ?></span></a></p>
				</div>

<!--				<div class="mb-4">-->
<!--					<h3 class="h5 mb-0">Telefone</h3>-->
<!--					<p><i class="i i--phone tx-muted"></i><span>Consulte todos os ramais na página <a href="--><?php //echo get_page_link( get_page_by_title( 'Quem Somos' )->ID ); ?><!--">Quem Somos</a></span></p>-->
<!--				</div>-->

				<div class="mb-4">
					<h3 class="h5 mb-0">Endereço</h3>
					<?php the_field( 'address' ); ?>
				</div>
			</div>

			<div class="col col--md-6">
				<div class="content">
					<div class="content__body">
						<?php echo do_shortcode( '[contact-form-7 id="644" title="Fale Conosco"]' ); ?>

						<!-- <form class="form" action="">
							<div class="form-field">
								<label class="form-label">Nome Completo</label>
								<input class="form-input" type="text" placeholder="Digite seu nome completo..." required="true">
							</div>

							<div class="form-field">
								<label class="form-label">E-mail Institucional</label>
								<input class="form-input" type="email" placeholder="Digite seu e-mail..." required="true">
							</div>

							<div class="form-field">
								<label class="form-label">Assunto</label>
								<div class="form-select">
									<select required="true">
										<option value="" selected="true" disabled="true" hidden="true">Selecione uma das opções...</option>
										<option value="">Processos</option>
										<option value="">Contratos</option>
										<option value="">Tutoriais</option>
										<option value="">Painéis</option>
										<option value="">Perguntas Frequentes</option>
									</select>
								</div>
							</div>

							<div class="form-field">
								<label class="form-label">Mensagem</label>
								<textarea class="form-textarea" placeholder="Escreva sua mensagem aqui..." required="true"></textarea>
							</div>

							<button class="btn btn--success">Enviar</button>
						</form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
