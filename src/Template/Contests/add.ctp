<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contests'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Restrictions'), ['controller' => 'Restrictions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Restriction'), ['controller' => 'Restrictions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contests form large-9 medium-8 columns content">
    <?= $this->Form->create($contest) ?>
    <fieldset>
        <legend><?= __('Add Contest') ?></legend>
        <?php
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('name');
            echo $this->Form->input('game_url');
            echo $this->Form->input('rule_url');
            echo $this->Form->input('on_facebook');
            echo $this->Form->input('frequency_id', ['options' => $frequencies]);
            echo $this->Form->input('deadline');
            echo $this->Form->input('img_url');
            echo $this->Form->input('prize');
            echo $this->Form->input('answer');
            echo $this->Form->input('restrictions._ids', ['options' => $restrictions]);
            echo $this->Form->input('zones._ids', ['options' => $zones]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
