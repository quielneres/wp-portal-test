<?php
$manager = get_field_object('manager_user_id')['value'];

$avatar_user_url = "https://humanograma.intranet.bb.com.br/avatar/" . get_post_field('key', $manager);

//if($_SERVER['SERVER_NAME'] == 'localhost'){
//    $avatar_user_url = get_template_directory_uri() . "/img/avatar-user.png";
//}

?>

<style>
    .about-us-manager {
        color: #052B4C;
        background: linear-gradient(rgba(255, 0, 0, 0) 40%, #FFEC8D 40%, #FFEC8D 60%);
        border-top: 0;
        -webkit-box-shadow: 0 4px 4px 0 rgb(0 0 0 / 16%);
        box-shadow: 0 4px 4px 0 rgb(0 0 0 / 16%);
    }

    .about-us-manager .bd {
        border: 0;
    }

    .about-us-manager .tip__body {
        margin-top: 3rem;
    }

    .about-us-manager .tip__body .list__link strong {
        font-weight: normal;
    }

    .about-us-manager .tip__body .list__item a, button {
        font-weight: normal;
    }

    .about-us-manager .media--xl {
        /*font-size: 1.5rem;*/
        height: 9.5rem;
        width: 9.5rem;
    }

    .about-us-manager .head--lg {
        font-size: 1.25rem;
        line-height: 1.5rem;
        margin-top: 1.5rem;
        margin-bottom: 0.2rem;
    }

    .about-us-manager .head__desc {
        font-size: 0.8rem;
        font-weight: normal;
        opacity: unset;
    }

    .about-us-manager .tip {
        margin-bottom: 0;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col col--lg-6 col--lg-offset-3 center-lg">
            <div class="tip tip--xl">
                <a class="tip__media media media--xl mr-3 bd"
                   href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field('key', $manager); ?>"
                   target="_blank">
                    <img class="media__img" src="<?= $avatar_user_url; ?>"
                         alt="<?php echo get_post_field('name', $manager); ?>">
                </a>

                <div class="tip__body">
                    <a class="head head--lg"
                       href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field('key', $manager); ?>"
                       target="_blank">
                        <span class="head__title"><?php echo get_post_field('name', $manager); ?></span>
                        <span class="head__desc"><?php echo get_post_field('role_name', $manager); ?></span>
                    </a>

                    <ul class="list list--inline tx-sm">
                        <li class="list__item">
                            <a class="list__link" href="tel:<?php echo get_post_field('phone', $manager); ?>"><i
                                        class="i i--phone tx-muted"></i><strong><?php echo get_post_field('phone', $manager); ?></strong></a>
                        </li>

                        <li class="list__item">
                            <a class="list__link"
                               href="https://humanograma.intranet.bb.com.br/<?php echo get_post_field('key', $manager); ?>"
                               target="_blank">
                                <small class="i i--external tx-muted"></small>
                                <strong><?php echo get_post_field('key', $manager); ?></strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>