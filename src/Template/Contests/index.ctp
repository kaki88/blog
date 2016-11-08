<?php foreach ($contests as $contest) :?>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <div class="panel-title pull-left">
                    <?= $contest->name ?>
                </div>
                <div class="panel-title pull-right linkcontest">
                Commentaires(0)
                </div>
            </div>

            <div class="panel-body">



                <table class="table">
                <tr>
                    <td width="20%" rowspan="3">
                        <?php if ($contest->img_url): ?>
                        <?= $this->Html->image("../uploads/img/$contest->img_url" , ['class' => 'contest-img'])?>
                        <?php endif ?>
                    </td>
                    <td width="15%"><span class="befprize">Lot(s) à gagner :</span></td>
                    <td width="65%"><span class="prize"><?= $contest->prize ?></span></td>
                </tr>
                    <tr>
                        <td><span class="befprize">Principe :</span></td>
                        <td><span class=""><?= $contest->principle->description ?></span></td>
                    </tr>


                    <tr>
                        <td >
                            <a href="<?= $contest->game_url ?>" target="_blank">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-external-link" aria-hidden="true"></i> Participer
                                </button>
                            </a>
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
