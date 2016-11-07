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



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <i class="icon-calendar"></i>
                <h3 class="panel-title">
                    <?= __('Créer un compte') ?></h3>
            </div>

            <div class="panel-body">
                <div class="col-md-6">
                    <?php
                    echo $this->Form->create($user , ['id' => 'form']);
                    echo $this->Form->input('login',['label' => 'Nom d\'utilisateur',  'prepend' => '<i class="fa fa-user" aria-hidden="true"></i>']);
                    echo $this->Form->input('email',['label' => 'Email',  'prepend' => '<i class="fa fa-envelope" aria-hidden="true"></i>']);
                    echo $this->Form->input('password',['label' => 'Mot de passe',  'prepend' => '<i class="fa fa-key" aria-hidden="true"></i>']);
                    echo $this->Form->input('birthday',  ['label' => 'Date de naissance', 'type'=>'text','prepend' => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>']);
                    echo $this->Form->input('city_id', ['type' => 'text', 'type' => 'hidden']);
                    echo $this->Form->input('ville',  ['prepend' => '<i class="fa fa-globe" aria-hidden="true"></i>']);
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
         ?>
                avatar / captcha
                </div>

                <div class="row">
                    <div class="btn-toolbar text-center">

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