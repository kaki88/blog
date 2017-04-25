<?= $this->element('Forum/search-forum') ?>

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



    <?php $check = 'quotetopic' ; ?>

    <div class="right" id="right">
        <?php if($subscription) : ?>
        <button id="issub" class="btn btn-danger dash-hide" role="button" aria-pressed="true"> <i class="fa fa-times"></i> SE DESABONNER DU SUJET</button>
        <?php else: ?>
        <button id="sub" class="btn btn-warning dash-hide" role="button" aria-pressed="true"> <i class="fa fa-thumb-tack"></i> S'ABONNER A CE SUJET</button>
        <?php endif ?>

        <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'add' ,
    'fid' => $fid,
    'forum' => strtolower(str_replace(' ', '-', $forum)),
    'slug' => strtolower(str_replace(' ', '-', $slug)),
     'id' => $id]) ?>"
           class="btn btn-success dash-post"  role="button" aria-pressed="true"> <i class="fa fa-comments-o"></i> REPONDRE</a>
    </div>
    </div>

    <div class="row"></div>
    <div class="table-responsive voffset2 tblrad">
        <table class="table tblrad">
            <thead class="category">
            <tr class="dash-hide">
                <th class="sujet" colspan="2">
                    <?= h($thread->subject) ?>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td class="ssthead" width="170px">Auteur</td>
                <td class="ssthead">Message</td>
            </tr>
            <tr class="sscategory">
                <td class="bgava" <?php if($thread->files) { echo 'rowspan="2"';} ?> >
                <div class="username">
                    <?= $thread->has('user') ? $this->Html->link($thread->user->username, 'utilisateur/profil/'.$thread->user->id.'') : '' ?>
                </div>
                <div class="avatardiv">
                    <?= $this->Html->image('../uploads/user/'.$thread->user->picture_url ,['class'=>'avatar']); ?>
                </div>
                <div class="pb">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> <?= $thread->user->role->name ?>
                </div>
                <div class="pb">
                    Inscription: <?= $thread->user->created->i18nformat('MMM YYYY', 'Europe/Paris') ?>
                </div>
            </td>
            <td>
                <div class="pull-right"> Message: #1</div>
                <div><?= $thread->text; ?></div>
            </td>
            </tr>
            <!--_________________________________________________________________________________pièces jointes-->
            <?php if($thread->files) : ?>
            <tr class="sscategory">
                <td> <u>Fichier Joint :</u> <br>
                    <!--pour chaque fichier-->
                    <?php foreach($thread->files as $files) : ?>
                    <!--recuperer l'extension-->
                    <?php $extension = explode(".",$files->name); ?>
                    <!--si fichier texte-->
                    <?php if ($extension[1] == 'txt') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/txt.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier zip-->
                    <?php elseif  ($extension[1] == 'zip') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/zip.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier rar-->
                    <?php elseif  ($extension[1] == 'rar') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/rar.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier log-->
                    <?php elseif  ($extension[1] == 'log') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/log.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier pdf-->
                    <?php elseif  ($extension[1] == 'pdf') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/pdf.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier css-->
                    <?php elseif  ($extension[1] == 'css') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/css.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier php-->
                    <?php elseif  ($extension[1] == 'php') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/php.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier html-->
                    <?php elseif  ($extension[1] == 'html') : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/html.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier img-->
                    <?php elseif  ($extension[1] == 'png' || $extension[1] == 'jpg' || $extension[1] == 'jpeg' || $extension[1] == 'gif' ) : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads//files/".$files->name, ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>

                    <!--si fichier inconnu-->
                    <?php else : ?>
                    <?= $this->Html->link(
                    $this->Html->image("../uploads/icons/ext/default.png", ["alt" => "Fichier texte",'class'=>'joint']),
                    "../uploads/files/".$files->name,
                    ['escape' => false, 'target' => '_blank']
                    );  ?>
                    <?php endif ?>
                    <?php endforeach ?>
                </td>
            </tr>
            <?php endif ?>

            <tr class="grey">

                <td class="text-center create "><span class="create">Créer le <?= $thread->created->i18nformat('dd/MM/YY à HH:mm', 'Europe/Paris') ?></span></td>
                <td>
                    <div class="left">
                        <a href="#" class="btn btn-sm green-meadow" role="button" aria-pressed="true"><i class="fa fa-envelope"></i> MP</a>
                    </div>
                    <div class="right dash-hide">
                        <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'addquote' ,
    'fid' => $fid,
    'forum' => strtolower(str_replace(' ', '-', $forum)),
    'slug' => strtolower(str_replace(' ', '-', $slug)),
     'id' => $id,
          'quote' => $check
     ]); ?>"
                           class="btn btn-sm blue" role="button" aria-pressed="true"><i class="fa fa-quote-right"></i> CITER</a>


                        <?php if ($role !== 2 || empty($role)) : ?>
                        <a href="<?= $this->Url->build([ 'controller' => 'Threads', 'action' => 'edit' ,
     'fid' => $fid,
    'forum' => strtolower(str_replace(' ', '-', $forum)),
    'slug' => strtolower(str_replace(' ', '-', $slug)),
     'id' => $id,
     ]); ?>"
                           class="btn btn-sm purple" role="button" aria-pressed="true"><i class="fa fa-pencil"></i> EDITER</a>

                        <?= $this->Form->postLink(__('<i class="fa fa-times"></i>'),[ 'controller' => 'Threads'
                        , 'action' => 'delete' , $thread->id],['escape'=>false , 'class'=>'btn btn-sm btn-danger dash-delete dash-hide']); ?>
                        <?php endif ?>
                    </div>


                </td>
            </tr>
        </tbody>
    </table>
