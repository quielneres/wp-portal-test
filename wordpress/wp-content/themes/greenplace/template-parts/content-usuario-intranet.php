<?php  $usuario = get_usuario_intranet();  if (!empty($usuario)):  ?>
    <div class="lh-lg">
        <span>Olá <strong><?= $usuario['displayname'] ?></strong>, seja bem vindo.</span>
        <i class="i i--user tx-muted fs-md"></i>
<!--        <a href="#" id="logout-intranet">Sair</a>-->
    </div>
<?php endif; ?>
