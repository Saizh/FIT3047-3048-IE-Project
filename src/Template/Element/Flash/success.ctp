<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" onclick="this.classList.add('hidden')" style="background-color:lightblue; position：absolute; text-align: center; "><?= $message ?></div>
