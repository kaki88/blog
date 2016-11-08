<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Principle'), ['action' => 'edit', $principle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Principle'), ['action' => 'delete', $principle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $principle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Principles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Principle'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="principles view large-9 medium-8 columns content">
    <h3><?= h($principle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($principle->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($principle->id) ?></td>
        </tr>
    </table>
</div>
