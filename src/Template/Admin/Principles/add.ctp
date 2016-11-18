<?php $this->assign('title', 'Principes'); ?>
<!--_________________________________________________________________ajouter un principe-->
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <?= __('Créer') ?></h3>
            </div>

            <div class="panel-body">
                <?= $this->Form->create($principle) ?>
                <?php
                        echo $this->Form->input('description',['label' => 'Principe de jeu']);
                ?>
                <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <!--_________________________________________________________________liste des principes-->
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Liste des principes de jeu</h3>
            </div>

            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($principles as $princ) : ?>
                        <tr>
                            <td><?= $princ->id ?></td>
                            <td><?= $princ->description ?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
