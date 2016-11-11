<?= $this->Html->css('animate.css') ?>
<div class="row">
    <div class="col-md-4 ">
        <div class="col-md-12 profil-head ">
            <div class="col-md-5">
                <?php if ($user->avatar): ?>
                <?= $this->Html->image("../uploads/avatars/$user->avatar" , ['class' => 'avatar-profil'])?>
                <?php endif ?>
                <?php if (empty($user->avatar)): ?>
                <img src="<?= $this->Url->image('no-avatar.png') ?>" class="avatar-profil">
                <?php endif ?>
            </div>

            <div class="col-md-7">
                <p class="pseudo"><?= h($user->login) ?></p>
                <p class="bold"><?= $user->role->groupname ?></p>
            </div>


            <div class="col-md-12 voffset2">
                <hr>
                <p class="bold"> Inscrit depuis le <?= $user->created->i18nformat('dd MMM YYYY') ?> </p>
                <?php if ($user->connected) : ?>
                <p class="bold"> Dernière connexion le <?= $user->connected->i18nformat('dd MMM YYYY à HH:mm') ?> </p>
                <?php else : ?>
                <p class="bold"> Aucune connexion  </p>
                <?php endif ?>
                <hr>

                       <?php if ($user->id == $uid || $ugp == 1) : ?>
                <button id="edit" class="btn btn-primary edit-profil"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editer le profil</button>
                <hr>
                <?php endif ?>

                <p class="bold"> Anniversaire: <?= $user->birthday->i18nformat('dd MMM YYYY') ?>  </p>
                <p class="bold"> Localisation: <?= $user->city->city ?>  </p>


            </div>

        </div>


    </div>


    <div class="col-md-8 ">
        <div class="row">
            <div class="col-md-12 profil-head ">
                <div class="list-inline">
                    <li>   <span class="menuprofil activite"><i class="fa fa-comments-o" aria-hidden="true"></i> Activités</span></li>
                    <li>   <span class="menuprofil actprofil"><i class="fa fa-pencil" aria-hidden="true"></i> Profil</span></li>
                </div>

            </div>
        </div>
        <div  id="new"></div>
        <div class="row"  id="lastpost">
            <div class="col-md-12 profil-head">
dsfgd<br>dsfgd<br>dsfgd<br>dsfgd<br>
                dsfgd<br>dsfgd<br>dsfgd<br>dsfgd<br>
                dsfgd<br>dsfgd<br>dsfgd<br>dsfgd<br>
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
                            <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id])
                            ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id])
                            ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete',
                            $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var id ='<?= $user->id ?>';
$('#edit').click(function () {
$('#lastpost').css({
    "-webkit-animation": "fadeOutRight 0.5s linear",
    "animation": "fadeOutRight 0.5s linear"
});

  $('#new').load('/users/edit/'+id).css({
      "-webkit-animation": "fadeInUp 1.2s linear",
      "animation": "fadeInUp 1.2s linear"
  });

    setTimeout(
            function()
            {
                $('#lastpost').hide();
            }, 500);

    $('.activite').css({
        "border-bottom": "none",
        "color":" black"
    });

    $('.actprofil').css({
        "border-bottom": "5px solid #3498db",
        "color":" #3498db"
    });

});
    });
</script>
