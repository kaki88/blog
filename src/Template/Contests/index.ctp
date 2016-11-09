<?php foreach ($contests as $contest) :?>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">
                    <?= $contest->name ?>
                </div>
                <div class="panel-title pull-right linkcontest">
                   # <?= $contest->id ?>   |
                    Publié le <?= $contest->created->i18nformat('dd MMM YYYY') ?> |
                    <strong>Clôture le  <?= $contest->deadline->i18nformat('dd MMM YYYY') ?></strong>
                </div>
            </div>

            <div class="panel-body pnbodytop">

                <table class="table table-striped tbl-bt-marge">
                <tr>
                    <td width="20%"><span class="befprize">Lot(s) à gagner </span></td>
                    <td width="60%"><span class="prize"><?= $contest->prize ?></span></td>
                    <td width="20%" rowspan="5" class="hidden-xs ">
                        <?php if ($contest->img_url): ?>
                        <?= $this->Html->image("../uploads/img/$contest->img_url" , ['class' => 'contest-img'])?>
                        <?php endif ?>

                    </td>
                </tr>
                    <tr>
                    <td><span class="befprize">Principe </span></td>
                    <td><span class="befdescr"><?= $contest->principle->description ?></span></td>
                </tr>
                    <tr>
                        <td><span class="befprize">Zone(s) éligible(s) </span></td>
                        <td><span class="befdescr">
                            <?php foreach ($contest->zones as $zone) : ?>
                            <?= $zone->place ?>
                            <?php endforeach ?>
                        </span></td>
                    </tr>
                    <tr>
                        <td><span class="befprize">Restriction(s) </span></td>
                        <td><span class="befdescr">
                            <?php foreach ($contest->restrictions as $restriction) : ?>
                            <?= $restriction->sort ?>
                            <?php endforeach ?>
                        </span></td>
                    </tr>
                    <tr>
                        <td><span class="befprize">Réponse(s) </span></td>
                        <td><span class="befdescr">
                      <?= $contest->answer ?>
                        </span></td>
                    </tr>

                    <tr>
                        <td colspan="3" >

                            <div class="pull-left">
                                <?php $ico = $contest->frequency->icon_url ?>
                                <?= $this->Html->image("../uploads/icons/$ico" , ['class' => 'admin-ico-freq'])?>
                                <?php if ($contest->on_facebook) : ?>
                                <?= $this->Html->image('facebook.jpg', ['class' => 'admin-ico-freq']) ?>
                                <?php endif ?>
                            </div>
                            <div class="pull-right">
                            <?php if ($contest->rule_url) : ?>
                            <a href="<?= $contest->rule_url ?>" target="_blank">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </button>
                            </a>
                            <?php endif ?>

                            <a href="<?= $contest->rule_url ?>" target="_blank">
                                <button type="button" class="btn btn-sm btn-success">
                                    <i class="fa fa-comments" aria-hidden="true"></i> (0)
                                </button>
                            </a>

                            <a href="<?= $contest->game_url ?>" target="_blank">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-external-link" aria-hidden="true"></i> Participer
                                </button>
                            </a>
                            </div>

                        </td>
                    </tr>
                </table>


            </div>
        </div>
    </div>
</div>

<?php endforeach ?>




    <ul class="pagination pagination-large">
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
