<?php
date_default_timezone_set("UTC");
$team = ["Ahmed", "Rosario"];
header("Content-Type: application/json; charset=utf-8");
echo json_encode([
  "message" => "Hello from " . implode(", ", $team) . "!",
  "language" => "PHP",
  "generated_at" => date("c"),
  "ip" => $_SERVER["REMOTE_ADDR"] ?? "unknown"
], JSON_PRETTY_PRINT);
