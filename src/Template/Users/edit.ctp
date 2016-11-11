

<section id="profil">
<?= $this->Html->css('bootstrap-fileinput.css') ?>

        <?= $this->Html->script('bootstrap-fileinput.js') ?>
<div class="row">
    <div class="col-md-12 profil-head">
        <?php echo $this->Form->create($user , ['type' => 'file','id' => 'form']);  ?>

                <div class="col-md-6">
                    <?php
                            echo $this->Form->input('login',['label' => 'Nom d\'utilisateur',  'prepend' => '<i class="fa fa-user" aria-hidden="true"></i>']);
                            echo $this->Form->input('email',['label' => 'Email',  'prepend' => '<i class="fa fa-envelope" aria-hidden="true"></i>']);
                            echo $this->Form->input('password',['label' => 'Mot de passe',  'prepend' => '<i class="fa fa-key" aria-hidden="true"></i>']);
                    echo $this->Form->input('birthday',  ['label' => 'Date de naissance', 'type'=>'text','prepend' => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>']);
                    echo $this->Form->input('city_id', ['type' => 'text', 'type' => 'hidden']);
                    echo $this->Form->input('ville',  ['label'=>'Code postal / Ville', 'value'=>$user->city->city,'prepend' => '<i class="fa fa-globe" aria-hidden="true"></i>']);

                    ?>
                </div>
                <div class="col-md-6 text-center voffset2">


                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;">

                            <?php if ($user->avatar) : ?>
                            <?= $this->Html->image("../uploads/avatars/$user->avatar")?>
                            <?php else : ?>
                        <img src="<?= $this->Url->image('no-avatar.png') ?>" alt="" />
                        <?php endif ?>
                    </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 100px;"> </div>
                        <div>
                                                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new btn btn-warning"> Modifier l' avatar </span>
                                                                                    <span class="fileinput-exists btn btn-warning"> Modifier </span>
                                                                                    <input type="file" name="avatar-edit"> </span>
                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Annuler </a>
                        </div>
                    </div>
                    <br><br><br><br>
                </div>



                <div class="row ">
                    <div class="text-center ">

                        <?= $this->Form->button(' <i class="fa fa-check" aria-hidden="true"></i> Valider les modifications', [ 'id'=>'submit','class' => 'btn btn-success  ', 'div' => false]) ; ?>

                        <?= $this->Form->end() ?>
                        <br>     <br>
                    </div>
                </div>

            </div>
        </div>
    </section>
        <?= $this->Html->script('jquery-ui.js')?>
<script>
$("#ville").easyAutocomplete(options_ac);
function reset() {
    document.getElementById("form").reset();
}
$( "#submit" ).click(function() {
    $("#form").submit();
});

//mise en place du datepicker jQuery
date('#birthday', '-120:-0', 'y');

//format date
$( document ).ready(function() {
    var date = $('#birthday').val();
    var dateformat = date.split("/").reverse().join("-");
    $('#birthday').val(dateformat);
});
</script>