<header>
  <h1 class="title" tabindex="0">Which is the next MCU production?</h1>
</header>
<main>
  <header>
    <h2 class="title" tabindex="0"><?= $title; ?> <span>releases <b><?= $days_until_message; ?></b></span></h2>
  </header>
  <picture>
    <img alt="<?= $type; ?> poster for <?= $title; ?>" title="Display big <?= strtolower($type); ?> poster for <?= $title; ?>" id="movie-poster" src="<?= $poster_url; ?>" width="<?= $img_width; ?>" height="<?= $img_height; ?>" tabindex="0" />
  </picture>
  <section>
    <header>
      <h2 tabindex="0">Information about this <?= $type; ?>:</h2>
    </header>
    <div>
      <p tabindex="0"><b>Overview</b>: <span><?= $overview; ?></span></p>
      <p tabindex="0"><b>Release date</b>: <?= $release_date; ?></p>
      <p tabindex="0"><b>Next <?= strtolower($following_production["type"]); ?> in production is</b>: <?= $following_production["title"]; ?></p>
    </div>
  </section>
</main>
