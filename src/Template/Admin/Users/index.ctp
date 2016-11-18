<?php $this->assign('title', 'Liste des membres'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
            <tr>
                <th><span><?= $this->Paginator->sort('login', ['label' => 'Pseudonyme']) ?></span></th>
                <th><span><?= $this->Paginator->sort('created', ['label' => 'Inscription']) ?></span></th>
                <th class="hidden-xs text-center"><span><?= $this->Paginator->sort('active', ['label' => 'Status']) ?></span></th>
                <th class="hidden-xs"><span><?= $this->Paginator->sort('email') ?></span></th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td width="30%">

                    <?php if ($user->avatar): ?>
                    <?= $this->Html->image("../uploads/avatars/$user->avatar" , ['class' => 'avatar'])?>
                    <?php endif ?>
                    <?php if (empty($user->avatar)): ?>
                    <img src="<?= $this->Url->image('no-avatar.png') ?>" >
                    <?php endif ?>

                    <a target="_blank" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'view',$user->id, $user->login, 'prefix' => false ]); ?>" class="user-link"><?= h($user->login) ?></a>
                    <span class="user-subhead"><?= $user->role->groupname ?></span>
                </td>
                <td width="15%"><?= $user->created->i18nformat('dd MMM YYYY') ?></td>
                <td width="15%" class="hidden-xs text-center">
                        <?php if ($user->active == 0) : ?>
                    <span class="label label-danger">
                          En Attente
                         </span>
                        <?php endif ?>
                        <?php if ($user->active == 1) : ?>
                      <span class="label label-success">
                       Actif
                          </span>
                        <?php endif ?>

                </td>
                <td width="25%" class="hidden-xs"><?= h($user->email) ?></td>
                <td width="15%">
                <?= $this->Form->postLink(__('<i class="fa fa-trash" aria-hidden="true"></i>
                    '), ['action' => 'delete', $user->id], ['escape' => false , 'class' => 'btn btn-sm btn-danger','confirm' => __('Souhaitez-vous vraiment supprimer l\'utilisateur : {0}?', $user->login)] ) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination left">
        <?php
                    echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
        'disabled','disabledTag' => 'a'));
        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
        'active','tag' => 'li','first' => 1));
        echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
        array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
    </div>

</div>
