<?= $this->Html->css('animate.css') ?>
<div class="row">
    <div class="col-md-4 ">
        <div class="col-md-12 profil-head ">
            <div class="col-md-5">
                <?php if ($user->avatar): ?>
                <?= $this->Html->image("../uploads/avatars/$user->avatar" , ['class' => 'avatar-profil'])?>
                <?php endif ?>
                <?php if (empty($user->avatar)): ?>
                <img src="<?= $this->Url->image('no-avatar.png') ?>" class="avatar-profil">
                <?php endif ?>
            </div>

            <div class="col-md-7">
                <p class="pseudo"><?= h($user->login) ?></p>
                <p class="bold"><?= $user->role->groupname ?></p>
            </div>


            <div class="col-md-12 voffset2">
                <hr>
                <p class="bold"> Inscrit depuis le <?= $user->created->i18nformat('dd MMM YYYY') ?> </p>
                <?php if ($user->connected) : ?>
                <p class="bold"> Dernière connexion le <?= $user->connected->i18nformat('dd MMM YYYY à HH:mm') ?> </p>
                <?php else : ?>
                <p class="bold"> Aucune connexion  </p>
                <?php endif ?>
                <hr>

                       <?php if ($user->id == $uid || $ugp == 1) : ?>
                <button id="edit" class="btn btn-primary edit-profil"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editer le profil</button>
                <hr>
                <?php endif ?>

                <p class="bold"> Anniversaire: <?= $user->birthday->i18nformat('dd MMM YYYY') ?>  </p>
                <p class="bold"> Localisation: <?= $user->city->city ?>  </p>


            </div>

        </div>


    </div>


    <div class="col-md-8 ">
        <div class="row">
            <div class="col-md-12 profil-head ">
                <div class="list-inline">
                    <li  id="activ">  <span class="menuprofil activite"><i class="fa fa-comments-o" aria-hidden="true"></i> Activités</span></li>
                    <li id="liprofil">   <span class="menuprofil actprofil"><i class="fa fa-pencil" aria-hidden="true"></i> Profil</span></li>
                </div>

            </div>
        </div>
        <div  id="new"></div>
        <div  id="editload"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var id ='<?= $user->id ?>';

        $('#activ').click(function () {

            $('.actprofil').css({
                "border-bottom": "none",
                "color":" black"
            });

            $('.activite').css({
                "border-bottom": "5px solid #3498db",
                "color":" #3498db"
            });

            $('#editload').css({
                "-webkit-animation": "fadeOutDown 1s linear",
                "animation": "fadeOutDown 1s linear"
            });
            setTimeout(
                    function()
                    {
            $('#editload').empty();
                    },1000);


            setTimeout(
                    function()
                    {
            $('#new').load('<?= $this->Url->build(["controller" => "Users","action" => "lastcom", "prefix" => false]); ?>/'+id).css({
                "-webkit-animation": "fadeInRight 2s linear",
                "animation": "fadeInRight 2s linear"
            });
                    },1000);
            });
$('#edit,#liprofil').click(function () {
$('#lastpost').css({
    "-webkit-animation": "fadeOutRight 1s linear",
    "animation": "fadeOutRight 1s linear"
});


    setTimeout(
            function()
            {
                $('#new').empty();
                $('#editload').load('<?= $this->Url->build(["controller" => "Users","action" => "edit", "prefix" => false]); ?>/'+id).css({
                    "-webkit-animation": "fadeInUp 2s linear",
                    "animation": "fadeInUp 2s linear"
                });

            },900);

    $('.activite').css({
        "border-bottom": "none",
        "color":" black"
    });

    $('.actprofil').css({
        "border-bottom": "5px solid #3498db",
        "color":" #3498db"
    });

});

        //charge les derniers posts
        $('#new').load('<?= $this->Url->build(["controller" => "Users","action" => "lastcom", "prefix" => false]); ?>/'+id);

    });



</script>
