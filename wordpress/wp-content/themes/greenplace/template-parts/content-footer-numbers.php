<?php

$contracts = new WP_Query(array(
    'post_type' => 'contract',
    'numberposts' => -1,
));

$employees = 0;

if ($contracts->have_posts()) {

    while ($contracts->have_posts()) {
        $contracts->the_post();

        $employees = $employees + get_post_meta(get_the_id(), 'qty_employees', true);
    }

    wp_reset_postdata();
}

$arr_numbers = [
    [
        'title' => 'Contratos ativos',
        'number' => wp_count_posts('contract')->publish
    ],
    [
        'title' => 'Empresas Parceiras',
        'number' => wp_count_posts('company')->publish
    ],
    [
        'title' => 'Colaboradores',
        'number' => $employees
    ],
];

?>


<div class="col col--md-9">
    <div class="content-numbers-footer">
        <?php foreach ($arr_numbers as $index => $value): ?>

            <div class="cards-mumber-footer">
                <div class="media__text tx-warning fs-lg"><?= $value['number']; ?></div>

                <div class="tip__title"><?= $value['title']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
