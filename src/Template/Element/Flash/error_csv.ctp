<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" onclick="this.classList.add('hidden');"style="background-color:lightblue; position：absolute; text-align: center; "><?= $message ?>: <?= h($params['first_name']) ?> <?= h($params['surname']) ?>, email: <?= h($params['email']) ?>.</div>