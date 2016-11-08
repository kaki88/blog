<!--_________________________________________________________________ajouter une frequences-->
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <?= __('Créer') ?></h3>
            </div>

            <div class="panel-body">
                <?= $this->Form->create($frequency) ?>
                <?php
                        echo $this->Form->input('period',['label' => 'Nom de la fréquence']);
                        ?>
                <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

    <!--_________________________________________________________________liste des fréquences-->
    <div class="col-md-9">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Liste des fréquences</h3>
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
                        <?php foreach ($frequencies as $freq) : ?>
                        <tr>
                            <td><?= $freq->id ?></td>
                            <td><?= $freq->period ?></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
