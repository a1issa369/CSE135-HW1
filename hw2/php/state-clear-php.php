<?php
setcookie("hw2_state_php", "", [
  "expires" => time() - 3600,
  "path" => "/",
  "httponly" => true,
  "samesite" => "Lax"
]);
header("Location: /hw2/php/state-save-php.php");
exit;
