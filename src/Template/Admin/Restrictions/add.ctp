
<?php $this->assign('title', 'Restrictions'); ?>
<!--_________________________________________________________________ajouter une restrictions-->
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <?= __('Créer') ?></h3>
            </div>

            <div class="panel-body">
                <?= $this->Form->create($restriction) ?>
                <?php
                        echo $this->Form->input('sort',['label' => 'Nom de la restriction']);
                        ?>
                <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <!--_________________________________________________________________liste des restrictions-->
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Liste des restrictions</h3>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($restrictions as $rest) : ?>
                        <tr>
                            <td><?= $rest->id ?></td>
                            <td><?= $rest->sort ?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
