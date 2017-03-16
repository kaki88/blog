<?= $this->Html->script('rgraph/RGraph.svg.common.core.js') ?>
<?= $this->Html->script('rgraph/RGraph.svg.hbar.js') ?>

<div class="wrapper">

<div class="row">
    <div class="col-lg-12">

        <div class="userdot"><?= $login ?> a remporté <?= count($users) ?> lots depuis son inscription du <?= $loginreg->created  ?></div>


            <div  id="chart-container"></div>


        <div class="main-box no-header clearfix">
            <div class="main-box-body clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Type</th>
            <th>Organisateur</th>
            <th>Description</th>
            <th>Valeur</th>
        </tr>
        </thead>
        <tbody>

        <?php $count = count($users) ?>
        <?php if ($count < 1) : ?>
        <tr >
        <td colspan="7" align="center">Vous n'avez pas  gagné ou déclaré de gain concours</td>
        </tr>
        <?php endif ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $count-- ?></td>
                <td><?= $user->date->i18nFormat('dd MMM yyyy'); ?></td>
                <td><?= $user->date->i18nFormat('HH:mm'); ?></td>
                <td><?= $user->contest->category->code?></td>
                <td><?= $user->contest->name?></td>
                <td><?= $user->description?></td>
                <td><?= $user->price ?> €</td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

        </div>
            </div>
        </div>
</div>

    <div class="pagination left">
        <?php
                    echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
        'disabled','disabledTag' => 'a'));
        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
        'active','tag' => 'li','first' => 1));
        echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
        array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
    </div>
</div>

</div>




<script>
    new RGraph.SVG.HBar({
        id: 'chart-container',
        data: [20,30,22],
        options: {
            backgroundGrid: false,
            xaxis: false,
            xaxisScale: false,
            colors: ['#164366','#FDB515','#FF0000'],
            colorsSequential: true,
            yaxisLabels: ['2017','2016','2015'],
            labelsAbove: true,
            labelsAboveDecimals: 0,
            yaxisTickmarks: false
        }
    }).wave();
</script>