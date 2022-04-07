<?php
/**
 * Sample implementation of the Breadcrumb
 *
 * @package Greenplace
 */

function get_breadcrumb() {
	echo '<ul class="breadcrumb tx-muted mb-0">';
	echo '<li class="breadcrumb__item">';
	echo '<a class="breadcrumb__link" href="' . home_url() . '">Página Inicial</a>';
	echo '</li>';

	echo '<li class="breadcrumb__item">&nbsp;&nbsp;';

	if (is_category() || is_single()) {
		the_category(' &bull; ');

		if (is_single()) {
			the_title();
		}
	} elseif (is_page()) {
		echo the_title();
	} elseif (is_search()) {
		echo "Resultados da busca por...";
		echo '"<em>';
		echo the_search_query();
		echo '</em>"';
	}

	echo '</li>';
	echo '</ul>';
}
