<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->css('bootstrap-select.min.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<?= $this->Html->script('bootstrap-select.min.js') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <i class="icon-calendar"></i>
                <h3 class="panel-title">
                    <?= __('Editer un jeu concours') ?></h3>
            </div>

            <div class="panel-body">
                <div class="col-md-6">
                    <?php
                        echo $this->Form->create($contest , ['type' => 'file','id' => 'form']);

                    echo $this->Form->input('name', ['placeholder'=> 'ex : Fromage ROUY - Le quizz des saveurs', 'label' => 'Nom de l\'opération',  'prepend' => '<i class="fa fa-ticket" aria-hidden="true"></i>']);
                    echo $this->Form->input('game_url', ['placeholder'=>'https://nom-du-site.com', 'label' => 'Lien vers le jeu',  'prepend' => '<i class="fa fa-link" aria-hidden="true"></i>']);
                    echo $this->Form->input('rule_url', ['placeholder'=>'https://nom-du-site.com/reglement.pdf','label' => 'Lien vers le règlement',  'prepend' => '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>']);
                    ?>


                    <div class="form-group text required">
                     <label class="control-label">Zone</label>
                        <div  class="input-group"><span   class="input-group-addon">
                            <i class="fa fa-globe" aria-hidden="true"></i></span>
                    <select data-width="75%" class="selectpicker" multiple name="zonez[]" title="---- Choisissez de(s) zone(s) ----">
                        <?php foreach ($zones as $zone) : ?>
                        <?php $zonearray =  explode(",",$contest->zone);?>
                        <option value="<?= $zone->id ?>"
                        <?php if( in_array( $zone->id ,$zonearray ) ) : ?>
                       selected = "selected"
                        <?php endif ?>
                        ><?= $zone->place ?></option>
                        <?php endforeach ?>
                    </select>
                        </div>
                    </div>

                    <div class="form-group text required">
                        <label class="control-label">Restriction</label>
                        <div class="input-group"><span class="input-group-addon">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                            <select data-width="75%" class="selectpicker" multiple name="restrictionz[] " title="---- Choisissez de(s) restriction(s) ----">
                                <?php foreach ($restrictions as $restriction) : ?>
                                <?php $restarray =  explode(",",$contest->restriction);?>
                                <option value="<?= $restriction->id ?>"
                                <?php if( in_array( $restriction->id ,$restarray ) ) : ?>
                                selected = "selected"
                                <?php endif ?>
                                ><?= $restriction->sort ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <?php
                                        echo $this->Form->input('deadline',['placeholder'=>'yyyy-mm-dd','label' => 'Date limite de participation', 'type' => 'text',  'prepend' => '<i class="fa fa-calendar" aria-hidden="true"></i>']);

                    echo $this->Form->input('category_id', ['empty'=>'---- Choisissez un type de jeu ----', 'options' => $categories, 'label' => 'Type de jeu',  'prepend' => '<i class="fa fa-tag" aria-hidden="true"></i>']);
                    echo $this->Form->input('frequency_id', ['empty'=>'---- Choisissez un cycle ----', 'options' => $frequencies, 'label' => 'Participation',  'prepend' => '<i class="fa fa-clock-o" aria-hidden="true"></i>']);
                    echo $this->Form->input('principle_id', ['empty'=>'---- Choisissez une instruction ----', 'options' => $principles, 'label' => 'Principe du jeu',  'prepend' => '<i class="fa fa-sticky-note-o" aria-hidden="true"></i>']);
                    ?>

                    <label class="control-label">Image du jeu</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="input-group input-large">
                            <span class="input-group-addon" ><i class="fa fa-file-image-o" aria-hidden="true"></i> </span>
                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                <span class="fileinput-filename"><?= $contest->img_url ?></span>
                            </div>
                        <span class="input-group-addon btn default btn-file">
                                                                                    <span class="fileinput-new"> Choisir </span>
                                                                                    <span class="fileinput-exists"> Modifier </span>
                                                                                    <input type="file" name="img_edit"> </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Supprimer </a>
                        </div>
                    </div>

                </div>






                <div class="col-md-12">
                    <div class="row">
                <div class="col-md-6">
                    <?php
                    echo $this->Form->input('prize',['label' => 'Dotation(s)']);
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                        echo $this->Form->input('answer',['label' => 'Réponse(s)']);
                    ?>
                </div>
                </div>
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


<?= $this->Html->script('jquery-ui.js')?>
<script>
//mise en place du datepicker jQuery
date('#deadline', '-0:+10', 'y');

    //format date
    $( document ).ready(function() {
        var date = $('#deadline').val();
        var dateformat = date.split("/").reverse().join("-");
        $('#deadline').val(dateformat);
    });
</script>