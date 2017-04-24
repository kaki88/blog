<?php if ($responses) : ?>
<?php foreach ($responses as $response) : ?>
<tr>
    <td width="25px" style="padding: 0!important;">
        <?php $imgava = $response->user->avatar ?>
        <?php if ($imgava): ?>
        <?= $this->Html->image("../uploads/avatars/$imgava" , ['class' => 'chatimg'])?>
        <?php endif ?>
        <?php if (empty($imgava)): ?>
        <img src="<?= $this->Url->image('no-avatar.png') ?>" class="chatimg">
        <?php endif ?>
    </td>
    <td>
        <b><?= $response->user->login ?></b> : <span
        <?php if ($response->user->id == $this->request->session()->read('Auth.User.id') || $this->request->session()->read('Auth.User.role_id') == 1 ) : ?>
        ondblclick="edit(this)"
        <?php endif ?>
        id="chat<?= $response->id ?>"> <?= parseString($this->Text->autoLinkUrls($response->message)); ?></span>
    </td>      <td width="100px">
    <i>
        <?php if ($response->created->isToday()): ?>
        <?= $response->created->i18nformat('HH:mm') ?>
        <?php elseif ($response->created->isYesterday()): ?>
        Hier <?= $response->created->i18nformat('HH:mm') ?>
        <?php else : ?>
        <?= $response->created->i18nformat('dd MMM HH:mm') ?>
        <?php endif ?>
    </i>
</td>

</tr><?php endforeach ?>
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