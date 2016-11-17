<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Contests', 'action' => 'home','prefix'=> false]) ?>">Accueil</a>
        </div>

        <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg"  style="position: absolute; right: 90px; top: 0;">
            <li class="dropdown">
                <?php $cell = $this->cell('Login');
                        echo $cell; ?>
            </li></ul>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">


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
                <?php endif ?>

                <?php $alert = $this->cell('Alert');
                        echo $alert; ?>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= $this->Url->build(['controller' => 'Contests','action' => 'add' , 'prefix' => false ]); ?>"><i class="fa fa-plus-square" aria-hidden="true"></i>
                    Proposer un jeu</a></li>
                <li class="dropdown hidden-xs">
                    <?php $cell = $this->cell('Login');
                            echo $cell; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>






