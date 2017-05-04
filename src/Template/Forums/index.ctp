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

                <?php $counts = 0 ?>
                    <?php if ($section->forums_threads) : ?>
                    <?php foreach ($section->forums_threads as $threads): ?>
<?php $counts = $counts + count($threads->forums_posts); ?>
                <?php endforeach ?>
                <td class="hidden-xs" width="7%"><span class="hidden-s stat"><i class="fa fa-comment-o fa"><?= count($section->forums_threads ) ?></i></span></td>

                <td class="hidden-xs" width="7%"><span class="stat"><i class="fa fa-comments-o fa"><?= $counts ?></i></span></td>

    <?php
            $topic = strtotime($section->endtopic->created) ;
        $post = strtotime($section->endpost->created) ;
        ?>
                <?php if ($topic > $post) : ?>
                <td class="hidden-xs" width="20%" style="text-align: right">
                    <?= $this->Html->link(__($section->endtopic->subject), ['controller' => 'ForumsThreads','action' => 'view'
                    , 'fid' => $id, 'forum' => strtolower(str_replace(' ', '-', $forum)), 'slug' => strtolower(str_replace(' ', '-', $section->endtopic->subject)), 'id' => $section->endtopic->id]) ?>
                    <br>
                    <?php echo "le ".$section->endtopic->created ; ?> <br>

                    par
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view',$section->endtopic->user->id,
                            $section->endtopic->user->login,'prefix' => false]); ?>"
                       target="_blank">   <?= $section->endtopic->user->login ?></a>
                </td>
                <?php else: ?>
                <td class="hidden-xs" width="20%" style="text-align: right">
                    <?= $this->Html->link(__($section->endpost->title), ['controller' => 'ForumsThreads','action' => 'view'
                    , 'fid' => $id, 'forum' => strtolower(str_replace(' ', '-', $forum)), 'slug' => strtolower(str_replace(' ', '-', $section->endpost->title)), 'id' => $section->endpost->id]) ?>
                    <br>
                    <?php echo "le ".$section->endpost->created ; ?> <br>

                    par
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view',$section->endpost->usersd->id,
                            $section->endpost->usersd->login,'prefix' => false]); ?>"
                       target="_blank">   <?= $section->endpost->usersd->login ?></a>
                </td>
                <?php endif ?>


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


</div>



