<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
<link href="<?= @APP_URL ?>/assets/css/miniGamesMainStyle.css?v=<?= @rand() ?>" rel="stylesheet">
<div class="mainpage-wrap main-position-relative">
  <div class="overlay_col"></div>
  <section class="login-theme main-position-relative">
    <div class="main-position-relative container">
      <div class="login_inner text-center postersN">
        <div class="postersContainer">
        <a class="create_account btn btn-secondary" href="<?= @APP_URL ?>/ship">
          <img class="battleshipPoster" src="<?= @APP_URL ?>/assets/images/battleship.png">
          <div class="posters">Battleship</div>
        </a>
        <a class="create_account btn btn-secondary" href="#" style="opacity:0.6;">
          <img class="battleshipPoster" src="<?= @APP_URL ?>/assets/images/rockpaperscissors.png">
          <div class="coming-soon-overlay">Coming Soon</div>
          <div class="posters">Rock, Paper, Scissors</div>
        </a>
        <a class="create_account btn btn-secondary" href="#" style="opacity:0.6;">
          <img class="battleshipPoster" src="<?= @APP_URL ?>/assets/images/piratesdestiny.png">
          <div class="coming-soon-overlay">Coming Soon</div>
          <div class="posters">Pirate's Destiny</div>
        </a>
        <a class="create_account btn btn-secondary" href="#" style="opacity:0.6;">
          <img class="battleshipPoster" src="<?= @APP_URL ?>/assets/images/finddestroy.png">
          <div class="coming-soon-overlay">Coming Soon</div>
          <div class="posters">Find & Destroy</div>
        </a></div>
      </div>
    </div>
  </section>
</div>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>