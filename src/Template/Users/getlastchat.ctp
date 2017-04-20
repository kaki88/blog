<?php if ($responses) : ?>
<?php foreach ($responses as $response) : ?>
<?php $imgava = $response->user->avatar ?>
<?= $this->Html->image("../uploads/avatars/$imgava", ['class' => 'chatimg']) ?>
[Aujourd'hui <?= $response->created->i18nformat('HH:mm') ?>]
<?= $response->user->login ?> : <span id="chat<?= $response->id ?>"> <?= parseString($this->Text->autoLinkUrls($response->message)) ?></span><br/>
<?php endforeach ?>
<?php endif ?>
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