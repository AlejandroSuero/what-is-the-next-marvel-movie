<?php

declare(strict_types=1);

class NextMovie
{
  public function __construct(
    private string $title,
    private int    $days_until,
    private array  $following_production,
    private string $release_date,
    private string $poster_url,
    private string $overview,
    private string $type,
    private int    $img_width,
    private int    $img_real_width,
    private int    $img_height,
    private int    $img_real_height
  ) {
  }

  public function get_until_message(): string
  {
    $days = $this->days_until;

    return match (true) {
      $days === 0 => "TODAY!",
      $days === 1 => "TOMORROW!",
      $days <= 7  => "THIS WEEK!",
      $days < 31  => "THIS MONTH!",
      default     => "in $days days"
    };
  }

  public static function fetch_and_create_movie(string $api_url): NextMovie
  {
    $result = file_get_contents($api_url);
    $data = json_decode($result, true);
    $img_url_array = explode("/", $data["poster_url"]);
    $img_width = 0;
    $img_real_width = 0;
    foreach ($img_url_array as $str) {
      if (str_starts_with($str, "w")) {
        $str = str_replace("w", "", $str);
        $img_real_width = (int)$str;
        if ($img_real_width > 250) {
          $img_width = 250;
        }
      }
    }

    $img_height = (int)($img_width + ($img_width / 3));
    $img_real_height = (int)($img_real_width + ($img_real_width / 3));

    return new self(
      $data["title"],
      $data["days_until"],
      $data["following_production"],
      date_format(date_create($data["release_date"]), "Y/m/d"),
      $data["poster_url"],
      $data["overview"],
      $data["type"],
      $img_width,
      $img_real_width,
      $img_height,
      $img_real_height
    );
  }

  public function get_data(): array
  {
    return get_object_vars($this);
  }
}
