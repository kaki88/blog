<!--__________________________________________________________________________________________________stats du forum-->

<div class="table-responsive voffset2 tblrad">
    <table class="table tblrad">
        <thead class="statforum">
        <tr>
            <th colspan="2" scope="col"><span class="h4">Statistiques du forum</span></th>
        </tr>
        </thead>
        <tbody>

        <tr class="sscategory">
            <td width="6%">

                <?= $this->Html->image("../uploads/icons/stat.png" , ['class' => 'forum-icon'])?>

            </td>
            <td width="94%">
                Nos membres ont créé un total de <?= $countpost ?> messages dans <?= $countthread ?> sujets.<br>
                Nous avons actuellement <?= $countuser ?> membres enregistrés.<br>
                Bienvenue à notre nouveau membre, <a href="<?= $this->Url->build(['controller' => 'Users','action' => 'view' ,$lastuser->id, $lastuser->login,'prefix'=> false]); ?>"> <?= $lastuser->login ?> </a>
            </td>


        </tbody>
    </table>
</div>
