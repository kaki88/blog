<div class="row ">
    <div class="col-md-12 voffset1">

        <?php $avatar = $post->user->avatar ?>
        <?= $this->Html->image("../uploads/avatars/$avatar" , ['class' => 'avatar-com ' ])?>

        <div class="titlecom">
            <?= $post->user->login ?> le <?= $post->created->i18nformat('dd MMM YYYY') ?>
            à <?= $post->created->i18nformat('HH:mm') ?>
        </div>


        <div class="comments">
            <?= $post->message ?>
        </div>




    </div>
</div>