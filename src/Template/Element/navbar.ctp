<div class="admin"></div>
<div class="wrap ">
    <?php $cellwin = $this->cell('Wincount');
  ?>
    <div class="header">
    </div>
</div>

<div class="container-fluid">
<nav class="navbar navbar-default navv " role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Contests', 'action' => 'home','prefix'=> false]) ?>">
                <i class="fa fa-home" aria-hidden="true"></i>
            </a>

        </div>



        <div class="collapse navbar-collapse" id="navbar-collapse-2">
            <ul class="nav navbar-nav">
                <?php $cellwin = $this->cell('Category');
                echo $cellwin; ?>
                <li><a href="<?= $this->Url->build(['controller' => 'Contests','action' => 'category' , 'prefix' => false ]); ?>">
                    <i class="fa fa-calendar" aria-hidden="true"></i> Nouveaux</a></li>
                <li><a href="/jeux?tri=recommandation&ordre=desc">
                    <i class="fa fa-thermometer-half" aria-hidden="true"></i> Les + Hot</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Contests','action' => 'add' , 'prefix' => false ]); ?>">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Publier</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Forums','action' => 'index' , 'prefix' => false ]); ?>">
                    <i class="fa fa-comments" aria-hidden="true"></i>  Forum</a></li>


                <?php if ($this->request->session()->read('Auth.User.role_id') == 1) : ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i> Admin</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= $this->Url->build(['controller' => 'Users','action' => 'index' , 'prefix' => 'admin' ]); ?>"><i class="fa fa-list-alt" aria-hidden="true"></i>
                            Liste des membres</a></li>
                        <li class="divider"></li>
                        <li><?= $this->Html->link('<i class="fa fa-list-alt" aria-hidden="true"></i> Concours',
                            ['controller' => 'Contests', 'action' => 'index','prefix'=> 'admin'],['escape' => false]); ?></li>
                        <li class="divider"></li>
                        <li><?= $this->Html->link('Catégories',
                            ['controller' => 'Categories', 'action' => 'add','prefix'=> 'admin']); ?></li>
                        <li><?= $this->Html->link('Fréquences',
                            ['controller' => 'Frequencies', 'action' => 'add','prefix'=> 'admin']); ?></li>
                        <li><?= $this->Html->link('Restrictions',
                            ['controller' => 'Restrictions', 'action' => 'add','prefix'=> 'admin']); ?></li>
                        <li><?= $this->Html->link('Zones',
                            ['controller' => 'Zones', 'action' => 'add','prefix'=> 'admin']); ?></li>
                        <li><?= $this->Html->link('Principes',
                            ['controller' => 'Principles', 'action' => 'add','prefix'=> 'admin']); ?></li>
                    </ul>
                </li>
                <?php $alert = $this->cell('Alert');
                echo $alert; ?>
                <?php endif ?>
            </ul>

<!--            <ul class="nav navbar-nav navbar-right navbar-right-custom">
                <li>

                        <?php echo $this->Form->create('Post',array('id' => 'form-search' , 'class' => 'navbar-form navbar-left','type' => 'get','url' => '/jeux' )); ?>

                        <div class="form-group">
                            <?= $this->Form->input('rechercher', ['label' => false ,'placeholder' => 'Rechercher', 'templates' => [
                            'inputContainer' => '{{content}}'
                            ]]);  ?>
                        </div>
                        <button type="submit" class="btn btn-default">Ok</button>
                    </form>
                </li>
            </ul>-->


        </div>

</nav>
</div>













