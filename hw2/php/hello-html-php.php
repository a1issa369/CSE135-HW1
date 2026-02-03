<?php
date_default_timezone_set("UTC");
$team = ["Ahmed", "Rosario"];
$time = date("c");
$ip = $_SERVER["REMOTE_ADDR"] ?? "unknown";
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>hello-html-php</title></head>
<body>
  <h1>Hello from <?= htmlspecialchars(implode(", ", $team)) ?>!</h1>
  <ul>
    <li><strong>Language:</strong> PHP</li>
    <li><strong>Generated at:</strong> <?= htmlspecialchars($time) ?></li>
    <li><strong>Your IP:</strong> <?= htmlspecialchars($ip) ?></li>
  </ul>
</body>
</html>
