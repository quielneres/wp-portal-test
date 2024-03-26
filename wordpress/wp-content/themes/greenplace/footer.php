<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Greenplace
 */
?>

<div class="footer-position-bottom">
    <footer class="layout__foot">
        <div class="bg-dark py-5">
            <div class="container">
                <div class="row middle-md">
                    <div class="col col--md-3">
                        <h2 class="spec mb-0">
                            <div class="spec__sup">Nossos</div>
                            <div class="spec__big">Números</div>
                        </h2>
                    </div>

                    <?php get_template_part('template-parts/content-footer-numbers', ''); ?>
                </div>
            </div>
        </div>
    </footer>

    <div class="footer-bg-dark">
        <div class="container">
            <div class="row middle-xl footer-grid-main">
                <?php get_template_part('template-parts/content-portal-maps-footer', ''); ?>
            </div>
        </div>
    </div>

    <div class="footer-secundary-border">
        <div class="container">
            <div class="row middle-xl">
                <div class="col col--xl-2 footer-nav-link-col">
                    <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <figure class="brand__logo">
                            <img class="brand__img--footer"
                                src="<?php echo get_template_directory_uri(); ?>/img/logo-bb.svg" alt="Banco do Brasil"
                                style="max-height: 1.25rem">
                        </figure>
                    </a>
                </div>

                <div class="col col--xl end-xl">
                    <p class="mt-3 fs-xs footer-text-copyright ">As informações disponíveis neste portal são de uso
                        exclusivamente interno, salvo
                        disposição expressa em contrário em conteúdos específicos, conforme IN 421-1-6-1.</p>
                </div>

                <a class="gotop" href="#top"><i class="i i--double-arrow"></i></a>
            </div>
        </div>
    </div>

</div>

<?php wp_footer(); ?>
</body>

	<!-- Matomo -->
	<script type="text/javascript">
	var _paq = window._paq || [];
	/* tracker methods like "setCustomDimension" should be called before "trackPageView" */

	<?php  $usuario = get_usuario_intranet();  if (!empty($usuario)):  ?>
	_paq.push(['setUserId', '<?= $usuario['chaveFuncionario'] ?>', 'visit']);
	_paq.push(['setCustomVariable', 1, 'Prefixo',  '<?= $usuario['prefixoDependencia'] ?>', 'visit']);
	_paq.push(['setCustomVariable', 2, 'Equipe',  '<?= $usuario['codigoComissao'] ?>', 'visit']);
	_paq.push(['setCustomVariable', 3, 'Nome',  '<?= $usuario['displayname'] ?>', 'visit']);
	<?php endif; ?>
	_paq.push(['setCustomVariable', 4, 'Assunto',  'Gestão de Fábrica de Software', 'visit']);

	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="https://eni.bb.com.br/eni1/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', '262']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	})();
</script>
<!-- End Matomo Code -->

</body>
</html>
