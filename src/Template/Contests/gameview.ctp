
<?php $this->assign('title', 'Jeu Concours '.$contest->name); ?>
<?php $this->assign('meta', '
        <meta property="og:image" content="http://olivierp.simplon-epinal.tk/blog/uploads/img/'.$contest->img_url.'" />
        <meta property="og:title" content="Jeu Concours '.$contest->name.'" />
        <meta property="og:description" content="'.$contest->prize.'" />
        <meta property="og:url" content="http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']  .  '" />
        <meta property="og:app_id" content="420776134976881" />
        ') ?>


<div class="row">
<!--___________________________________________________________________profil-->

<div class="col-md-3 ">
    <div class="col-md-12 profil-head ">
        <div style="float: left">

            <?php if ($contest->user->avatar): ?>
            <?= $this->Html->image("../uploads/avatars/".$contest->user->avatar , ['class' => 'avatar-profil'])?>
            <?php endif ?>
            <?php if (empty($contest->user->avatar)): ?>
            <img src="<?= $this->Url->image('no-avatar.png') ?>" class="avatar-profil">
            <?php endif ?>
        </div>
        <div style="float: right">
            <p class="pseudo"><?= h($contest->user->login) ?></p>
            <p class="bold"><?= $contest->user->role->groupname ?></p>

        </div>


    </div>
</div>


        <div class="col-md-9">

<div class="  tbl-prin ">
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
 <!--<a href="http://www.facebook.com/share.php?u=http://olivierp.simplon-epinal.tk/blog/" target="_blank" title="">-->
     <!--test-->
 <!--</a>-->



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


            <div class="col-md-12 voffset1 post">
                <div class="post" id="post-<?= $contest->id?>"></div>
            <?php foreach ($posts as $post): ?>
            <div class="row comspace">


                    <?php if ($avatar = $post->user->avatar) : ?>
                    <?php $avatar = $post->user->avatar ?>
                    <?= $this->Html->image("../uploads/avatars/$avatar" , ['class' => 'avatar-com ' ])?>
                    <?php else : ?>
                    <?= $this->Html->image("no-avatar.png" , ['class' => 'avatar-com ' ])?>
                    <?php endif ?>

                    <div class="titlecom">
                        <?= $post->user->login ?> le <?= $post->created->i18nformat('dd MMM YYYY') ?>
                        à <?= $post->created->i18nformat('HH:mm') ?>
                    </div>


                    <div class="comments">
                        <?= $post->message ?>
                    </div>
                </div>


            <?php endforeach; ?>
            </div>
                <div class="row ">
                    <div class="col-md-12 ">
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


                        <div class="pull-right comfer" style="margin-top: 2px">
                            <button type="button" class="btn btn-sm btn-primary  open-com" id="<?= $id ?>" >
                                <i class="fa fa-pencil" aria-hidden="true"></i> Commenter </button>


                        </div>
                    </div>
                </div>

                <div class="col-md-12 voffset2 hidden postcom<?= $id ?>">
                    <?php echo $this->Form->input('message',['placeholder'=>'5 caractères minimum, pas d\'écriture SMS, merci :)',
                            'label'=>'Votre message:','type'=>'textarea','class'=>'message'.$id]); ?>
                    <div class="error<?= $id ?>"></div>


                    <?= $this->Form->button(' <i class="fa fa-check" aria-hidden="true"></i> Poster le commentaire',
                    ['class' => 'btn btn-sm btn-success btpost', 'escape'=> false]) ?>

                </div>



        </div>

</div>

<script>


// marquer comme deja joué
$(document).on('click', '.markers', function () {
    var contest_id = $(this).attr('id').substring(7);
    if ($(this).find('i').hasClass('fa-check')){
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Users","action" => "addmark", "prefix" => false]); ?>',
            data: 'id=' + contest_id,
            error: function(html){
                alert(html);
            }
        });
        $('.deja-'+contest_id).removeClass('hidden');
        $(this).find('i').removeClass('fa-check').addClass('fa-times');
    }
    else{
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Users","action" => "removemark", "prefix" => false]); ?>',
            data: 'id=' + contest_id,
            error: function(html){
                alert(html);
            }
        });
        $('.deja-'+contest_id).addClass('hidden');
        $(this).find('i').removeClass('fa-times').addClass('fa-check');
    }
    return false;
});

// favoris
$(document).on('click', '.favs', function () {
    var c_id = $(this).attr('id').substring(4);
    if ($(this).find('i').hasClass('fa-heart')){
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Users","action" => "addfav", "prefix" => false]); ?>',
            data: 'id=' + c_id,
            error: function(html){
                alert(html);
            }
        });
        $('.enfav-'+c_id).removeClass('hidden');
        $(this).find('i').removeClass('fa-heart').addClass('fa-heartbeat');
    }
    else{
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Users","action" => "removefav", "prefix" => false]); ?>',
            data: 'id=' + c_id,
            error: function(html){
                alert(html);
            }
        });
        $('.enfav-'+c_id).addClass('hidden');
        $(this).find('i').removeClass('fa-heartbeat').addClass('fa-heart');
    }
    return false;
});

// signaler
$(document).on('click', '.btmodal', function () {
    var a_id = $(this).attr('id').substring(6);
    var title = $(this).closest('tr th .nom').text();
    $('#gettitle').text(title);
    return false;
});

//deposer un commentaire
$( ".btpost" ).click(function() {
    var contest_id = '<?= $id ?>';
    var message = $('.message'+contest_id).val();
    if (message.length < 5){
        $('.error'+contest_id).html('<div class="alert alert-danger">Votre message doit contenir au moins 5 caractères !</div>')
        $(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
            $(this).slideUp(500);
        });
    }
    else{
        $.ajax({
            type: 'post',
            url: '<?= $this->Url->build(["controller" => "Posts","action" => "add", "prefix" => false]); ?>',
            data: 'id=' + contest_id +'&message='+message,
            success: function(){
                location.reload();
            }
        });
    }
});

//aficher le formulaire pour deposer un commentaire
$(document).on('click', '.open-com', function () {
    var openid = $(this).attr('id');
    $(this).hide();
    $('.postcom'+openid).removeClass('hidden');
});
</script>
