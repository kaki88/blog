<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img  class="logo" src="<?= $this->Url->image('logo.png') ?>"></a>
        </div>


        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i> Admin</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Créer une catégorie</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <?php $cell = $this->cell('Login');
                echo $cell; ?>
            </li>
            </ul>
        </div>
    </div>
</nav>






