<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success" onclick="this.classList.add('hidden')"><?= $message ?></div>

<script>
$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(this).slideUp(500);
});
</script>