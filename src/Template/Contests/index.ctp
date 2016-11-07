<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contest'), ['action' => 'add']) ?></li>
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
<div class="contests index large-9 medium-8 columns content">
    <h3><?= __('Contests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('game_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rule_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('on_facebook') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frequency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('img_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contests as $contest): ?>
            <tr>
                <td><?= $this->Number->format($contest->id) ?></td>
                <td><?= $contest->has('category') ? $this->Html->link($contest->category->id, ['controller' => 'Categories', 'action' => 'view', $contest->category->id]) : '' ?></td>
                <td><?= h($contest->name) ?></td>
                <td><?= h($contest->game_url) ?></td>
                <td><?= h($contest->rule_url) ?></td>
                <td><?= h($contest->on_facebook) ?></td>
                <td><?= $contest->has('frequency') ? $this->Html->link($contest->frequency->id, ['controller' => 'Frequencies', 'action' => 'view', $contest->frequency->id]) : '' ?></td>
                <td><?= h($contest->deadline) ?></td>
                <td><?= h($contest->img_url) ?></td>
                <td><?= h($contest->created) ?></td>
                <td><?= h($contest->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contest->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
