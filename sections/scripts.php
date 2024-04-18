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
