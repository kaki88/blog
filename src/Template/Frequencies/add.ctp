<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contests'), ['controller' => 'Contests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contest'), ['controller' => 'Contests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="frequencies form large-9 medium-8 columns content">
    <?= $this->Form->create($frequency) ?>
    <fieldset>
        <legend><?= __('Add Frequency') ?></legend>
        <?php
            echo $this->Form->input('period');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
