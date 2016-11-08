<!--<div class="users form large-9 medium-8 columns content">-->
    <!--<?= $this->Form->create($user) ?>-->
    <!--<fieldset>-->
        <!--<legend><?= __('Add User') ?></legend>-->
        <!--<?php-->
            <!--echo $this->Form->input('login');-->
            <!--echo $this->Form->input('email');-->
            <!--echo $this->Form->input('password');-->
            <!--echo $this->Form->input('firstname');-->
            <!--echo $this->Form->input('lastname');-->
            <!--echo $this->Form->input('address');-->
            <!--echo $this->Form->input('city_id', ['options' => $cities]);-->
            <!--echo $this->Form->input('birthday');-->
            <!--echo $this->Form->input('active');-->
            <!--echo $this->Form->input('connected');-->
            <!--echo $this->Form->input('role_id', ['options' => $roles]);-->
            <!--echo $this->Form->input('avatar');-->
        <!--?>-->
    <!--</fieldset>-->
    <!--<?= $this->Form->button(__('Submit')) ?>-->
    <!--<?= $this->Form->end() ?>-->
<!--</div>-->

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

<script>
    $("#ville").easyAutocomplete(options_ac);
    function reset() {
        document.getElementById("form").reset();
    }
</script>