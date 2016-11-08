<!--_________________________________________________________________ajouter une catégorie-->
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <?= __('Créer') ?></h3>
            </div>

            <div class="panel-body">
    <?= $this->Form->create($category) ?>
        <?php
            echo $this->Form->input('type',['label' => 'Nom de la catégorie']);
        ?>
    <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
    </div>
        </div>
    </div>

        <!--_________________________________________________________________liste des catégories-->
<div class="col-md-9">
    <div class="panel panel-primary panstyl">
        <div class="panel-heading clearfix">
            <h3 class="panel-title">Liste des catégories</h3>
        </div>

        <div class="panel-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Type de jeu</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $cat) : ?>
                    <tr>
                        <td><?= $cat->id ?></td>
                        <td><?= $cat->type ?></td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
</div>
