<?php

require_once "consts.php";
require_once "functions.php";

$data = get_data(API_URL);

# Extracting data into variables for next film
$imgUrl = $data["poster_url"];
$daysUntil = get_until_message($data["days_until"]);
$releaseDate = date_format(date_create($data["release_date"]), "Y/m/d");

$imgUrlArray = explode("/", $imgUrl);
$imgWidth = 0;
$imgRealWidth = 0;
foreach ($imgUrlArray as $str) {
  if (str_starts_with($str, "w")) {
    $str = str_replace("w", "", $str);
    $imgRealWidth = (int)$str;
    if ($imgRealWidth > 250) {
      $imgWidth = 250;
    }
  }
}

$imgHeight = (int)($imgWidth + ($imgWidth / 3));
$imgRealHeight = (int)($imgRealWidth + ($imgRealWidth / 3));
$data += ["img_width" => $imgWidth, "img_height" => $imgHeight, "img_real_width" => $imgRealWidth, "img_real_height" => $imgRealHeight, "days_until_message" => $daysUntil];
?>

<!DOCTYPE html>
<html lang="en">

<?php render_template("head", $data); ?>

<body>
  <?php render_template("main", $data); ?>
  <?php render_template("scripts", $data); ?>
</body>

<?php render_template("styles"); ?>

</html>
