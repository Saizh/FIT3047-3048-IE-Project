<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" onclick="this.classList.add('hidden');" style="background-color:lightblue; position：absolute; text-align: center; "><?= $message ?> <?= h($params['classname']) ?> has been created. Class ID:  <?= h($params['classid']) ?></div>