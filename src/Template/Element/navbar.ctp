
<nav class="navbar navbar-default navv " role="navigation">
    <div class="container-fluid">
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

        <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg"  style="position: absolute; right: 90px; top: 0;">
            <li class="dropdown">
                <?php $cell = $this->cell('Login');
                echo $cell; ?>
            </li></ul>

        <div class="collapse navbar-collapse" id="navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li><a href="<?= $this->Url->build(['controller' => 'Contests','action' => 'add' , 'prefix' => false ]); ?>">
                    Nouveaux</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Contests','action' => 'add' , 'prefix' => false ]); ?>">
                    Hot</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Contests','action' => 'add' , 'prefix' => false ]); ?>">
                    Favoris</a></li>

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

            <ul class="nav navbar-nav navbar-right navbar-right-custom">
                <li>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rechercher">
                        </div>
                        <button type="submit" class="btn btn-default">Ok</button>
                    </form>
                </li>
            </ul>

                <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg"  style="position: absolute; right: 90px; top: 0;">
                    <li class="dropdown">
                        <?php $cell = $this->cell('Login');
                        echo $cell; ?>
                    </li></ul>

                <div class="collapse navbar-collapse" id="navbar-collapse">

                    <ul class="nav navbar-nav navbar-right navbar-right-custom">
                        <li class="dropdown hidden-xs">
                            <?php $cell = $this->cell('Login');
                            echo $cell; ?>
                        </li>
                    </ul>
                </div>

        </div>
    </div>
</nav>

<div class="wrap ">
    <?php $cellwin = $this->cell('Wincount');
    echo $cellwin; ?>
<div class="header">
</div>
</div>












