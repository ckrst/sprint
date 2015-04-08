<? $flash = $this->Session->flash(); ?>
<div id="flash-success" style="<?= $flash ? '' : 'display:none' ?>" class="alert alert-success">
    <button type="button" class="close" onclick="$('#flash-success').hide()">&times;</button>
    <div id="flash-success-content">
        <?= $flash; ?>
    </div>
</div>
<? $flash = $this->Session->flash('error'); ?>
<div id="flash-error" style="<?= $flash ? '' : 'display:none' ?>" class="alert alert-error">
    <button type="button" class="close" onclick="$('#flash-error').hide()">&times;</button>
    <div id="flash-error-content">
        <?= $flash; ?>
    </div>
</div>
<? $flash = $this->Session->flash('warning'); ?>
<div id="flash-warning" style="<?= $flash ? '' : 'display:none' ?>" class="alert alert-warning">
    <button type="button" class="close" onclick="$('#flash-warning').hide()">&times;</button>
    <div id="flash-warning-content">
        <?= $flash; ?>
    </div>
</div>
<? $flash = $this->Session->flash('auth'); ?>
<div id="flash-error" style="<?= $flash ? '' : 'display:none' ?>" class="alert alert-error">
    <button type="button" class="close" onclick="$('#flash-error').hide()">&times;</button>
    <div id="flash-error-content">
        <?= $flash; ?>
    </div>
</div>