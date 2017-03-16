<?php if($isConnected) { ?>
<div class="panel panel-default ">
    <div class="panel-heading paneltop panellog">Bienvenue <?= $auth ?></div>
    <div class="panel-body connectpan" >

        <div class="col-md-4 logimg" >
        <?= $this->Html->image("../uploads/avatars/$user->avatar" , ['class' => 'logavatar'])?>
        </div>

        <div class="col-md-8" >
      <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'view' ,$myId, $auth,'prefix'=> false]); ?>">
          <span class="glyphicon glyphicon-user"></span> Profil</a><br>
            <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'dotation' ,$myId, $auth,'prefix'=> false]); ?>"><i class="fa fa-heart" aria-hidden="true"></i>
                </span> Mes Favoris</a><br>
         <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'dotation' ,$myId, $auth,'prefix'=> false]); ?>"><i class="fa fa-trophy" aria-hidden="true"></i>
                </span> Mes Gains</a><br>
            <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'logout',
        'prefix' => false]); ?>"><span class="glyphicon glyphicon-off"></span> Deconnexion</a>
        </div>

    </div>
</div>





<?php }else{?>

<div class="panel panel-default voffset2">
    <div class="panel-heading paneltop panellog">S'enregistrer</div>
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login']]) ?>

        <div class="panel-body connectpan" >
            <fieldset>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="user" type="text" class="form-control" name="login" value="" placeholder="Pseudo">
            </div>

            <div class="input-group voffset1">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe">
            </div>

            <div class="form-group">
                <!-- Button -->
                <div class="controls voffset1">
                    <button type="submit" href="#" class="btn btn-success ">
                        OK</button>
                        Mot de passe perdu?

                </div>
            </div>


            <?= $this->Form->end() ?>
                </fieldset>
            <a  href="<?= $this->Url->build(['controller' => 'Users','action' => 'add']); ?>" class="btn btn-warning signin"><i class="fa fa-sign-in" aria-hidden="true"></i>
                Inscription</a>
            <div>

            </div>
        </div>
</div>

<?php } ?>

