<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zone'), ['action' => 'edit', $zone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zone'), ['action' => 'delete', $zone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contests'), ['controller' => 'Contests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contest'), ['controller' => 'Contests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zones view large-9 medium-8 columns content">
    <h3><?= h($zone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($zone->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($zone->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contests') ?></h4>
        <?php if (!empty($zone->contests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Game Url') ?></th>
                <th scope="col"><?= __('Rule Url') ?></th>
                <th scope="col"><?= __('On Facebook') ?></th>
                <th scope="col"><?= __('Frequency Id') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col"><?= __('Img Url') ?></th>
                <th scope="col"><?= __('Prize') ?></th>
                <th scope="col"><?= __('Answer') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($zone->contests as $contests): ?>
            <tr>
                <td><?= h($contests->id) ?></td>
                <td><?= h($contests->category_id) ?></td>
                <td><?= h($contests->name) ?></td>
                <td><?= h($contests->game_url) ?></td>
                <td><?= h($contests->rule_url) ?></td>
                <td><?= h($contests->on_facebook) ?></td>
                <td><?= h($contests->frequency_id) ?></td>
                <td><?= h($contests->deadline) ?></td>
                <td><?= h($contests->img_url) ?></td>
                <td><?= h($contests->prize) ?></td>
                <td><?= h($contests->answer) ?></td>
                <td><?= h($contests->created) ?></td>
                <td><?= h($contests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contests', 'action' => 'view', $contests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contests', 'action' => 'edit', $contests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contests', 'action' => 'delete', $contests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
