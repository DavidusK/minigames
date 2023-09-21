<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
<link href="<?= @APP_URL ?>/assets/css/minigamesStyle.css?v=<?= @rand() ?>" rel="stylesheet">

<div class="mainpage-wrap position-relative">
   <div class="overlay_col"></div>
   <section class="battleship_main login-theme position-relative d-none">
      <div class="position-relative container">
         <div class="battle_inner text-center">
            <iframe class="btlshp_ifr" src="https://minigames.piratepets.io/ship/" width="auto" height="auto" scrolling="no"></iframe>
            <!-- <iframe class="btlshp_ifr" src="https://webstudio.ge/minigames/ship/" width="auto" height="auto" scrolling="no"></iframe> -->
         </div>
      </div>
   </section>
</div>
<script>
   $(document).ready(async function() {
      let userAuth = getCookie("userLogin");
      if (userAuth == null) {
         $(".battleship_main").empty();
         location.replace(APP_URL + '/login');
      } else {
         $(".battleship_main").removeClass("d-none");
      }
   });
</script>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>