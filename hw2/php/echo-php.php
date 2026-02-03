<?php
date_default_timezone_set("UTC");

function raw_body(): string {
  $raw = file_get_contents("php://input");
  return is_string($raw) ? $raw : "";
}

function parse_data(string $method, string $ctype, string $raw): array {
  $ctype = strtolower(trim(explode(";", $ctype)[0]));

  if ($method === "GET") return $_GET ?? [];

  if ($method === "POST" && ($ctype === "application/x-www-form-urlencoded" || $ctype === "multipart/form-data")) {
    return $_POST ?? [];
  }

  if ($ctype === "application/json") {
    $d = json_decode($raw, true);
    return is_array($d) ? $d : ["_error" => "invalid json", "_raw" => $raw];
  }

  if ($ctype === "application/x-www-form-urlencoded") {
    $arr = [];
    parse_str($raw, $arr);
    return $arr;
  }

  return ["_raw" => $raw, "_content_type" => $ctype];
}

$method = $_SERVER["REQUEST_METHOD"] ?? "UNKNOWN";
$hostname = gethostname() ?: "unknown";
$time = date("c");
$ip = $_SERVER["REMOTE_ADDR"] ?? "unknown";
$userAgent = $_SERVER["HTTP_USER_AGENT"] ?? "unknown";
$contentType = $_SERVER["CONTENT_TYPE"] ?? ($_SERVER["HTTP_CONTENT_TYPE"] ?? "");

$raw = raw_body();
$data = parse_data($method, $contentType, $raw);
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>echo-php</title>
<style>body{font-family:system-ui,sans-serif;max-width:980px;margin:2rem auto;padding:0 1rem}pre{background:#f5f5f5;padding:1rem;overflow:auto}</style>
</head>
<body>
<h1>Echo (PHP)</h1>
<ul>
  <li><strong>Hostname:</strong> <?= htmlspecialchars($hostname) ?></li>
  <li><strong>Method:</strong> <?= htmlspecialchars($method) ?></li>
  <li><strong>Time:</strong> <?= htmlspecialchars($time) ?></li>
  <li><strong>IP:</strong> <?= htmlspecialchars($ip) ?></li>
  <li><strong>User-Agent:</strong> <?= htmlspecialchars($userAgent) ?></li>
  <li><strong>Content-Type:</strong> <?= htmlspecialchars($contentType) ?></li>
</ul>

<h2>Data received</h2>
<pre><?= htmlspecialchars(json_encode($data, JSON_PRETTY_PRINT)) ?></pre>

<h2>Raw body</h2>
<pre><?= htmlspecialchars($raw) ?></pre>
</body>
</html>
