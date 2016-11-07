<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Restriction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contests'), ['controller' => 'Contests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contest'), ['controller' => 'Contests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="restrictions index large-9 medium-8 columns content">
    <h3><?= __('Restrictions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($restrictions as $restriction): ?>
            <tr>
                <td><?= $this->Number->format($restriction->id) ?></td>
                <td><?= h($restriction->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $restriction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $restriction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $restriction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $restriction->id)]) ?>
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
