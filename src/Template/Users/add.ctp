
<?= $this->Html->css('bootstrap-fileinput.css') ?>
<?= $this->Html->script('bootstrap-fileinput.js') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary panstyl">
            <div class="panel-heading clearfix">
                <i class="icon-calendar"></i>
                <h3 class="panel-title">
                    <?= __('Créer un compte') ?></h3>
            </div>

            <div class="panel-body">
                <div class="col-md-6">
                    <?php
                    echo $this->Form->create($user , ['type' => 'file','id' => 'form']);
                    echo $this->Form->input('login',['label' => 'Nom d\'utilisateur',  'prepend' => '<i class="fa fa-user" aria-hidden="true"></i>']);
                    echo $this->Form->input('email',['label' => 'Email',  'prepend' => '<i class="fa fa-envelope" aria-hidden="true"></i>']);
                    echo $this->Form->input('password',['label' => 'Mot de passe',  'prepend' => '<i class="fa fa-key" aria-hidden="true"></i>']);
                    echo $this->Form->input('birthday',  ['label' => 'Date de naissance', 'type'=>'text','prepend' => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>']);
                    echo $this->Form->input('city_id', ['type' => 'text', 'type' => 'hidden']);
                    echo $this->Form->input('ville',  ['prepend' => '<i class="fa fa-globe" aria-hidden="true"></i>']);
                    ?>
                </div>
                <div class="col-md-6 text-center">


                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">
                                <img src="<?= $this->Url->image('no-avatar.png') ?>" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"> </div>
                            <div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new btn btn-primary"> Ajouter un avatar </span>
                                                                                    <span class="fileinput-exists btn btn-success"> Modifier </span>
                                                                                    <input type="file" name="avatar"> </span>
                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Annuler </a>
                            </div>
                        </div>
                    <br> <br> <br>
                </div>



                <div class="row ">
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
        <?= $this->Html->script('jquery-ui.js')?>
<script>
// autocomplete ville
var options_ac = {

    url: "<?php echo $this->request->webroot . 'js/cities.json'; ?>",
    getValue: function(element) {
        return element.zipcode + ' | ' + element.city.toUpperCase();
    },
    list: {
        onSelectItemEvent: function() {
            var index = $("#ville").getSelectedItemData().id;
            $("#city-id").val(index).trigger("change");
        },
        maxNumberOfElements: 100,
        match: {
            enabled: true
        }
    },
    theme: "square"
};
$( document ).ready(function() {
    $("#ville").easyAutocomplete(options_ac);
    function reset() {
        document.getElementById("form").reset();
    }
});

//mise en place du datepicker jQuery
date('#birthday', '-30:-0', 'y');

</script>