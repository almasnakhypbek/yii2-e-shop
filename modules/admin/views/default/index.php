<div class="admin-default-index container">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id  ?>.
        The action belongs to controller "<?= get_class($this->context) ?>.
    </p>
    <p>
        You may customize this page by editing the following file : <br>
        <code><?= __FILE__  ?></code>
    </p>
</div>