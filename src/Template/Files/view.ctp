<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Threads'), ['controller' => 'Threads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Thread'), ['controller' => 'Threads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="files view large-9 medium-8 columns content">
    <h3><?= h($file->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($file->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($file->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($file->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Thread Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($file->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->message) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td><?= h($posts->user_id) ?></td>
                <td><?= h($posts->thread_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Threads') ?></h4>
        <?php if (!empty($file->threads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Forum Id') ?></th>
                <th scope="col"><?= __('Countview') ?></th>
                <th scope="col"><?= __('Lastpost') ?></th>
                <th scope="col"><?= __('Lastuser') ?></th>
                <th scope="col"><?= __('Countpost') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($file->threads as $threads): ?>
            <tr>
                <td><?= h($threads->id) ?></td>
                <td><?= h($threads->subject) ?></td>
                <td><?= h($threads->text) ?></td>
                <td><?= h($threads->created) ?></td>
                <td><?= h($threads->user_id) ?></td>
                <td><?= h($threads->forum_id) ?></td>
                <td><?= h($threads->countview) ?></td>
                <td><?= h($threads->lastpost) ?></td>
                <td><?= h($threads->lastuser) ?></td>
                <td><?= h($threads->countpost) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Threads', 'action' => 'view', $threads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Threads', 'action' => 'edit', $threads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Threads', 'action' => 'delete', $threads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $threads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($file->lasttopicuser)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Thread Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($file->lasttopicuser as $lasttopicuser): ?>
            <tr>
                <td><?= h($lasttopicuser->id) ?></td>
                <td><?= h($lasttopicuser->title) ?></td>
                <td><?= h($lasttopicuser->message) ?></td>
                <td><?= h($lasttopicuser->created) ?></td>
                <td><?= h($lasttopicuser->modified) ?></td>
                <td><?= h($lasttopicuser->user_id) ?></td>
                <td><?= h($lasttopicuser->thread_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $lasttopicuser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $lasttopicuser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $lasttopicuser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lasttopicuser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
