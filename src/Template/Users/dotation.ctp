<?php $this->assign('title', 'Liste des dotations'); ?>

<?= $this->Html->script('rgraph/RGraph.svg.common.core.js') ?>
<?= $this->Html->script('rgraph/RGraph.svg.hbar.js') ?>
<?= $this->Html->script('rgraph/RGraph.svg.common.tooltips.js') ?>
<?= $this->Html->script('rgraph/RGraph.common.core.js') ?>
<?= $this->Html->script('rgraph/RGraph.common.key.js') ?>
<?= $this->Html->script('rgraph/RGraph.common.effects.js') ?>
<?= $this->Html->script('rgraph/RGraph.svg.pie.js') ?>



<div class="wrapper">

<div class="row">

    <div class="col-md-12">
    <div class="panel panel-success  userdot">
        <div class="panel-body paneldef"><?= $login ?> a remporté <?= count($users) ?> lots depuis son inscription du <?= $loginreg->created  ?></div>
    </div>
    </div>

    <div class="col-md-12 voffset3">
        <div class="panel panel-default">
            <div class="panel-heading panelhome panellast">Liste des lots remportés</div>
            <div class="panel-body">
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
            <th>Etat</th>
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
                <td>
                    <?php if($user->state == 0):?>
                    <button style="width: 100px" class="btn btn-sm btn-warning state" type="button" id="state<?= $user->contest->id?>">En attente</button>
                    <?php endif ?>
                    <?php if($user->state == 1):?>
                    <button style="width: 100px" class="btn btn-sm btn-success state" type="button" id="state<?= $user->contest->id?>">Reçu</button>
                    <?php endif ?>
                    <?php if($user->state == 2):?>
                    <button style="width: 100px" class="btn btn-sm btn-danger state" type="button" id="state<?= $user->contest->id?>">Annulé</button>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

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


    <div class="col-md-12 voffset2">
        <div class="panel panel-default">
            <div class="panel-heading panelhome panellast">Types de jeux</div>
            <div class="panel-body">
        <div  id="chart-container-pie" class="col-md-12"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default ">
            <div class="panel-heading panelhome panellast">Gains par année</div>
            <div class="panel-body">
        <div  id="chart-container" ></div>
            </div>
        </div>
    </div>




</div>

</div>


<?php
$total = count($users);

function pourcent($value, $total){
$res = $value * 100 / $total;
$result = round($res,0);
return $result;
}
?>

<script>
    new RGraph.SVG.HBar({
        id: 'chart-container',
        data: [<?= $win2017 ?>,<?= $win2016 ?>],
        options: {
            backgroundGrid: false,
            xaxis: false,
            xaxisScale: false,
            colors: ['#164366','#FDB515'],
            colorsSequential: true,
            yaxisLabels: ['2017','2016'],
            labelsAbove: true,
            labelsAboveDecimals: 0,
            yaxisTickmarks: false
        }
    }).wave();



    var data   =  [<?= pourcent($ig,$total) ?>,<?= pourcent($tas,$total) ?>,<?= pourcent($score,$total) ?>,<?= pourcent($vote,$total) ?>,<?= pourcent($jury,$total) ?>,<?= pourcent($twitter,$total) ?>,<?= pourcent($sms,$total) ?>,<?= pourcent($courrier,$total) ?>,<?= pourcent($magasin,$total) ?>];
    var labels = ['Instant Gagnant (<?= $ig ?>','Tirage au sort (<?= $tas ?>','Score (<?= $score ?>','Vote (<?= $vote ?>','Jury (<?= $jury ?>','Twitter (<?= $twitter ?>','Sms & téléphone (<?= $sms ?>','Courrier (<?= $courrier ?>','Magasin (<?= $magasin ?>'];

    for (var i=0; i<data.length; ++i) {
        labels[i] = labels[i] + ' lots, ' + data[i] + '%)';
    }

    new RGraph.SVG.Pie({
        id: 'chart-container-pie',
        data: data,
        options: {
            labels: labels,
            tooltips: labels,
            colors: ['#EC0033','#A0D300','#FFCD00','#00B869','#999999','#FF7300','#004CB0'],
            strokestyle: 'white',
            linewidth: 2,
            shadow: true,
            shadowOffsetx: 2,
            shadowOffsety: 2,
            shadowBlur: 3,
            exploded: 7
        }
    }).roundRobin();


//  boutons etats
    $('.state').click(function () {
        var id = $(this).attr('id').substring(5);
        if ($(this).hasClass("btn-warning")) {
            $(this).removeClass("btn-warning").addClass("btn-success").text('Reçu');
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Users","action" => "state", "prefix" => false]); ?>',
                data: 'id=' + id + '&state=1',
                error: function (html) {
                    alert(html);
                }
            });
        }
        else {
            if ($(this).hasClass("btn-success")) {
                $(this).removeClass("btn-success").addClass("btn-danger").text('Annulé');
                $.ajax({
                    type: 'post',
                    url: '<?= $this->Url->build(["controller" => "Users","action" => "state", "prefix" => false]); ?>',
                    data: 'id=' + id + '&state=2',
                    error: function (html) {
                        alert(html);
                    }
                });
            }
            else {
                if ($(this).hasClass("btn-danger")) {
                    $(this).removeClass("btn-danger").addClass("btn-warning").text('En attente');
                    $.ajax({
                        type: 'post',
                        url: '<?= $this->Url->build(["controller" => "Users","action" => "state", "prefix" => false]); ?>',
                        data: 'id=' + id + '&state=0',
                        error: function (html) {
                            alert(html);
                        }
                    });
                }
            }
        }
    });


</script>