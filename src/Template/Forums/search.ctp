<?= $this->element('Forum/search-forum') ?>
<div class="col-md-12">
<div class="table-responsive voffset2">
    <table class="table">
        <tr>
            <th scope="col" class="category" colspan="5">Résultats de la recherche</th>
        </tr>
        <tr class="ssthead">
            <th scope="col" >Sujets / Auteurs</th>
            <th scope="col" >Réponses</th>
            <th scope="col" >Vues</th>
            <th scope="col" >Derniers messages</th>
        </tr>
        <?php foreach ($results as $result): ?>
        <tr class="sscategory">
            <td width="50%"><?= $this->Html->link(__($result->subject), ['controller' => 'Threads','action' => 'view', 'fid' => $result->forum_id, 'forum' => strtolower(str_replace(' ', '-', $result->forum->name)), 'slug' => strtolower(str_replace(' ', '-', $result->subject)), 'id' => $result->id]) ?>

                <br> par
                <?= $this->Html->link($result->user->username, 'utilisateur/profil/'.$result->user->id.'') ?>
               </td>
            <td width="10%"> <?= count($result->posts) ?> </td>
            <td width="10%" > <?= $result->countview ?></td>
            <td width="25%">

                <?php if ($result->lastpost) : ?>
                le <?= $result->lastpost->i18nformat('dd/MM/YY à HH:mm', 'Europe/Paris') ?>
                <br> par
                    <?= $this->Html->link($result->lastuserthread->username, 'utilisateur/profil/'.$result->lastuserthread->id.'') ?>

                </br>

                <?php else: ?>
                Aucun Message
                <?php endif ?>
            </td>



        </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>