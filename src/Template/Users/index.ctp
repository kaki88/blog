<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">-->
    <!--<ul class="side-nav">-->
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <!--<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>-->
        <!--<li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>-->
        <!--<li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>-->
    <!--</ul>-->
<!--</nav>-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
            <tr>
                <th><span><?= $this->Paginator->sort('login') ?></span></th>
                <th><span><?= $this->Paginator->sort('created') ?></span></th>
                <th class="text-center"><span><?= $this->Paginator->sort('active') ?></span></th>
                <th><span><?= $this->Paginator->sort('email') ?></span></th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <img src="http://bootdey.com/img/Content/user_1.jpg" alt="">
                    <a href="#" class="user-link"><?= h($user->login) ?></a>
                    <span class="user-subhead"><?= $user->role->groupname ?></span>
                </td>
                <td><?= h($user->created) ?></td>
                <td class="text-center">
                    <span class="label label-default"><?= h($user->active) ?></span>
                </td>
                <td><?= h($user->email) ?></td>
                <td style="width: 20%;">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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

    <ul class="pagination pagination-large pull-right">
        <?php
            echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
        'disabled','disabledTag' => 'a'));
        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
        'active','tag' => 'li','first' => 1));
        echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
        array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
    </ul>

</div>
