<?= $this->Html->css('animate.css') ?>
<div class="row">
    <div class="col-md-9 pull-right alltable">
<?php foreach ($contests as $contest) :?>


        <div class=" spacetbl">
                <table class="table tbl-prin table-curved">


                    <thead>
                    <tr class="type">
                        <th class="text-center "><?= $contest->category->type ?></th>
                        <th colspan="2" >
                            <span class="pull-left nom"><?= $contest->name ?></span>

                                 <span class="pull-right">
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
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-times" aria-hidden="true"></i></i></a></li>
                                    <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i></a></li>

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
                    $row =3;
                    if ($contest->restrictions) {$row++;};
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
                    <tr>
                        <td><span class="befprize">Zone(s) éligible(s) </span></td>
                        <td><span class="befdescr">
                            <?php foreach ($contest->zones as $zone) : ?>
                            <?= $zone->place ?>
                            <?php endforeach ?>
                        </span></td>
                    </tr>
                    <?php if ($contest->restrictions) : ?>
                    <tr>
                        <td><span class="befprize">Restriction(s) </span></td>
                        <td><span class="befdescr">
                            <?php foreach ($contest->restrictions as $restriction) : ?>
                            <?= $restriction->sort ?>
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


                        <td class="minimenu text-center" >
                             <span class=" clos hidden-xs">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                                 <?= $contest->deadline->i18nformat('dd MMMM YYYY') ?>
                             </span>
  <span class=" clos hidden-sm hidden-md hidden-lg">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
      <?= $contest->deadline->i18nformat('dd/MM/YY') ?>
                             </span>
</td>



                        <td colspan="2" class="pubby" >

                            <div class="pull-left margpub">

                                <span class="publierle hidden-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  par <?= $contest->user->login ?> le <?= $contest->created->i18nformat('dd MMM ') ?>
                                à   <?= $contest->created->i18nformat('HH:mm') ?></span>
                                    <span class="publierle  hidden-sm hidden-md hidden-lg"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <?= $contest->user->login ?> le <?= $contest->created->i18nformat('dd/MM ') ?></span>

                                <?php if ($contest->on_facebook) : ?>
                                <?= $this->Html->image('facebook.jpg', ['class' => 'admin-ico-freq']) ?>
                                <?php endif ?>
                            </div>
                            <div class="pull-right">
                                <?php $ico = $contest->frequency->icon_url ?>
                                <?= $this->Html->image("../uploads/icons/$ico" , ['class' => 'admin-ico-freq'])?>
                            <?php if ($contest->rule_url) : ?>
                            <a href="<?= $contest->rule_url ?>" target="_blank">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </button>
                            </a>
                            <?php endif ?>


                                <button type="button" class="btn btn-sm btn-success bt-post cacher" id="<?= $contest->id?>" >
                                    <i class="fa fa-comments" aria-hidden="true"></i> <span id="count-<?= $contest->id?>">(<?= count($contest->posts) ?>)</span>
                                </button>


                            <a href="<?= $contest->game_url ?>" target="_blank">
                                <button type="button" class="btn btn-sm btn-primary">
                                    <i class="fa fa-external-link" aria-hidden="true"></i> Participer
                                </button>
                            </a>
                            </div>

                        </td>
                    </tr>
                    </tbody>
                </table>
<div id="post-<?= $contest->id?>"></div>
        </div>



<?php endforeach ?>
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
        <?php
                function removeAccents($words) {
                $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
                $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
                return str_replace($a, $b, $words);
                }
           ?>

<script>
    $(document).on('click', '.bt-post', function () {
            var id = $(this).attr('id');
        var counter = $('#count-'+id).text();
        if ( counter !== '(0)' ) {
        if ($(this).hasClass('cacher')) {
            $('#'+id).removeClass('cacher').addClass('visibl');
            $('#post-' + id).load('/posts/index/'+id).show().css({
                "-webkit-animation": "fadeInDown 2s linear",
                "animation": "fadeInDown 2s linear"
            });

        }
        else  {
            $('#'+id).removeClass('visibl').addClass('cacher');
            $('#post-'+id).hide(1000).css({
                "-webkit-animation": "zoomOutUp 1s linear",
                "animation": "zoomOutUp 1s linear"
            });
        }
        }
        });
</script>

