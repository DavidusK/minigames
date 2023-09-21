<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
   <div class="mainpage-wrap position-relative">
      <div class="overlay_col"></div>
      <section class="login-theme position-relative">
         <div class="position-relative container">
            <h5 class="log-head">Registration</h5>
            <a href="<?=APP_URL?>/login" class="wallet_back">
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
               <form class="form_login text-start" id="registerForm">
                  <div class="mb-4 mb-3">
                     <input name="email" id="email" placeholder="Email" autocomplete="off" required type="email" class="form-control">
                  </div>
                  <div class="mb-4 mb-3">
                     <input name="username" id="username" placeholder="Username" autocomplete="off" required type="text" class="form-control">
                  </div>
                  <div class="position-relative mb-4 mb-3">
                     <input name="password" id="password" minlength="8" required placeholder="Password" autocomplete="new-password" type="password" class="form-control">
                  </div>
                  <div class="position-relative mb-4 mb-3">
                     <input name="repeat_password" id="repeat_password" placeholder="Confirm Password" type="password" class="form-control">
                  </div>
                  <div class="position-relative mb-4 mb-3">
                     <input name="verify_code" id="verify_code" required placeholder="Email Verification Code" type="text" class="form-control">
                     <div class="eye-icon" style="cursor:pointer;" id="verification-code">Get </div>
                  </div>
                  <div class="position-relative mb-4 mb-3">
                     <input name="promo_code" id="promo_code" placeholder="Enter Promo Code" type="text" class="form-control d-none">
                  </div>
                  <div class="login-btn-wrap mt-4">
                     <button class="btn-form btn btn-secondary" type="submit">
                        <span class="ml-2">Register</span>
                     </button>
                  </div>
                  <div class="term_conditions">
                     <p>By creating an account you agree to our <a href="https://piratepets.gitbook.io/terms-of-service/" target="_blank" rel="noopener noreferrer">Terms</a> &amp; <a href="https://piratepets.gitbook.io/privacy-policy/" target="_blank" rel="noopener noreferrer">Privacy</a></p>
                  </div>
               </form>
               <div class="react-reveal have_account mt-4 text-center">
                  <p>Already have an account?</p>
                  <a class="create_account btn btn-secondary" href="<?=@APP_URL?>/login">Login</a>
               </div>
            </div>
         </div>
   </div>
   <script>
      $(document).ready(async function(){
         let appUrl = `${API_BASE_URL}setting/view`;
         let response = await callHttpRequest(appUrl, [], "GET", "");
         if(response.status === 'success' && response.data.promoCode == "active") {
            $("#promo_code").removeClass("d-none");
            $("#promo_code").attr("required",true);
         }
      });
   </script>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>