</div>



        <?php if (!empty($posts)): ?>
        <?php $messagecount = 1 ;?>

        <?php foreach($posts as $post): ?>
        <?php $messagecount++ ;?>
<div class="table-responsive voffset2 tblrad">
        <table class="table mrgtbl">
            <tr class="sscategory">
                <td class="bgava" width="120px" <?php if($post->files) { echo 'rowspan="2"';} ?> >
                <div class="username">
                    <?= $this->Html->link($post->user->username, 'utilisateur/profil/'.$post->user->id.''); ?>
                </div>
                <div class="avatardiv">
                    <?= $this->Html->image('../uploads/user/'.$post->user->picture_url ,['class'=>'avatar']); ?>
                </div>
                <div class="pb">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> <?= $post->user->role->name ?>
                </div>
                <div class="pb">
                    Inscription: <?= $post->user->created->i18nformat('MMM YYYY', 'Europe/Paris') ?>
                </div>
            </td>
            <td>
                <div class="pull-right"> Message: #<?= $messagecount ?></div>
                <div><?= $post->message; ?></div>
            </td>
        </tr>

        <!--_________________________________________________________________________________pièces jointes-->
        <?php if($post->files) : ?>
        <tr class="sscategory">
            <td> <u>Fichier Joint :</u> <br>
                <!--pour chaque fichier-->
                <?php foreach($post->files as $files) : ?>
                <!--recuperer l'extension-->
                <?php $extension = explode(".",$files->name); ?>
                <!--si fichier texte-->
                <?php if ($extension[1] == 'txt') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/txt.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier zip-->
                <?php elseif  ($extension[1] == 'zip') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/zip.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier rar-->
                <?php elseif  ($extension[1] == 'rar') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/rar.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier log-->
                <?php elseif  ($extension[1] == 'log') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/log.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier pdf-->
                <?php elseif  ($extension[1] == 'pdf') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/pdf.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier css-->
                <?php elseif  ($extension[1] == 'css') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/css.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier php-->
                <?php elseif  ($extension[1] == 'php') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/php.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier html-->
                <?php elseif  ($extension[1] == 'html') : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/html.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier img-->
                <?php elseif  ($extension[1] == 'png' || $extension[1] == 'jpg' || $extension[1] == 'jpeg' || $extension[1] == 'gif' ) : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads//files/".$files->name, ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>

                <!--si fichier inconnu-->
                <?php else : ?>
                <?= $this->Html->link(
                $this->Html->image("../uploads/icons/ext/default.png", ["alt" => "Fichier texte",'class'=>'joint']),
                "../uploads/files/".$files->name,
                ['escape' => false, 'target' => '_blank']
                );  ?>
                <?php endif ?>
                <?php endforeach ?>
            </td>
        </tr>
        <?php endif ?>


        <tr class="grey">

            <td class="text-center create "><span class="create">Créer le <?= $post->created->i18nformat('dd/MM/YY à HH:mm', 'Europe/Paris') ?></td>
            <td>
                <div class="left">
                    <a href="#" class="btn btn-sm green-meadow" role="button" aria-pressed="true"><i class="fa fa-envelope"></i> MP</a>

                </div>
                <div class="right dash-hide">
                    <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'addquote' ,
   'fid' => $fid,
    'forum' => strtolower(str_replace(' ', '-', $forum)),
    'slug' => strtolower(str_replace(' ', '-', $slug)),
     'id' => $id,
          'quote' => $post->id
     ]); ?>"
                       class="btn btn-sm blue" role="button" aria-pressed="true"><i class="fa fa-quote-right"></i> CITER</a>


                    <?php if ($role !== 2 || empty($role)) : ?>
                    <a href="<?= $this->Url->build([ 'controller' => 'Posts', 'action' => 'edit' ,
    'fid' => $fid,
    'forum' => strtolower(str_replace(' ', '-', $forum)),
    'slug' => strtolower(str_replace(' ', '-', $slug)),
     'id' => $post->id
     ]); ?>"
                       class="btn btn-sm purple" role="button" aria-pressed="true"><i class="fa fa-pencil"></i> EDITER</a>
                    <?= $this->Form->postLink(__('<i class="fa fa-times"></i>'),[ 'controller' => 'Posts'
                    , 'action' => 'delete' , $post->id],['escape'=>false , 'class'=>'btn btn-sm btn-danger']); ?>
                    <?php endif ?>
                </div>
            </td>
        </tr>

    </table>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>


    <div class="col-md-12 voffset2" >
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
        <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'add' ,
   'fid' => $fid,
    'forum' => strtolower(str_replace(' ', '-', $forum)),
    'slug' => strtolower(str_replace(' ', '-', $slug)),
     'id' => $id
     ]) ?>"
           class="btn btn-success dash-post"  role="button" aria-pressed="true"> <i class="fa fa-comments-o"></i> REPONDRE</a>
    </div></div>

</div>
        </div>
        </div>
<script>
var id = '<?= $thread->id ?>';
// s'abonner a un sujet
$(document).on('click', '#sub', function () {
    $.ajax({
        type:'post',
        data: 'thread_id=' + id,
        url: '<?= $this->Url->build("forums/subscriptions/add"); ?>',
        success:function(){
            $('#sub').addClass('hidden');
            $('#right').prepend('<button id="issub" class="btn btn-danger" role="button" aria-pressed="true"> <i class="fa fa-times"></i> SE DESABONNER DU SUJET</button>')
        }
    });
});

//se desabonner d'un sujet
$(document).on('click', '#issub', function () {
    $.ajax({
        type:'post',
        data: 'thread_id=' + id,
        url: '<?= $this->Url->build("forums/subscriptions/delete"); ?>',
        success:function(){
            $('#issub').addClass('hidden');
            $('#right').prepend('<button id="sub" class="btn btn-warning " role="button" aria-pressed="true"> <i class="fa fa-thumb-tack"></i> S\'ABONNER A CE SUJET</button>')
        }
    });
});
</script>