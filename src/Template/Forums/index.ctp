<div class="col-md-12 col-sm-12 col-xs-12 voffset3">

            <?php foreach ($cat as $forum): ?>
    <div class="table-responsive voffset2 tblrad">
    <table class="table tblrad">
        <thead class="category">
        <tr>
            <th colspan="2"><span class="h4"><?= $forum->name ?></span></th>
            <th class="hidden-xs"></th>
            <th class="hidden-xs"></th>
            <th class="hidden-xs"></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($forum->forums as $section): ?>
        <?php $forum = $section->name ?>
        <?php $id = $section->id ?>
            <tr  class="sscategory" >
                <td width="6%">
                    <?php if ($section->icon): ?>
                   <?= $this->Html->image("../uploads/icons/$section->icon" , ['class' => 'forum-icon'])?>
                    <?php endif ?>
                    <?php if (!$section->icon): ?>
                    <?= $this->Html->image("../uploads/icons/defaut.png" , ['class' => 'forum-icon'])?>
                    <?php endif ?>
                </td>

                <td width="60%"> <?= $this->Html->link(__($section->name), ['action' => 'view', 'slug' => strtolower(str_replace(' ', '-', $section->name)), 'id' => $section->id]) ?>
                    <br>
                    <?= $section->description ?></td>
                <td class="hidden-xs" width="7%"><span class="hidden-s stat"><i class="fa fa-comment-o fa"><?= $section->countthread ?></i></span></td>
                <td class="hidden-xs" width="7%"><span class="stat"><i class="fa fa-comments-o fa"><?= $section->countpost ?></i></span></td>
                <td class="hidden-xs" width="20%" style="text-align: right">

                    <?php if ($section->forums_threads) : ?>
                    <?php foreach ($section->forums_threads as $threads): ?>
                    <?= $this->Html->link(__($threads->subject), ['controller' => 'ForumsThreads','action' => 'view'
                    , 'fid' => $id, 'forum' => strtolower(str_replace(' ', '-', $forum)), 'slug' => strtolower(str_replace(' ', '-', $threads->subject)), 'id' => $threads->id]) ?>
                    <br>
                    <?php echo "le ".$threads->created->i18nformat('dd/MM/YY à HH:mm', 'Europe/Paris') ; ?> <br>
                    <?php endforeach ?>
                    par
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view',$section->user->id,
                            $section->user->login,'prefix' => false]); ?>"
                       target="_blank">   <?= $section->user->login ?></a>
                </td>
                <?php else: ?>
                Aucun Sujet
                <?php endif ?>

            </tr>
<?php
$id = $section->id ;
        ?>

        <?php endforeach; ?>

        </tbody>
    </table>
    </div>
    <?php endforeach; ?>
<!--__________________________________________________________________________________________________stats du forum-->

    <div class="table-responsive voffset2 tblrad">
        <table class="table tblrad">
        <thead class="statforum">
        <tr>
            <th colspan="2" scope="col"><span class="h4">Statistiques du forum</span></th>
        </tr>
        </thead>
        <tbody>

        <tr class="sscategory">
            <td width="6%">

                <?= $this->Html->image("../uploads/icons/stat.png" , ['class' => 'forum-icon'])?>

            </td>
            <td width="94%">
                Nos membres ont créé un total de <?= $countpost ?> messages dans <?= $countthread ?> sujets.<br>
                Nous avons actuellement <?= $countuser ?> membres enregistrés.<br>
                Bienvenue à notre nouveau membre, <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'view' ,$lastuser->id, $lastuser->login,'prefix'=> false]); ?>"> <?= $lastuser->login ?> </a>
            </td>


        </tbody>
    </table>
    </div>


</div>



