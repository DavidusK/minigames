<title>Piratepets - Battleship</title>
<?php require_once("./../config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
<link href="<?= @APP_URL ?>/assets/css/minigamesStyle.css?v=<?= @rand() ?>" rel="stylesheet">


<div class="mainpage-wrap position-relative">
   <div class="overlay_col"></div>
   <section class="battleship_main login-theme position-relative d-none">
      <div class="position-relative container">
         <div class="battle_inner text-center">
             <div id="unity-canvas-container">
    <video autoplay  muted playsinline id="unity-loading-video">
        <source src="../assets/images/loading.mp4" type="video/mp4">
    </video>
    <canvas id="unity-canvas" width="1178" height="663" tabindex="-1" style="height: auto; width: 100%; cursor: default;"></canvas>
</div>
            <!--<canvas id="unity-canvas" width=1178 height=663 tabindex="-1"></canvas>-->
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
<script src="Build/BattleSeaWebgl.loader.js"></script>
    <script>
      if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
        // Mobile device style: fill the whole browser client area with the game canvas:
        var meta = document.createElement('meta');
        meta.name = 'viewport';
        meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
        document.getElementsByTagName('head')[0].appendChild(meta);

        var canvas = document.querySelector("#unity-canvas");
        canvas.style.width = "100%";
        canvas.style.height = "100%";
        canvas.style.position = "fixed";

        document.body.style.textAlign = "left";
      }

      createUnityInstance(document.querySelector("#unity-canvas"), {
        dataUrl: "Build/BattleSeaWebgl.data",
        frameworkUrl: "Build/BattleSeaWebgl.framework.js",
        codeUrl: "Build/BattleSeaWebgl.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "DefaultCompany",
        productName: "Sea Battle",
        productVersion: "1.0",
        // matchWebGLToCanvasSize: false, // Uncomment this to separately control WebGL canvas render size and DOM element size.
        // devicePixelRatio: 1, // Uncomment this to override low DPI rendering on high DPI displays.
      });
    </script>
    <script>
        window.addEventListener('resize', resizeElements, false);

function resizeElements() {
    let canvasAspectRatio = 1178 / 663;
    let windowAspectRatio = window.innerWidth / window.innerHeight;
    
    let canvas = document.querySelector("#unity-canvas");
    let video = document.querySelector("#unity-loading-video");

    if (windowAspectRatio > canvasAspectRatio) {
        // If the window is wider than the canvas aspect ratio
        canvas.style.width = (window.innerHeight * canvasAspectRatio) + 'px';
        canvas.style.height = '100vh';
        
        video.style.width = (window.innerHeight * canvasAspectRatio) + 'px';
        video.style.height = '100vh';
    } else {
        // If the window is taller or equal to the canvas aspect ratio
        canvas.style.width = '100vw';
        canvas.style.height = (window.innerWidth / canvasAspectRatio) + 'px';
        
        video.style.width = '100vw';
        video.style.height = (window.innerWidth / canvasAspectRatio) + 'px';
    }
}
resizeElements(); // Call once to set initial size




    </script>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>