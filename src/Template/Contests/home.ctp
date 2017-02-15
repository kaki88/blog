<?php $this->assign('title', 'Accueil'); ?>
<?= $this->Html->css('animate.css') ?>


<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Signaler une erreur sur la fiche :
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form class="form-horizontal" role="form">

                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="title" class="form-control" id="gettitle" disabled>
                            <input name="id" class="form-control" id="id" type="hidden">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="alert-error"></div>
                        <div class="form-group">
                            <select name="object" class="form-control" id="sel1" required>
                                <option value="0" disabled="disabled" selected="selected">---- Objet de votre
                                    requête----
                                </option>
                                <option value="1">le jeu est terminé</option>
                                <option value="2">le lien ne fonctionne pas</option>
                                <option value="3">la description est erronée ou incomplète</option>
                                <option value="4">autre problème</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="text" class="form-control" rows="5" id="textarea"
                                      placeholder="Si nécessaire, précisez."></textarea>
                        </div>
                    </div>
                </form>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    Annuler
                </button>
                <button type="button" class="btn btn-primary" id="send-alert">
                    Envoyer
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


<div class="row">
    <div class="col-md-3 menuspace hidden-xs hidden-sm">
        <div class="row">
            <div class="btn-group-vertical col-md-12 col-xs-12 ">


                <ul class="form">


                    <li id="li-tous"><a class=" tous"
                                        href=" <?= $this->Url->build(['controller' =>'Contests', 'action' => 'home']);  ?>">
                        <?= $this->Html->image("menu/home.png" , ['class' => 'imgmenu'])?>
                        <span class="menufont">Tous les jeux</span>
                    <span class="badgemenu label label-default pull-right" style="color: black">
                      <?= $counttotal->count ?>
                    </span>
                    </a></li>


                    <?php foreach ($categories as $categorie) : ?>
                    <li id="li-<?= $categorie->id ?>"><a class="menufont <?= $categorie->code ?>"
                                                         href=" <?= $this->Url->build(['controller' =>'Contests', 'action' => 'home', $categorie->id, strtolower(str_replace(' ', '-', removeAccents($categorie->type)))]);  ?>">
                        <?= $this->Html->image("menu/".$categorie->icon_url , ['class' => 'imgmenu'])?>
                        <span class="menufont"><?=  $categorie->type ?></span>
                    <span class="badgemenu label label-default  pull-right" style="color: black">
                        <?= count($categorie->contests) ?>
                    </span>
                    </a></li>

                    <style>
                        .form li.selected a.<

                        ?
                        =
                        $
                        categorie- > code ? > {
                            background: < ? = $ categorie- > color ? >;
                            color: white;
                        }

                        .form li a.<

                        ?
                        =
                        $
                        categorie- > code ? > {
                            border-left: 7px solid < ? = $ categorie- > color ? >;
                            background-image: linear-gradient(to left,
                            transparent,
                            transparent 50%,
                            < ?=$ categorie- > color ? > 50%,
                            < ?=$ categorie- > color ? >);
                            background-position: 100% 0;
                            background-size: 200% 100%;
                            transition: all .25s ease-in;

                        }

                        .form li a.<

                        ?
                        =
                        $
                        categorie- > code ? > :hover {
                            color: white;
                            background-position: 0 0;
                        }
                    </style>
                    <?php endforeach ?>


                </ul>
            </div>
        </div>


    </div>


    <div class="col-sm-12 menuspace centermini hidden-xs hidden-md hidden-lg">

        <?php foreach ($categories as $categorie) : ?>
        <ul class=" miniform col-sm-4 col-xs-4  hidden-md hidden-lg">
            <li id="li-<?= $categorie->id ?>"><a style="display: block;text-decoration: none"
                                                 class="menufont <?= $categorie->code ?>"
                                                 href=" <?= $this->Url->build(['controller' =>'Contests', 'action' => 'home', $categorie->id, strtolower(str_replace(' ', '-', removeAccents($categorie->type)))]);  ?>">
                <?= $this->Html->image("menu/".$categorie->icon_url , ['class' => 'imgmenu'])?>
                <span class="menufont"><?=  $categorie->code ?></span>
            <span class="badgemenu label label-default  pull-right" style="color: black">
                        <?= count($categorie->contests) ?>
                    </span>
            </a></li>
        </ul>
        <?php endforeach ?>


    </div>

    <div class="col-xs-12 menuspace hidden-sm hidden-md hidden-lg">

        <?php foreach ($categories as $categorie) : ?>
        <ul class=" vminiform col-xs-12  hidden-sm hidden-md hidden-lg">
            <li id="li-<?= $categorie->id ?>"><a style="display: block;text-decoration: none"
                                                 class="menufont <?= $categorie->code ?>"
                                                 href=" <?= $this->Url->build(['controller' =>'Contests', 'action' => 'home', $categorie->id, strtolower(str_replace(' ', '-', removeAccents($categorie->type)))]);  ?>">
                <?= $this->Html->image("menu/".$categorie->icon_url , ['class' => 'imgmenu'])?>
                <span class="menufont"><?=  $categorie->code ?></span>
                <span class="badgemenu label label-default  pull-right" style="color: black">
                        <?= count($categorie->contests) ?>
                    </span>
            </a></li>
        </ul>
        <?php endforeach ?>
    </div>


    <div class="row hidden-lg hidden-md">
    </div>


    <!--________________________________________liste des jeux-->
    <div class="col-md-9 ">

        <?php foreach ($contests as $contest) :?>
        <div class="alertetat voffset2" id="alertetat-<?= $contest->id?>"></div>

        <div class=" spacetbl tbl-prin voffset2">
            <table class="table  ">

                <thead>
                <tr class="type">
                    <th colspan="4">
                            <span style="color: <?= $contest->category->color ?>;
                            background-color:  #eeeeee;padding: 2px 5px  2px 5px;
                            border-radius: 4px;
                            ; font-size: 14px"><?= $contest->category->code ?></span>


                        <a href="<?= $this->Url->build(['controller' => 'Contests', 'action' => 'gameview',$contest->id,
                            strtolower(str_replace(' ', '-', removeAccents($contest->name))),'prefix' => false]); ?>"
                           target="_blank"
                           style="text-decoration: none">
                            <span class=" nom"><?= $contest->name ?></span>
                        </a>

                        <?php if ($this->request->session()->read('Auth.User.id')) :?>
                        <div class="pull-right hidden-xs">


                            <nav class="navbar navbar-default navbar-xs" role="navigation">
                                <div class="collapse navbar-collapse mini" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav mininav">
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i
                                                    class="fa fa-caret-down" aria-hidden="true"></i>
                                                <i class="fa fa-share-alt-square" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php $link = 'http://olivierp.simplon-epinal.tk/blog/jeu-concours/'.$contest->
                                                id.'-'.strtolower(str_replace(' ', '-', removeAccents($contest->name)));
                                                ?>
                                                <li><a target="_blank"
                                                       OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"
                                                       href="https://www.facebook.com/sharer/sharer.php?u=<?= $link ?>">
                                                    <i class="fa fa-facebook-square" aria-hidden="true"></i> <span
                                                        class="share"> Facebook</span></a></li>
                                                <li>
                                                    <a href="https://twitter.com/intent/tweet?url=<?= $link ?>"
                                                       OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;">
                                                        <i class="fa fa-twitter-square" aria-hidden="true"></i> <span
                                                            class="share">Twitter</span></a></li>

                                            </ul>
                                        </li>
                                        <li><a id="modal-<?= $contest->id?>" class="btmodal" data-target="#alert"
                                               data-toggle="modal" href="#"><i class="fa fa-exclamation-triangle"
                                                                               aria-hidden="true"></i></a></li>


                                        <li id="fav-<?= $contest->id?>" class="favs"><a href="#">
                                            <?php if (in_array($contest->id, $favlist)) :?>
                                            <i class="fa fa-heartbeat" aria-hidden="true"></i>
                                            <?php else :?>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <?php endif ?>
                                        </a></li>


                                        <li id="marker-<?= $contest->id?>" class="markers"><a href="#">
                                            <?php if (in_array($contest->id, $markerlist)) :?>
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                            <?php else :?>
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <?php endif ?>
                                        </a></li>

                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </nav>
                        </div>
                        <?php endif ?>
                    </th>
                </tr>
                </thead>

                <tbody class="bod">
                <tr>

                    <?php
                    $row = 2;
                     if ($contest->zone) {$row++;};
                    if ($contest->restriction) {$row++;};
                    if ($contest->answer) {$row++;};
                    ?>

                    <td width="17%" rowspan="<?= $row ?>" class="hidden-xs rowimg">

                        <?php if ($contest->img_url): ?>
                        <?= $this->Html->image("../uploads/img/$contest->img_url" , ['class' => 'contest-img zoom
                        voffset3'])?>
                        <?php endif ?>


                    </td>
                    <td width="12%" rowspan="<?= $row ?>">
                        <div class="contain-pourcent">

                            <div>
                            <button class="btn btn-warning bt-vote plus" id="votep-<?= $contest->id?>"
                            <?php if (in_array($contest->id, $votelist) && $contest->users_votes[0]->result == 1) :?>
                                disabled
                            <?php endif ?>
                                <?php if (in_array($contest->id, $votelist) && $contest->users_votes[0]->result == 0) :?>
                                disabled style="background-color:grey"
                                <?php endif ?>
                                ><i class="fa fa-sun-o" aria-hidden="true"></i></button>
                                </div>
                                <div class="pourcent"><span class="pourcentid<?= $contest->id?>"><?= $contest->
                                    vote ?></span>°
                                </div>
                            <div>
                                <button class="btn btn-primary bt-vote minus" id="votem-<?= $contest->id?>"
                                <?php if (in_array($contest->id, $votelist) && $contest->users_votes[0]->result == 0) :?>
                                disabled
                                <?php endif ?>
                                <?php if (in_array($contest->id, $votelist) && $contest->users_votes[0]->result == 1) :?>
                                disabled style="background-color:grey"
                                <?php endif ?>
                                ><i
                                class="fa fa-snowflake-o" aria-hidden="true"></i>
                                </button>
                                </div>


                            <div class="progress vertical">
                                <?php
                            $vote = ($contest->vote) * 2 ;
                                ?>
                                <div class="progress-bar progress-bar-info progress-<?= $contest->id?>"
                                     role="progressbar" style="width: <?= $vote ?>%;">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td width="2%"><span class="befprize"><i class="fa fa-trophy" aria-hidden="true"></i> </span></td>
                    <td width="69%"><span class="prize"><?= $contest->prize ?></span></td>


                </tr>
                <tr>
                    <td>

                        <span class="befprize"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> </span></td>
                    <td><span class="befdescr"><?= $contest->principle->description ?></span></td>

                </tr>
                <?php if ($contest->zone) : ?>
                <tr>
                    <td><span class="befprize"><i class="fa fa-globe" aria-hidden="true"></i>
 </span></td>
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
                    <td><span class="befprize"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
 </span></td>
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
                    <td><span class="befprize"><i class="fa fa-list" aria-hidden="true"></i>
 </span></td>
                    <td><span class="befdescr">
                      <?= $contest->answer ?>
                        </span></td>
                </tr>
                <?php endif ?>
                <tr>


                    <td class="minimenu text-center hidden-xs">
                             <span class=" clos ">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                                 <?= $contest->deadline->i18nformat('dd MMMM YYYY') ?>
                             </span>

                    <td class="minimenuxs text-center hidden-sm hidden-md hidden-lg">
                          <span class=" clos ">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                              <?= $contest->deadline->i18nformat('dd/MM') ?>
                             </span>
                    </td>


                    <td colspan="3" class="pubby">

                        <div class="pull-left voffset1">

                                <span class="publierle hidden-xs  hidden-sm"><i class="fa fa-pencil-square-o"
                                                                                aria-hidden="true"></i>  par <?= $contest->
                                    user->login ?> le <?= $contest->created->i18nformat('dd MMM ') ?>
                                à   <?= $contest->created->i18nformat('HH:mm') ?></span>
                                    <span class="publierle  hidden-xs  hidden-md hidden-lg"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <?= $contest->user->login ?> le <?= $contest->
                                        created->i18nformat('dd/MM ') ?></span>

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
                            <?php if (in_array($contest->id, $markerlist)) :?>
                            <div class="dejouerplace deja-<?= $contest->id?>">
                                <?= $this->Html->image("jouer.png" , ['class' => 'dejajouer'])?>
                            </div>
                            <?php endif ?>

                            <div class="enfav enfav-<?= $contest->id?> hidden">
                                <?= $this->Html->image("fav.png" , ['class' => 'dejafav'])?>
                            </div>
                            <?php if (in_array($contest->id, $favlist)) :?>
                            <div class="enfav enfav-<?= $contest->id?>">
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

                            <?php if ($this->request->session()->read('Auth.User.id')) :?>
                            <button type="button" class="btn btn-sm  btn-warning bt-post cacher"
                                    id="<?= $contest->id?>">
                                <i class="fa fa-comments" aria-hidden="true"></i> <span
                                    id="count-<?= $contest->id?>">(<?= count($contest->posts) ?>)</span>
                            </button>
                            <?php endif ?>

                            <a href="<?= $contest->game_url ?>" target="_blank">
                                <button type="button" class="btn btn-sm blue">
                                    <strong> <i class="fa fa-external-link" aria-hidden="true"></i> PARTICIPER</strong>
                                </button>
                            </a>
                        </div>

                    </td>
                </tr>
                </tbody>
            </table>

        </div>

        <div class="post" id="post-<?= $contest->id?>"></div>

        <?php endforeach ?>
        <div class="row">
            <div class="pull-right">
                <ul class="pagination pagination-large">
                    <?php
                echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
                    'disabled','disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
                    'active','tag' => 'li','first' => 1));
                    echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
                    array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<!--remplacer les accents-->
