<?php
if (($_SERVER["REQUEST_METHOD"] ?? "") === "POST") {
  $name = trim($_POST["name"] ?? "");
  $favorite = trim($_POST["favorite"] ?? "");
  $payload = json_encode(["name"=>$name, "favorite"=>$favorite]);

  setcookie("hw2_state_php", $payload, [
    "expires" => time() + 86400,
    "path" => "/",
    "httponly" => true,
    "samesite" => "Lax"
  ]);

  header("Location: /hw2/php/state-view-php.php");
  exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>state-save-php</title></head>
<body>
<h1>State Save (PHP)</h1>
<form method="post" action="/hw2/php/state-save-php.php">
  <label>Name: <input name="name"></label><br><br>
  <label>Favorite food: <input name="favorite"></label><br><br>
  <button type="submit">Save</button>
</form>
<p>
  <a href="/hw2/php/state-view-php.php">View</a> |
  <a href="/hw2/php/state-clear-php.php">Clear</a>
</p>
</body></html>
