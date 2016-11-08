<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $principle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $principle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Principles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="principles form large-9 medium-8 columns content">
    <?= $this->Form->create($principle) ?>
    <fieldset>
        <legend><?= __('Edit Principle') ?></legend>
        <?php
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
