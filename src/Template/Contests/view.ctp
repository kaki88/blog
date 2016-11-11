
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">
                    <?= $contest->name ?>
                </div>
                <div class="panel-title pull-right linkcontest">
                     <span class="hidden-xs"> # <?= $contest->id ?>   | </span>
                    <span class="hidden-xs">Publié le <?= $contest->created->i18nformat('dd MMM YYYY') ?> |  </span>
                    <strong>Clôture le  <?= $contest->deadline->i18nformat('dd MMM YYYY') ?></strong>
                </div>
            </div>

            <div class="panel-body pnbodytop">

                <table class="table tbl-bt-marge">
                    <tr>
                        <?php
                    $row = 3;
                    if ($contest->restrictions) {$row++;};
                        if ($contest->answer) {$row++;};
                        ?>

                        <td width="20%" rowspan="<?= $row ?>" class="hidden-xs rowimg">
                            <?php if ($contest->img_url): ?>
                            <?= $this->Html->image("../uploads/img/$contest->img_url" , ['class' => 'contest-img'])?>
                            <?php endif ?>

                        </td>
                        <td width="20%"><span class="befprize">Lot(s) à gagner </span></td>
                        <td width="60%"><span class="prize"><?= $contest->prize ?></span></td>


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
                    <?php if ($contest->restrictions) : ?>
                    <tr>
                        <td><span class="befprize">Restriction(s) </span></td>
                        <td><span class="befdescr">
                            <?php foreach ($contest->restrictions as $restriction) : ?>
                            <?= $restriction->sort ?>
                            <?php endforeach ?>
                        </span></td>
                    </tr>
                    <?php endif ?>
                    <?php if ($contest->answer) : ?>
                    <tr>
                        <td><span class="befprize">Réponse(s) </span></td>
                        <td><span class="befdescr">
                      <?= $contest->answer ?>
                        </span></td>
                    </tr>
                    <?php endif ?>

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

