<?php
$server = $_SERVER;
ksort($server);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><title>environment-php</title>
  <style>
    body { font-family: system-ui, sans-serif; max-width: 980px; margin: 2rem auto; padding: 0 1rem; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #ddd; padding: 8px; vertical-align: top; }
    th { background: #f5f5f5; text-align: left; }
    code { white-space: pre-wrap; }
  </style>
</head>
<body>
  <h1>Environment (PHP)</h1>
  <table>
    <thead><tr><th>Key</th><th>Value</th></tr></thead>
    <tbody>
      <?php foreach ($server as $k => $v): ?>
        <tr>
          <td><?= htmlspecialchars($k) ?></td>
          <td><code><?= htmlspecialchars(is_string($v) ? $v : json_encode($v)) ?></code></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
