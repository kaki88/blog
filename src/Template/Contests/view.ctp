<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contest'), ['action' => 'edit', $contest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contest'), ['action' => 'delete', $contest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contest'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Restrictions'), ['controller' => 'Restrictions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Restriction'), ['controller' => 'Restrictions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contests view large-9 medium-8 columns content">
    <h3><?= h($contest->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $contest->has('category') ? $this->Html->link($contest->category->id, ['controller' => 'Categories', 'action' => 'view', $contest->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($contest->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Game Url') ?></th>
            <td><?= h($contest->game_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rule Url') ?></th>
            <td><?= h($contest->rule_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency') ?></th>
            <td><?= $contest->has('frequency') ? $this->Html->link($contest->frequency->id, ['controller' => 'Frequencies', 'action' => 'view', $contest->frequency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img Url') ?></th>
            <td><?= h($contest->img_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($contest->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contest->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('On Facebook') ?></th>
            <td><?= $contest->on_facebook ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Prize') ?></h4>
        <?= $this->Text->autoParagraph(h($contest->prize)); ?>
    </div>
    <div class="row">
        <h4><?= __('Answer') ?></h4>
        <?= $this->Text->autoParagraph(h($contest->answer)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Restrictions') ?></h4>
        <?php if (!empty($contest->restrictions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contest->restrictions as $restrictions): ?>
            <tr>
                <td><?= h($restrictions->id) ?></td>
                <td><?= h($restrictions->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Restrictions', 'action' => 'view', $restrictions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Restrictions', 'action' => 'edit', $restrictions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Restrictions', 'action' => 'delete', $restrictions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $restrictions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Zones') ?></h4>
        <?php if (!empty($contest->zones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Place') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contest->zones as $zones): ?>
            <tr>
                <td><?= h($zones->id) ?></td>
                <td><?= h($zones->place) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Zones', 'action' => 'view', $zones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Zones', 'action' => 'edit', $zones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Zones', 'action' => 'delete', $zones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
