<li>
    <form class="navbar-form navbar-left" role="search">
    <select name="" id="catselect" class="form-control" style="width: 200px;">
    <option selected disabled>Catégories</option>
        <option value="all">Tous les jeux</option>
        <?php foreach($cats as $cat) :?>
    <option value="<?= $cat->id ?>"><?= $cat->type ?></option>
        <?php endforeach ?>
</select>
    </form>
</li>