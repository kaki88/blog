<div class="row"  id="lastpost">
    <div class="col-md-12 profil-head">

        <?php if (!empty($posts)): ?>


        <?php foreach ($posts as $post): ?>
        <div class="userpostcontestall">
            <div class="userpostcontest">
                <span><?= $post->contest->name ?> </span>
                <span class="pull-right" style="font-size: 12px">le <?= h($post->created) ?></span>
            </div>
            <div class="userpostmessage">
                <?= h($post->message) ?>
            </div>
        </div>
        <?php endforeach; ?>

        <?php endif; ?>

        <div class="pagination left margepag">
            <?php
                    echo $this->Paginator->prev(__('Prec'), array('tag' => 'li'), null, array('tag' => 'li','class' =>
                    'disabled','disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' =>
                    'active','tag' => 'li','first' => 1));
                    echo $this->Paginator->next(__('Suiv'), array('tag' => 'li','currentClass' => 'disabled'), null,
                    array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    ?>
        </div>
        <br><br>
    </div>

</div>

<script>
// pagination ajax
$(".pagination a").bind('click',function(){
    var id ='<?= $id ?>';
    var value = $(this).attr("href");
    $('#new').load(value).unbind();
    return false;
});

</script>