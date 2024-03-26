<?php
$professional_profiles = get_content_professional_profiles(); ?>
<div id="select-system" class="form-field" style="margin-bottom: 3rem;">
    <div class="form-select">
        <select  name="system_id" onchange="window.open(this.value, '_blank'); this.selectedIndex = 0;">
            <option value="" hidden="true">Selecione o perfil</option>
            <?php foreach ($professional_profiles as $profile) : ?>
                <option value="<?= $profile['link'] ?>" target="_blank">
                <?= $profile['title'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<hr class="hr">
<div class="fx" style="">
	<a class="btn btn--primary btn--block" target="_blank"
	   href="https://banco365.sharepoint.com.mcas.ms/sites/contratacaoporacionamento/SitePages/Perfis-Profissionais.aspx">Ver Todos</a>
</div>
