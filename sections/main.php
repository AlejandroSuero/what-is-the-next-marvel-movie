<header>
  <h1 class="title" tabindex="0">Which is the next MCU production?</h1>
</header>
<main>
  <header>
    <h2 class="title" tabindex="0"><?= $movieTitle; ?> <span>releases <b><?= $daysUntil; ?></b></span></h2>
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
