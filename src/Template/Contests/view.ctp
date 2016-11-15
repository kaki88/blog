<div class="col-md-9 ">

<div class=" spacetbl tbl-prin voffset2">
    <table class="table  ">

        <thead>
        <tr class="type">
            <th colspan="3" >
                            <span style="color: <?= $contest->category->color ?>;
                            background-color:  #eeeeee;padding: 2px 5px  2px 5px;
                            border-radius: 4px;
                            ; font-size: 14px" ><?= $contest->category->code ?></span>


                <span class=" nom"><?= $contest->name ?></span>



                <span class="pull-right">
 <a href="http://www.facebook.com/share.php?u=http://olivierp.simplon-epinal.tk/blog/" target="_blank" title="">
     test
 </a>



                            <nav class="navbar navbar-default navbar-xs" role="navigation">
                            <div class="collapse navbar-collapse mini" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav mininav">
                                    <li class="dropdown">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-share-alt-square" aria-hidden="true"></i>
    <i class="fa fa-caret-down" aria-hidden="true"></i></a>
    <ul class="dropdown-menu">
        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share"> Facebook</span></a></li>
        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i> <span class="share">Twitter</span></a></li>

    </ul>
</li>
                                        <li><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a></li>


                                    <li id="fav-<?= $contest->id?>" class="favs"><a href="#">
                                        <?php if (in_array($contest->id, $favlist))  :?>
                                        <i class="fa fa-heartbeat" aria-hidden="true"></i>
                                        <?php else :?>
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        <?php endif ?>
                                    </a></li>




<li id="marker-<?= $contest->id?>" class="markers"><a href="#">
                                    <?php if (in_array($contest->id, $markerlist))  :?>
    <i class="fa fa-times" aria-hidden="true"></i>
    <?php else :?>
    <i class="fa fa-check" aria-hidden="true"></i>
    <?php endif ?>
</a></li>

                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                                </span>

            </th>
        </tr>
        </thead>

        <tbody  class="bod">
        <tr>
            <?php
                    $row = 2;
                    if ($contest->zone) {$row++;};
                    if ($contest->restriction) {$row++;};
                    if ($contest->answer) {$row++;};
                    ?>

            <td width="17%" rowspan="<?= $row ?>" class="hidden-xs rowimg">

                <?php if ($contest->img_url): ?>
                <?= $this->Html->image("../uploads/img/$contest->img_url" , ['class' => 'contest-img zoom voffset3'])?>
                <?php endif ?>




            </td>
            <td width="20%"><span class="befprize">Lot(s) à gagner </span></td>
            <td width="63%"><span class="prize"><?= $contest->prize ?></span></td>


        </tr>
        <tr>
            <td><span class="befprize">Principe </span></td>
            <td><span class="befdescr"><?= $contest->principle->description ?></span></td>

        </tr>
        <?php if ($contest->zone) : ?>
        <tr>
            <td><span class="befprize">Zone(s) éligible(s) </span></td>
            <td><span class="befdescr">
                         <?php $zonearray =  explode(",",$contest->zone);
                                 foreach ($zones as $zone) : ?>
                <?php if( in_array( $zone->id ,$zonearray ) ) : ?>
                <?= $zone->place ?> |
                <?php endif ?>
                <?php endforeach ?>
                        </span></td>
        </tr>
        <?php endif ?>
        <?php if ($contest->restriction) : ?>
        <tr>
            <td><span class="befprize">Restriction(s) </span></td>
            <td><span class="befdescr">
                           <?php $array =  explode(",",$contest->restriction);
                                   foreach ($restrictions as $restriction) : ?>
                <?php if( in_array( $restriction->id ,$array ) ) : ?>
                <?= $restriction->sort ?>  |
                <?php endif ?>
                <?php endforeach ?>
                        </span></td>
        </tr>
        <?php endif ?>
        <?php if ($contest->answer) : ?>
        <tr>
            <td><span class="befprize">Réponse(s) </span></td>
            <td><span class="befdescr">
                      <?= $contest->answer ?>
                        </span></td>
        </tr>
        <?php endif ?>
        <tr>


            <td class="minimenu text-center hidden-xs" >
            <span class=" clos ">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                <?= $contest->deadline->i18nformat('dd MMMM YYYY') ?>
                             </span>

            <td class="minimenuxs text-center hidden-sm hidden-md hidden-lg" >
                          <span class=" clos ">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                              <?= $contest->deadline->i18nformat('dd/MM') ?>
                             </span>
            </td>


            <td colspan="2" class="pubby" >

                <div class="pull-left voffset1">

                                <span class="publierle hidden-xs  hidden-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  par <?= $contest->user->login ?> le <?= $contest->created->i18nformat('dd MMM ') ?>
                                à   <?= $contest->created->i18nformat('HH:mm') ?></span>
                    <span class="publierle  hidden-xs  hidden-md hidden-lg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <?= $contest->user->login ?> le <?= $contest->created->i18nformat('dd/MM') ?></span>

                    <?php $ico = $contest->frequency->icon_url ?>
                    <?= $this->Html->image("../uploads/icons/$ico" , ['class' => 'admin-ico-freq hidden-xs'])?>
                    <?php if ($contest->on_facebook) : ?>
                    <?= $this->Html->image('facebook.jpg', ['class' => 'admin-ico-freq hidden-xs']) ?>
                    <?php endif ?>

                </div>
                <div class="pull-right">
                    <div class="dejouerplace deja-<?= $contest->id?> hidden">
                        <?= $this->Html->image("jouer.png" , ['class' => 'dejajouer'])?>
                    </div>
                    <?php if (in_array($contest->id, $markerlist))  :?>
                    <div class="dejouerplace deja-<?= $contest->id?>" >
                        <?= $this->Html->image("jouer.png" , ['class' => 'dejajouer'])?>
                    </div>
                    <?php endif ?>

                    <div class="enfav enfav-<?= $contest->id?> hidden">
                        <?= $this->Html->image("fav.png" , ['class' => 'dejafav'])?>
                    </div>
                    <?php if (in_array($contest->id, $favlist))  :?>
                    <div class="enfav enfav-<?= $contest->id?>" >
                        <?= $this->Html->image("fav.png" , ['class' => 'dejafav'])?>
                    </div>
                    <?php endif ?>

                    <?php if ($contest->rule_url) : ?>
                    <a href="<?= $contest->rule_url ?>" target="_blank">
                        <button type="button" class="btn btn-sm red hidden-xs">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        </button>
                    </a>
                    <?php endif ?>


                    <button type="button" class="btn btn-sm  btn-warning bt-post cacher" id="<?= $contest->id?>" >
                        <i class="fa fa-comments" aria-hidden="true"></i> <span id="count-<?= $contest->id?>">(<?= count($contest->posts) ?>)</span>
                    </button>


                    <a href="<?= $contest->game_url ?>" target="_blank">
                        <button type="button" class="btn btn-sm blue">
                            <strong>   <i class="fa fa-external-link" aria-hidden="true"></i> PARTICIPER</strong>
                        </button>
                    </a>
                </div>

            </td>
        </tr>
        </tbody>
    </table>

</div>

<div class="post" id="post-<?= $contest->id?>"></div>

</div>