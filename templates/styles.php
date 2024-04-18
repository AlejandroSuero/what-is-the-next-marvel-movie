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
