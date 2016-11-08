<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $zone->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Zones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contests'), ['controller' => 'Contests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contest'), ['controller' => 'Contests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zones form large-9 medium-8 columns content">
    <?= $this->Form->create($zone) ?>
    <fieldset>
        <legend><?= __('Edit Zone') ?></legend>
        <?php
            echo $this->Form->input('place');
            echo $this->Form->input('contests._ids', ['options' => $contests]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
