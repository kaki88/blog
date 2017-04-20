

<div class="col-md-9 voffset2 pull-right">

        <div class="panel panel-default ">
            <div class="panel-heading panelhome panellast">Bienvenue sur la shoutbox, discutez librement de tout et de rien dans la bonne humeur.</div>
            <div class="panel-body">

<form class="form-inline">
    <div class="form-group tapchat">
        <input id="msg" type="text" class="form-control " name="message" placeholder="Tappez votre message ici">
    </div>
    <div class="form-group">
    <button id="sendmsg" class="btn btn-success center-block ">Envoyer</button>
</div>
    <div class="form-group">
        <div id="clearmsg" class="btn btn-danger center-block ">Effacer</div>
    </div>
    <div class="form-group">
        <div id="emoticon" class="btn btn-primary center-block ">Emoticones</div>
    </div>
    <div id="listsmilies">

    </div>
</form>

<div id="messages">
    <?php foreach ($messages as $message) :?>
    <?php $imgava = $message->user->avatar ?>
    <?php if ($imgava): ?>
    <?= $this->Html->image("../uploads/avatars/$imgava" , ['class' => 'chatimg'])?>
    <?php endif ?>
    <?php if (empty($imgava)): ?>
    <img src="<?= $this->Url->image('no-avatar.png') ?>" class="chatimg">
    <?php endif ?>
    <?php if ($message->created->isToday()): ?>
    [Aujourd'hui <?= $message->created->i18nformat('HH:mm') ?>]
    <?php elseif ($message->created->isYesterday()): ?>
    [Hier <?= $message->created->i18nformat('HH:mm') ?>]
    <?php else : ?>
    [<?= $message->created ?>]
    <?php endif ?>
    <?= $message->user->login ?> : <span id="chat<?= $message->id ?>"> <?= parseString($this->Text->autoLinkUrls($message->message)); ?></span>
    <br/>
    <?php endforeach ?>
</div>
            </div>
        </div>

</div>

<?php
function parseString($string ) {
$my_smilies = array(
':win' => '<img src="img/smilies/win.png" class="smilies" />',
':smile' => '<img src="img/smilies/smile.png" class="smilies" />',
':270c' => '<img src="img/smilies/270c.png" class="smilies" />',
':1f61c' => '<img src="img/smilies/1f61c.png" class="smilies" />',
':1f634' => '<img src="img/smilies/1f634.png" class="smilies" />',
':1f622' => '<img src="img/smilies/1f622.png" class="smilies" />',
':1f628' => '<img src="img/smilies/1f628.png" class="smilies" />',
':1f621' => '<img src="img/smilies/1f621.png" class="smilies" />',

);
return str_replace( array_keys($my_smilies), array_values($my_smilies), $string);
}
?>

<script>
    $('#sendmsg').click(function(e){
        e.preventDefault();
        var message = encodeURIComponent( $('#msg').val() );
        if(message != ""){
            $.ajax({
                url: '/',
                type : "POST",
                data : "message=" + message
            });
            $('#msg').val('');
        }
    });

    $('#clearmsg').click(function(e){
        e.preventDefault();
        $('#msg').val('');
    });


    $('#emoticon').click(function(e){
        e.preventDefault();
        $("#listsmilies").load('<?= $this->Url->build(["controller" => "Users","action" => "smilies", "prefix" => false]); ?>');
    });

    function getico(element) {
        var icoid = element.id;
        var mess = $('#msg').val();
        $('#msg').val(mess + ' :' +  icoid + ' ');
    }

    function charger(){
        setTimeout( function(){
            var premierID = $('#messages span:first').attr('id').substring(4);
            $.ajax({
                url: '<?= $this->Url->build(["controller" => "Users","action" => "getlastchat", "prefix" => false]); ?>',
                type : "POST",
                data : "lastid=" + premierID ,
                success : function(html){
                    if (html.length >2){
                    $('#messages').prepend(html);
                    }
                }
            });
            charger();
        }, 2500);
    }
    charger();
</script>