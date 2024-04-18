<?php

require_once "consts.php";
require_once "functions.php";

$data = get_data(API_URL);

# Extracting data into variables for next film
$imgUrl = $data["poster_url"];
$movieTitle = $data["title"];
$daysUntil = get_until_message($data["days_until"]);
$releaseDate = date_format(date_create($data["release_date"]), "Y/m/d");
$description = $data["overview"];
$type = $data["type"];

# Extracting next production data
$nextProduction = $data["following_production"];
$nextTitle = $nextProduction["title"];
$nextType = $nextProduction["type"];

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
?>

<!DOCTYPE html>
<html lang="en">

<?php require "sections/head.php"; ?>

<body>
  <?php require "sections/main.php"; ?>
  <?php require "sections/scripts.php"; ?>
</body>

<?php require "sections/styles.php"; ?>

</html>
