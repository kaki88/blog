<?php if ($this->request->session()->read('Auth.User.role_id') == 1) : ?>

<li><a id="ad-alert" href="<?= $this->Url->build(['controller' => 'Users','action' => 'alert' , 'prefix' => 'admin' ]); ?>">
    <i class="fa fa-bell-o" aria-hidden="true"></i> Alerte
    <span class="badge badge-danger" style="margin-top: -16px; margin-left: -5px"><?= $alert ?></span></a></li>

<?php endif?>


<script>
$( "#ad-alert" ).click(function() {
    if ($('.badge-danger').text() == 0) {
        return false;
    }
});
</script>