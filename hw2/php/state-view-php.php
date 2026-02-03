<?php
$raw = $_COOKIE["hw2_state_php"] ?? "";
$data = $raw ? json_decode($raw, true) : null;
?>
<!doctype html><html><head><meta charset="utf-8"><title>state-view-php</title></head>
<body>
<h1>State View (PHP)</h1>
<?php if (is_array($data)): ?>
  <p><strong>Name:</strong> <?= htmlspecialchars($data["name"] ?? "") ?></p>
  <p><strong>Favorite food:</strong> <?= htmlspecialchars($data["favorite"] ?? "") ?></p>
<?php else: ?>
  <p>No saved state yet.</p>
<?php endif; ?>
<p>
  <a href="/hw2/php/state-save-php.php">Back</a> |
  <a href="/hw2/php/state-clear-php.php">Clear</a>
</p>
</body></html>
