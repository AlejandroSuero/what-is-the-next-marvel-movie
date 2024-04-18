<?php

declare(strict_types=1);

function render_template(string $template, array $data = []): void
{
  extract($data);
  require "templates/$template.php";
}

function get_data(string $url): array
{
  $result = file_get_contents($url);
  $data = json_decode($result, true);
  return $data;
}

function get_until_message(int $days): string
{
  return match (true) {
    $days === 0 => "TODAY!",
    $days === 1 => "TOMORROW!",
    $days <= 7  => "THIS WEEK!",
    $days < 31  => "THIS MONTH!",
    default     => "in $days days"
  };
}
