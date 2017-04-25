

<div class="col-md-12 voffset2">


    <div class="col-md-12">
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

<div class="right">
    <a href="<?= $this->Url->build([ 'controller' => 'Threads', 'action' => 'add' , 'slug' => strtolower(str_replace(' ', '-', $forumname->name)), 'id' => $id]) ?>"
       class="btn btn-success " role="button" aria-pressed="true"> <i class="fa fa-plus"></i> CREER UN SUJET</a>
</div>
    </div>

<div class="row"></div>
    <div class="table-responsive voffset2 tblrad">
    <?php if (!empty($forum)): ?>

    <table class="table tblrad">
        <tr>
            <th scope="col" class="sujet category" colspan="5"><?= h($forumname->name) ?></th>
        </tr>
        <tr class="ssthead">
            <td class="ssthead">Sujets / Auteurs</td>
            <td class="ssthead hidden-xs">Réponses</td>
            <td class="ssthead hidden-xs">Vues</td>
            <td class="ssthead">Derniers messages</td>
            <?php if ($role !== 2 || empty($role)) : ?>
            <td></td>
            <?php endif ?>
        </tr>
        <?php foreach ($forum as $threads): ?>
        <tr class="sscategory">
            <td width="50%"><?= $this->Html->link(__($threads->subject), ['controller' => 'forumsThreads','action' => 'view', 'fid' => $id, 'forum' => strtolower(str_replace(' ', '-', $forumname->name)), 'slug' => strtolower(str_replace(' ', '-', $threads->subject)), 'id' => $threads->id]) ?>
            <br> par
                <?= $this->Html->link($threads->user->login, 'utilisateur/profil/'.$threads->user->id.'') ?>
            </td>
            <td width="10%" class="hidden-xs"><?= $threads->countpost ?></td>
            <td width="10%" class="hidden-xs"><?= $threads->countview ?></td>
            <td width="25%">

            <?php if ($threads->lastpost) : ?>
            le <?= $threads->lastpost->i18nformat('dd/MM/YY à HH:mm', 'Europe/Paris') ?>
                <br> par

                </br>

            <?php else: ?>
            Aucun Message
            <?php endif ?>
            </td>

            <?php if ($role !== 2 || empty($role)) : ?>
            <td width="5%" class="actions">
                <?= $this->Form->postLink(__('<i class="fa fa-times"></i>'),[ 'controller' => 'Threads'
                , 'action' => 'delete' , $threads->id],['escape'=>false , 'class'=>'btn btn-sm btn-danger']); ?>
            </td>
            <?php endif ?>



        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <?php endif; ?>
    <div class="col-md-12 voffset2">
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

        <div class="right">
            <a href="<?= $this->Url->build([ 'controller' => 'Threads', 'action' => 'add' , 'slug' => strtolower(str_replace(' ', '-', $forumname->name)), 'id' => $id]) ?>"
               class="btn btn-success " role="button" aria-pressed="true"> <i class="fa fa-plus"></i> CREER UN SUJET</a>
        </div>
    </div>
</div>


