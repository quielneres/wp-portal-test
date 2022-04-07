<div class="form-field">
  <div class="form-options row">
    <label class="form-label col col--xl-3" for="system">
      <input class="form-radio select-category-question" type="radio" id="system" value="system" data-category="todos"
             name="type"<?php if (get_query_var('type') == 'system' || get_query_var('type') == ''): ?> checked="true"<?php endif; ?>>Todas
    </label>

    <label class="form-label col col--xl-3" for="ustibb">
      <input class="form-radio select-category-question" type="radio" id="ustibb" value="ustibb" data-category="ustibb"
             name="type"<?php if (get_query_var('type') == 'ustibb'): ?> checked="true"<?php endif; ?>>USTIBB
    </label>

    <label class="form-label col col--xl-3" for="contract">
      <input class="form-radio select-category-question" type="radio" id="contract" value="contract" data-category="contrato"
             name="type"<?php if (get_query_var('type') == 'contract'): ?> checked="true"<?php endif; ?>>Contrato
    </label>

    <label class="form-label col col--xl-3" for="outros">
      <input class="form-radio select-category-question" type="radio" id="outros" value="outros" data-category="outros"
             name="type"<?php if (get_query_var('type') == 'outros'): ?> checked="true"<?php endif; ?>>Outras
    </label>
  </div>
</div>
