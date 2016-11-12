
<div class="new"></div>

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

<div class="row voffset2 hidden postcom<?= $id ?>">
    <div class="col-md-12">
        <?php echo $this->Form->input('message',['placeholder'=>'5 caractères minimum, pas d\'écriture SMS, merci :)',
        'label'=>'Votre message:','type'=>'textarea','class'=>'message'.$id]); ?>
        <div class="error<?= $id ?>"></div>


        <?= $this->Form->button(' <i class="fa fa-check" aria-hidden="true"></i> Poster le commentaire',
        ['class' => 'btn btn-sm btn-success btpost', 'escape'=> false]) ?>

    </div>
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


    <div class="pull-right comfer">
        <button type="button" class="btn btn-sm btn-primary  open-com" id="<?= $id ?>" >
            <i class="fa fa-pencil" aria-hidden="true"></i> Commenter </button>

        <button type="button" class="btn btn-sm btn-danger bt-post visibl close-com" id="<?= $id ?>" >
            <i class="fa fa-times" aria-hidden="true"></i> Fermer</button>

    </div>
    </div>
</div>



            <script>
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
                            $('#post-' + contest_id).load('/posts/index/'+contest_id).unbind();
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

// pagination ajax
                $(".pagination a").bind('click',function(){
                    var id = '<?= $id ?>';
                    var value = $(this).attr("href");
                            $('#post-' + id).load(value).unbind();
                    return false;
                });

            </script>