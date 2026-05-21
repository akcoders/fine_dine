<?php if (! empty($flashError)): ?>
    <div class="alert alert-danger"><?= esc($flashError) ?></div>
<?php endif; ?>
<?php if (! empty($flashSuccess)): ?>
    <div class="alert alert-success"><?= esc($flashSuccess) ?></div>
<?php endif; ?>
