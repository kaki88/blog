<div class="row">
<div class="col-md-4 profil-head ">

    <div class="col-md-3">
        <?php if ($user->avatar): ?>
        <?= $this->Html->image("../uploads/avatars/$user->avatar" , ['class' => 'avatar-profil'])?>
        <?php endif ?>
        <?php if (empty($user->avatar)): ?>
        <img src="<?= $this->Url->image('no-avatar.png') ?>"  class="avatar-profil">
        <?php endif ?>
    </div>

    <div class="col-md-9">
       <p class="pseudo"><?= h($user->login) ?></p>
        <?= $user->role->groupname ?>
    </div>


    <div class="col-md-12 voffset2">
        <hr>
      <p> <?= $user->created->i18nformat('dd MMM YYYY') ?> </p>
        <p><?= h($user->email) ?></p>
        <hr>
    </div>



</div>















<div class="col-md-8 profil-head">
    <div class="col-md-12">
        <h4><?= __('Activités') ?></h4>
        <?php if (!empty($user->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->message) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td><?= h($posts->user_id) ?></td>
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
</div>
</div>