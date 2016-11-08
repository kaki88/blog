<!--_________________________________________________________________ajouter une zone-->
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <?= __('Créer') ?></h3>
            </div>

            <div class="panel-body">
                <?= $this->Form->create($zone) ?>
                <?php
                        echo $this->Form->input('place',['label' => 'Nom de la zone']);
                        ?>
                <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <!--_________________________________________________________________liste des zones-->
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Liste des zones</h3>
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
                        <?php foreach ($zones as $zo) : ?>
                        <tr>
                            <td><?= $zo->id ?></td>
                            <td><?= $zo->place ?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
