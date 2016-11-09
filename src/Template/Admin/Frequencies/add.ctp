<!--_________________________________________________________________ajouter une frequences-->
<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <?= __('Créer') ?></h3>
            </div>

            <div class="panel-body">
                <?= $this->Form->create($frequency, ['type' => 'file']); ?>
                <?php
                        echo $this->Form->input('period',['label' => 'Nom de la fréquence']);
                        ?>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 30px; height: 30px;">
                        <img src="<?= $this->Url->image('no-avatar.png') ?>" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 30px; max-height: 30px;"> </div>

                                                                                <span class="btn default btn-xs btn-file">
                                                                                    <span class="fileinput-new btn btn-xs btn-primary"> Icône </span>
                                                                                    <span class="fileinput-exists btn btn-xs btn-warning"> Modifier </span>
                                                                                    <input type="file" name="icon_url"> </span>

                        <a href="javascript:;" class="btn btn-xs btn-danger fileinput-exists" data-dismiss="fileinput"> Annuler </a>
                    <div>
                    </div>
                </div>
            <div>
                <?= $this->Form->button(__('Ajouter'),['class'=>'btn btn-success']) ?>
            </div>
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
