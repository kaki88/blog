<?php $this->assign('title', 'Accueil'); ?>
<?= $this->Html->css('animate.css') ?>





<div class="wrapper">

<div class="row">
    <div class="col-md-3 menuspace hidden-xs hidden-sm">

        <?php $cell = $this->cell('Login');
        echo $cell; ?>

        <div class="">
            <a href="/beta/deposer-un-jeu" class="btn btn-success btn-block paneladd"> deposer un jeu
                <span class="addsquare"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
            </a>

        </div>


        </div>
    <?php $cellchat = $this->cell('Chat');
    echo $cellchat; ?>
    <!--________________________________________derniers lots remportés-->
    <div class="col-md-9 voffset2 pull-right">
        <div class="panel panel-default">
            <div class="panel-heading panelhome panellast">Les derniers lots remportés</div>
            <div class="panel-body panelcontentwin">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Par</th>
                        <th>Dotation(s)</th>
                        <th>Valeur</th>
                        <th>Organisateur</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lastwins as $lastwin): ?>
                    <tr>
                        <?php if ($lastwin->date->isToday()): ?>
                        <td class="">Aujourd'hui à <?= $lastwin->date->i18nformat('HH:mm') ?></td>
                        <?php elseif ($lastwin->date->isYesterday()): ?>
                        <td class="">Hier  à <?= $lastwin->date->i18nformat('HH:mm') ?></td>
                        <?php else : ?>
                        <td class=""><?= $lastwin->date->i18nformat('dd MMM') ?>  à <?= $lastwin->date->i18nformat('HH:mm') ?></td>
                        <?php endif ?>
                        <td class=""><?= $lastwin->user->login ?> </td>
                        <td class=""><?= $lastwin->description ?></td>
                        <td class=""><?= $lastwin->price ?> €</td>
                        <td class="">
                            <a href="<?= $this->Url->build(['controller' => 'Contests', 'action' => 'gameview',$lastwin->contest->id,
                            strtolower(str_replace(' ', '-', removeAccents($lastwin->contest->name))),'prefix' => false]); ?>"
                               target="_blank">   <?= $lastwin->contest->name ?></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--________________________________________derniers jeux postés-->
<div class="col-md-9 pull-right voffset2">
    <div class="panel panel-default">
        <div class="panel-heading panelhome panellast">Les derniers jeux déposés
            <div class="pull-right">
             Vue:
                <select class="selectpicker">
                    <option>Vignette</option>
                    <option>Classique</option>
                </select>

            </div>
        </div>
        <div class="panel-body panelcontentwin">
            <table class="table  hidden" id="lasttable">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Organisateur</th>
                    <th>Dotation(s)</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($lastcontests as $lastcontest): ?>
                <tr>
                    <?php if ($lastcontest->created->isToday()): ?>
                    <td class="">Aujourd'hui à <?= $lastcontest->created->i18nformat('HH:mm') ?></td>
                    <?php elseif ($lastcontest->created->isYesterday()): ?>
                    <td class="">Hier  à <?= $lastcontest->created->i18nformat('HH:mm') ?></td>
                    <?php else : ?>
                    <td class=""><?= $lastcontest->created->i18nformat('dd MMM') ?>  à <?= $lastcontest->created->i18nformat('HH:mm') ?></td>
                    <?php endif ?>
                    <td class=""><?= $lastcontest->category->code ?> </td>
                    <td class="">
                        <a href="<?= $this->Url->build(['controller' => 'Contests', 'action' => 'gameview',$lastcontest->id,
                            strtolower(str_replace(' ', '-', removeAccents($lastcontest->name))),'prefix' => false]); ?>"
                           target="_blank">   <?= $lastcontest->name ?></a>
                    </td>
                    <td class=""><?= substr($lastcontest->prize, 0, 45); ?>
                        <?php if(strlen($lastcontest->prize) > 45): ?>
                        ...
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>

            <div class="col-xs-12 section " id="lastvign">
                <ul id="filters" class="clearfix">
                    <li><span class="filter active"
                              data-filter=".IG, .TAS, .SCORE, .VOTE, .JURY, .TWITTER, .SMS, .MAGASIN, .COURRIER">TOUS</span>
                    </li>
                    <li><span class="filter" data-filter=".IG">IG</span></li>
                    <li><span class="filter" data-filter=".TAS">TAS</span></li>
                    <li><span class="filter" data-filter=".SCORE">SCORE</span></li>
                    <li><span class="filter" data-filter=".VOTE">VOTE</span></li>
                    <li><span class="filter" data-filter=".JURY">JURY</span></li>
                    <li><span class="filter" data-filter=".TWITTER">TWITTER</span></li>
                    <li><span class="filter" data-filter=".SMS">SMS</span></li>
                    <li><span class="filter" data-filter=".MAGASIN">MAGASIN</span></li>
                    <li><span class="filter" data-filter=".COURRIER">COURRIER</span></li>
                </ul>
                <div id="portfoliolist" class="contain fix">

                    <?php foreach ($lastcontests as $lastcontest): ?>
                    <div class="portfolio portfolio-wrapper view view-first <?= $lastcontest->category->code ?>" data-cat="<?= $lastcontest->category->code ?>"
                         onclick='window.open("<?= $this->Url->build(['controller' => 'Contests', 'action' => 'gameview',$lastcontest->id,
                            strtolower(str_replace(' ', '-', removeAccents($lastcontest->name))),'prefix' => false]); ?>")'>
                    <div class="lastdate">
                        <?php if ($lastcontest->created->isToday()): ?>
                       Aujourd'hui à <?= $lastcontest->created->i18nformat('HH:mm') ?>
                        <?php elseif ($lastcontest->created->isYesterday()): ?>
                        Hier  à <?= $lastcontest->created->i18nformat('HH:mm') ?>
                        <?php else : ?>
                        <?= $lastcontest->created->i18nformat('dd MMM') ?>  à <?= $lastcontest->created->i18nformat('HH:mm') ?>
                        <?php endif ?>
                    </div>
                        <div class="vali">
                            <?= $this->Html->image("../uploads/img/$lastcontest->img_url" , ['class' => 'contimg'])?>
                        </div>
                    <div class="mask">
                        <h2><?= $lastcontest->name ?></h2>
                        <p><?= substr($lastcontest->prize, 0, 90) ?>
                            <?php if(strlen($lastcontest->prize) > 90): ?>
                            ...
                            <?php endif ?>
                        </p>
                    </div>
                    </div>
                    <?php endforeach ?>
                </div>
                <div class="col-md-12 center-block text-center ">
                    <div class=" pager-list "></div>
                </div>
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
    var divwin = $('.divplus');
    divwin.mouseenter (function(){
        $(this).css({
            'background-color' : '#f6ffff',
            'border-radius' : '5px',
            'cursor' : 'pointer'
        });
    });

    divwin.mouseleave (function(){
        $(this).css("background-color","#e5e5e5");
    });



//    boite de selection
    var selected_option = $('.selectpicker option:selected');
    $(".selectpicker").change(function(){

        if($(this).val() =="Classique")
        {
         $('#lasttable').removeClass('hidden');
            $('#lastvign').addClass('hidden');
        }
        else
        {
            $('#lasttable').addClass('hidden');
            $('#lastvign').removeClass('hidden');
        }
    });



</script>

