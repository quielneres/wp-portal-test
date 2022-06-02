
<?php
    $tabs = [
        'acionamento' =>  'Acionamento',
        'fsw'         =>  'Fábrica'
    ]
?>

<style>

</style>

<div class="tabs_process">

    <?php  foreach ($tabs as $key => $value) : ?>
        <input type="radio" name="tabs" id="<?= $key;?>"
               <?php if ($key == 'acionamento'):?> checked="cecked"  <?php endif;?>>


        <label for="<?= $key;?>" class="tabs__label"><?= $value;?></label>

        <div class="tab">
            <?php
            if ( get_process($key) ):

                foreach(get_process($key) as $post):

                    setup_postdata( $post )
                    ?>


                    <div class="widget">

                        <div id="content__process">
                            <div class="content-circle">
                                <div class="widget-circle-number" >
                                    <span><?php the_field( 'order' ); ?></span>
                                </div>
                            </div>
                                <div class="widget__body">
                                    <h2 class="head head--lg">
                                        <span class="head__title"><?php the_title(); ?></span>
                                        <label class="fs-md">Executor: <span class="head__desc"><?php the_field( 'mediator' ); ?></span></label>
                                    </h2>

                                    <?php the_content(); ?>
                                </div>
                        </div>
                    </div>

                <?php endforeach;

            endif;

            wp_reset_postdata();
            ?>
        </div>

    <?php endforeach;?>
</div>