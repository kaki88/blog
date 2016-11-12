<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');"><?= $message ?></div>

<script>
$(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
    $(this).slideUp(500);
});
</script>



