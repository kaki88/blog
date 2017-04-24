

<div class="col-md-9 voffset2 pull-right">

        <div class="panel panel-default ">
            <div class="panel-heading panelhome panellast">Bienvenue sur la shoutbox, discutez librement de tout et de rien dans la bonne humeur.</div>
            <div class="panel-body">

                <div id="listsmilies"> </div>
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

</form>

<div id="messages">
    <table class="table table-striped">
        <tbody>
    <?php foreach ($messages as $message) :?>
    <tr>
        <td width="25px" style="padding: 0!important;">
    <?php $imgava = $message->user->avatar ?>
    <?php if ($imgava): ?>
    <?= $this->Html->image("../uploads/avatars/$imgava" , ['class' => 'chatimg'])?>
    <?php endif ?>
    <?php if (empty($imgava)): ?>
    <img src="<?= $this->Url->image('no-avatar.png') ?>" class="chatimg">
    <?php endif ?>
        </td>

        <td>
    <b><?= $message->user->login ?></b> : <span
    <?php if ($message->user->id == $this->request->session()->read('Auth.User.id') || $this->request->session()->read('Auth.User.role_id') == 1 ) : ?>
            ondblclick="edit(this)"
       <?php endif ?>
 id="chat<?= $message->id ?>"><?= parseString($this->Text->autoLinkUrls($message->message)); ?></span>
        </td>

        <td width="100px">
            <i>
            <?php if ($message->created->isToday()): ?>
            <?= $message->created->i18nformat('HH:mm') ?>
            <?php elseif ($message->created->isYesterday()): ?>
            Hier <?= $message->created->i18nformat('HH:mm') ?>
            <?php else : ?>
            <?= $message->created->i18nformat('dd MMM HH:mm') ?>
            <?php endif ?>
            </i>
        </td>

    </tr>
    <?php endforeach ?>
        </tbody>
    </table>
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
':1f382' => '<img src="img/smilies/1f382.png" class="smilies" />',
':1f37e' => '<img src="img/smilies/1f37e.png" class="smilies" />',
':1f3c6' => '<img src="img/smilies/1f3c6.png" class="smilies" />',
':1f387' => '<img src="img/smilies/1f387.png" class="smilies" />',
':1f386' => '<img src="img/smilies/1f386.png" class="smilies" />',
':1f381' => '<img src="img/smilies/1f381.png" class="smilies" />',
':1f389' => '<img src="img/smilies/1f389.png" class="smilies" />',
':26a0' => '<img src="img/smilies/26a0.png" class="smilies" />',


);
return str_replace( array_keys($my_smilies), array_values($my_smilies), $string);
}
?>

<script>
    var addoredit = 0;
    var editid = 0;

    $('#sendmsg').click(function(e){
        e.preventDefault();
        var message = encodeURIComponent( $('#msg').val() );
        if(message != "" ){
            $.ajax({
                url: '/',
                type : "POST",
                data : "message=" + message +"&type=" + addoredit +"&id=" + editid,
                success: function() {
                        $('#chat' + editid).text(message);
                    editid = 0 ;
                }
            });
            $('#msg').val('');
        }
        if (addoredit == 1) {
            addoredit--;
        };
    });

    $('#clearmsg').click(function(e){
        e.preventDefault();
        $('#msg').val('');
    });


    $('#emoticon').click(function(e){
        e.preventDefault();
        $("#listsmilies").load('<?= $this->Url->build(["controller" => "Users","action" => "smilies", "prefix" => false]); ?>').css({
            "-webkit-animation": "fadeInDown 2s linear",
            "animation": "fadeInDown 2s linear"
        });

    });

    function getico(element) {
        var icoid = element.id;
        var mess = $('#msg').val();
        $('#msg').val(mess + ' :' +  icoid + ' ');
    }

    function edit(element) {
        editid = element.id.substring(4);
        if (addoredit == 0) {
            addoredit++;
        };
        $('#msg').val(element.innerHTML);
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
                    $('#messages tbody:first').prepend(html).scrollTop( 0 );
                    }
                }
            });
            charger();
        }, 2500);
    }
    charger();
</script>