<?php
                function removeAccents($words) {
                $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
                $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
                return str_replace($a, $b, $words);
                }
           ?>

<script>
    // afficher les commentaires
    $(document).on('click', '.bt-post', function () {
        var id = $(this).attr('id');
        if ($(this).hasClass('cacher')) {
            $('#' + id).removeClass('cacher').addClass('visibl');
            $('#post-' + id).load('<?= $this->Url->build(["controller" => "Posts","action" => "index", "prefix" => false]); ?>/index/' + id).show().css({
                "-webkit-animation": "fadeInDown 2s linear",
                "animation": "fadeInDown 2s linear",
                "border": "1px solid black"
            });

        }
        else {
            $('#' + id).removeClass('visibl').addClass('cacher');
            $('#post-' + id).hide(1000).css({
                "-webkit-animation": "zoomOutUp 1s linear",
                "animation": "zoomOutUp 1s linear"
            });
        }
    });

    // effet sur le menu
    $(document).on('click', '.form li', function () {
        $('li').removeClass('selected');
        $(this).addClass('selected');
    });

    $(document).ready(function () {
        var id = '<?= $id ?>';
        $('#li-' + id).addClass('selected');
        if (id.length === 0) {
            $('#li-tous').addClass('selected');
        }
    });

    // marquer comme deja joué
    $(document).on('click', '.markers', function () {
        var contest_id = $(this).attr('id').substring(7);
        if ($(this).find('i').hasClass('fa-check')) {
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Users","action" => "addmark", "prefix" => false]); ?>',
                data: 'id=' + contest_id,
                error: function (html) {
                    alert(html);
                }
            });
            $('.deja-' + contest_id).removeClass('hidden');
            $(this).find('i').removeClass('fa-check').addClass('fa-times');
        }
        else {
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Users","action" => "removemark", "prefix" => false]); ?>',
                data: 'id=' + contest_id,
                error: function (html) {
                    alert(html);
                }
            });
            $('.deja-' + contest_id).addClass('hidden');
            $(this).find('i').removeClass('fa-times').addClass('fa-check');
        }
        return false;
    });

    // favoris
    $(document).on('click', '.favs', function () {
        var c_id = $(this).attr('id').substring(4);
        if ($(this).find('i').hasClass('fa-heart')) {
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Users","action" => "addfav", "prefix" => false]); ?>',
                data: 'id=' + c_id,
                error: function (html) {
                    alert(html);
                }
            });
            $('.enfav-' + c_id).removeClass('hidden');
            $(this).find('i').removeClass('fa-heart').addClass('fa-heartbeat');
        }
        else {
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Users","action" => "removefav", "prefix" => false]); ?>',
                data: 'id=' + c_id,
                error: function (html) {
                    alert(html);
                }
            });
            $('.enfav-' + c_id).addClass('hidden');
            $(this).find('i').removeClass('fa-heartbeat').addClass('fa-heart');
        }
        return false;
    });

    // ouvrir modal signaler
    $(document).on('click', '.btmodal', function () {
        var a_id = $(this).attr('id').substring(6);
        var title = $(this).closest('th').find('.nom').html();
        $('#gettitle').val(title);
        $('#id').val(a_id);
        return false;
    });

    // envoyer une alerte
    $(document).on('click', '#send-alert', function () {
        var id = $('#id').val();
        var select = $('#sel1 option:selected');
        var text = select.text() + ': ' + $('#textarea').val();
        if (select.val() == 0) {
            $('#alert-error').html('<div class="alert alert-danger">Veuillez choisir une valeur svp, merci.</div>')
                    .fadeTo(2000, 500).slideUp(500, function () {
                $(this).slideUp(500);
            });
            return false;
        }
        else {
            $.ajax({
                type: 'post',
                url: '<?= $this->Url->build(["controller" => "Posts","action" => "alert", "prefix" => false]); ?>',
                data: 'id=' + id + '&text=' + text,
                success: function () {
                    $('#alert').modal('hide');
                    $('#alertetat-' + id).html('<div class="alert alert-success">Votre requête a été envoyé, merci.</div>')
                            .fadeTo(2000, 500).slideUp(500, function () {
                        $(this).slideUp(500);
                    });
                }
            });
        }
    });


    // voter
    $(document).on('click', '.plus', function () {
        var vote_id = $(this).attr('id').substring(6);
        var result = 'p';
        var update = parseInt($('.pourcentid' + vote_id).text()) + 1;
        var getprogress = $('.progress-' + vote_id);
        var progress = getprogress.attr('style').replace(/[^0-9]/g, '');
        var updatebar = parseInt(progress) + 2;
        getprogress.css("width", updatebar + '%');
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Users","action" => "addvote", "prefix" => false]); ?>',
            data: 'id=' + vote_id + '&result=' + result,
            success: function () {
                $('.pourcentid' + vote_id).text(update);
                $('#votep-' + vote_id).attr("disabled", true);
                $('#votem-' + vote_id).css("background-color", "grey").attr("disabled", true);
            }
        });
    });

    $(document).on('click', '.minus', function () {
        var vote_id = $(this).attr('id').substring(6);
        var result = 'm';
        var update = parseInt($('.pourcentid' + vote_id).text()) - 1;
        var getprogress = $('.progress-' + vote_id);
        var progress = getprogress.attr('style').replace(/[^0-9]/g, '');
        var updatebar = parseInt(progress) - 2;
        getprogress.css("width", updatebar + '%');
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Users","action" => "addvote", "prefix" => false]); ?>',
            data: 'id=' + vote_id + '&result=' + result,
            success: function () {
                $('.pourcentid' + vote_id).text(update);
                $('#votep-' + vote_id).css("background-color", "grey").attr("disabled", true);
                $('#votem-' + vote_id).attr("disabled", true);
            }
        });
    });


</script>

