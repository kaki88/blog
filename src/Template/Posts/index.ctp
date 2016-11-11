


            <?php foreach ($posts as $post): ?>
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

            <?php endforeach; ?>

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