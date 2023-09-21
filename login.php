<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR."/includes/header.php"); ?>
   <div class="mainpage-wrap position-relative">
      <div class="overlay_col"></div>
      <section class="login-theme position-relative">
         <div class="position-relative container">
            <h5 class="log-head"> Login / Registration</h5>
            <a href="<?=APP_URL?>" class="wallet_back">
               <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 28 28" fill="none">
                  <g filter="url(#filter0_di_1_7208)">
                     <path d="M14 23C7.92339 23 3 18.0766 3 12C3 5.92339 7.92339 1 14 1C20.0766 1 25 5.92339 25 12C25 18.0766 20.0766 23 14 23ZM8.94798 12.754L14.9581 18.7641C15.375 19.181 16.0492 19.181 16.4617 18.7641L17.2157 18.0101C17.6327 17.5931 17.6327 16.919 17.2157 16.5065L12.7093 12L17.2157 7.49355C17.6327 7.07661 17.6327 6.40242 17.2157 5.98992L16.4617 5.23589C16.0448 4.81895 15.3706 4.81895 14.9581 5.23589L8.94798 11.246C8.53105 11.6629 8.53105 12.3371 8.94798 12.754Z" fill="url(#paint0_linear_1_7208)"></path>
                  </g>
                  <defs>
                     <filter id="filter0_di_1_7208" x="0" y="0" width="28" height="28" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                        <feOffset dy="2"></feOffset>
                        <feGaussianBlur stdDeviation="1.5"></feGaussianBlur>
                        <feComposite in2="hardAlpha" operator="out"></feComposite>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.116493 0 0 0 0 0.23887 0 0 0 0 0.254167 0 0 0 0.41 0"></feColorMatrix>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7208"></feBlend>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7208" result="shape"></feBlend>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                        <feOffset></feOffset>
                        <feGaussianBlur stdDeviation="3"></feGaussianBlur>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"></feComposite>
                        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.25 0"></feColorMatrix>
                        <feBlend mode="normal" in2="shape" result="effect2_innerShadow_1_7208"></feBlend>
                     </filter>
                     <linearGradient id="paint0_linear_1_7208" x1="14" y1="1" x2="14" y2="23" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#46C7A8"></stop>
                        <stop offset="1" stop-color="#46C7A8" stop-opacity="0"></stop>
                     </linearGradient>
                  </defs>
               </svg>
               Back
            </a>
            <div class="login_inner">
               <form class="form_login" id="loginForm" method="POST">
                  <div class="mb-4 mb-3">
                     <input name="email" required id="email" placeholder="Email" type="email" class="form-control">
                  </div>
                  <div class="position-relative mb-4 mb-3">
                     <input name="password" required id="password" placeholder="Password" type="password" class="form-control">
                  </div>
                  <div class="remember_recovery">
                     <div class="form-check">
                        <label class="form-check-label">
                           <input type="checkbox" class="form-check-input"> Remember me
                        </label>
                     </div>
                     <a href="javascript:void(0)" class="recovery_col">Recovery Password</a>
                  </div>
                  <div class="login-btn-wrap mt-5">
                     <button type="submit" class="btn-form btn btn-secondary">Login</button>
                  </div>
                  <div class="have_account mt-5 text-center">
                     <p>Don't have an account yet?</p>
                     <a class="create_account btn btn-secondary" href="<?=@APP_URL?>/register">Create Account</a>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </div>
<?php require_once(ROOT_DIR."/includes/footer.php"); ?>