<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<div class="row">
<div class="col-md-12">
    <div class="panel panel-primary panstyl">
        <div class="panel-heading clearfix">
            <i class="icon-calendar"></i>
            <h3 class="panel-title">
                <?= __('Déposer un jeu concours') ?></h3>
        </div>

        <div class="panel-body">
            <div class="col-md-6">
                <?php
                        echo $this->Form->create($contest , ['type' => 'file','id' => 'form']);

                        echo $this->Form->input('name', ['label' => 'Nom de l\'opération',  'prepend' => '<i class="fa fa-ticket" aria-hidden="true"></i>']);
                        echo $this->Form->input('game_url', ['label' => 'Lien vers le jeu',  'prepend' => '<i class="fa fa-link" aria-hidden="true"></i>']);
                        echo $this->Form->input('rule_url', ['label' => 'Lien vers le règlement',  'prepend' => '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>']);
                        echo $this->Form->input('deadline',['label' => 'Date limite de participation']);

                        ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $this->Form->input('category_id', ['options' => $categories, 'label' => 'Type de jeu',  'prepend' => '<i class="fa fa-tag" aria-hidden="true"></i>']);
                        echo $this->Form->input('frequency_id', ['options' => $frequencies, 'label' => 'Participation',  'prepend' => '<i class="fa fa-clock-o" aria-hidden="true"></i>']);
                        echo $this->Form->input('on_facebook',['label' => 'Sur facebook ?']);
                        echo $this->Form->input('img_url',['type' => 'file']);
                        ?>
                <br> <br> <br>
            </div>



                <div class="col-md-12">
                    <?php
                            echo $this->Form->input('restrictions._ids', ['options' => $restrictions, 'type'=>'checkbox']);
                            echo $this->Form->input('zones._ids', ['options' => $zones, 'type'=>'checkbox']);
                    echo $this->Form->input('prize',['label' => 'Dotation(s)']);
                    echo $this->Form->input('answer',['label' => 'Réponse(s)']);
                    ?>
                </div>



            <div class="row ">
                <div class="col-md-12">
                <div class="btn-toolbar text-center ">

                    <?= $this->Form->button(' <i class="fa fa-times" aria-hidden="true"></i> Effacer', ['onclick' => 'reset()' , 'type'=>'button','class' => 'btn btn-danger ']) ; ?>
                    <?= $this->Form->button(' <i class="fa fa-check" aria-hidden="true"></i> Valider', ['type'=>'submit' , 'class' => 'btn btn-success  ', 'div' => false]) ; ?>
                    <?= $this->Form->end() ?>
                </div>
                </div>
            </div>







        </div>
    </div>
</div>
</div>
