<?php

declare(strict_types=1);

const API_URL = "https://whenisthenextmcufilm.com/api";

function get_data(string $url): array
{
  $result = file_get_contents($url);
  $data = json_decode($result, true);
  return $data;
}

$data = get_data(API_URL);

# Extracting data into variables for next film
$imgUrl = $data["poster_url"];
$movieTitle = $data["title"];
$daysUntil = $data["days_until"];
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

<head>
  <meta charset="UTF-8" />
  <title>Next Marvel production</title>
  <meta name="description" content="Know which is next Marvel movie" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#13171f" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <h1 class="title" tabindex="0">Which is the next MCU production?</h1>
  </header>
  <main>
    <header>
      <h2 class="title" tabindex="0"><?= $movieTitle; ?> <span>releases in <u><?= $daysUntil; ?> days</u></span></h2>
    </header>
    <picture>
      <img alt="<?= $type; ?> poster for <?= $movieTitle; ?>" title="Display big <?= strtolower($type); ?> poster for <?= $movieTitle; ?>" id="movie-poster" src="<?= $imgUrl; ?>" width="<?= $imgWidth; ?>" height="<?= $imgHeight; ?>" tabindex="0" />
    </picture>
    <section>
      <header>
        <h2 tabindex="0">Information about this <?= $type; ?>:</h2>
      </header>
      <div>
        <p tabindex="0"><b>Overview</b>: <span><?= $description; ?></span></p>
        <p tabindex="0"><b>Release date</b>: <?= $releaseDate; ?></p>
        <p tabindex="0"><b>Next <?= strtolower($nextType); ?> in production is</b>: <?= $nextTitle; ?></p>
      </div>
    </section>
  </main>
  <script>
    /**
     * @param selector {string} DOM selector
     * @returns {HTMLElement}
     */
    const $ = (selector) => document.querySelector(selector);

    /** @type {HTMLImgElement} */
    $image = $("#movie-poster");

    $image.addEventListener("click", displayBigImage);

    function displayBigImage() {
      const overlay = document.createElement("div");
      const bigImage = document.createElement("img");
      const closeButton = document.createElement("button");
      const $body = $("body");

      closeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';

      bigImage.setAttribute("src", "<?= $imgUrl; ?>");
      bigImage.setAttribute("width", "<?= $imgRealWidth; ?>");
      bigImage.setAttribute("height", "<?= $imgRealHeight; ?>");
      bigImage.setAttribute("id", "big-movie-poster");

      overlay.classList.add("overlay");
      overlay.appendChild(closeButton);
      overlay.appendChild(bigImage);

      $body.appendChild(overlay);

      overlay.addEventListener("click", (ev) => {
        ev.preventDefault();
        if (ev.target === overlay || ev.target === closeButton || ev.target === closeButton.children[0])
          overlay.remove();
      });

    }
  </script>
</body>

<style>
  :root {
    color-scheme: light dark;
  }

  *,
  *::after,
  *::before {
    margin: 0;
    box-sizing: border-box;

    &:focus-visible {
      border: 1px solid var(--pico-muted-border-color);
    }
  }

  button {
    width: fit-content;
    height: fit-content;
    color: white;
    transition: background 250ms ease-in;
    position: absolute;
    top: 0;
    right: 0;
    transform: translate(-200%, 50%);

    &>i {
      transform: scale(150%);
    }
  }

  body {
    width: 100vw;
    height: 100vh;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    letter-spacing: 1px;
    line-height: 1rem;

    &>header {
      margin: 0;
      max-width: 100vw !important;
      border-bottom: 2px solid var(--pico-muted-border-color);
      background: rgba(0, 0, 0, 20%);

    }
  }

  main {
    width: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 1rem;
  }

  section {
    margin: auto;
    width: fit-content;
    display: flex;
    justify-content: center;
    flex-direction: column;
  }

  picture {
    display: grid;
    place-content: center;
    object-fit: contain;
    height: fit-content;
  }

  h1 {
    font-weight: 900;
    font-size: 3rem;
    letter-spacing: 2px;
    margin: 0;
    padding-top: 1rem;
    padding-bottom: 1rem;
    opacity: 90%;
  }

  h2 {
    margin: 0;
    padding-top: 1rem;
    padding-bottom: 1rem;
    opacity: 80%;
    color: white;

    &>span {
      font-weight: 200;
    }
  }


  p {
    opacity: 70%;
    font-size: 1rem;

    &>b {
      color: white;
    }
  }

  .title {
    text-align: center;
  }

  #movie-poster {
    aspect-ratio: 2/3;
    border-radius: 0.5rem;
    border: 1px solid gray;
    cursor: pointer;
    opacity: 90%;
    transition: transform 200ms ease, opacity 200ms ease;

    &:hover {
      opacity: 100%;
      transform: scale(110%);
    }
  }

  .overlay {
    position: fixed;
    top: 0;
    width: 100%;
    height: 100%;
    display: grid;
    place-content: center;
    backdrop-filter: blur(5px);
    background: rgba(0, 0, 0, 50%);
  }

  #big-movie-poster {
    position: relative;
    aspect-ratio: 2/3;
    margin: auto;
    border-radius: 1rem;
  }
</style>

</html>
