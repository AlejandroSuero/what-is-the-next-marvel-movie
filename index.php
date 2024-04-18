<?php

require_once "consts.php";
require_once "functions.php";
require_once "classes/NextMovie.php";

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$data = $next_movie->get_data();
?>

<!DOCTYPE html>
<html lang="en">

<?php render_template("head", ["title" => $data["title"]]); ?>

<body>
  <?php render_template("main", array_merge(
    $data,
    ["days_until_message" => $next_movie->get_until_message()]
  )); ?>
  <?php render_template("scripts", [
    "poster_url" => $data["poster_url"],
    "img_real_width" => $data["img_real_width"],
    "img_real_height" => $data["img_real_height"],
  ]); ?>
</body>

<?php render_template("styles"); ?>

</html>
