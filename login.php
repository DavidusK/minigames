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
                     <div class="eye-icon">
                        <svg data-action="reveal-password" class="eye-close" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 2.5L13 13.5" stroke="#81BFB8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.68098 9.8499C9.22219 10.2702 8.62193 10.5023 7.99973 10.4999C7.49515 10.4998 7.00239 10.3471 6.58624 10.0618C6.17008 9.77642 5.85001 9.37182 5.66811 8.90117C5.4862 8.43051 5.45097 7.91583 5.56705 7.42477C5.68313 6.93372 5.94509 6.48929 6.31848 6.1499" stroke="#81BFB8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M4.625 4.2876C2.075 5.5751 1 8.0001 1 8.0001C1 8.0001 3 12.5001 8 12.5001C9.17161 12.5096 10.3286 12.2397 11.375 11.7126" stroke="#81BFB8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M13.0383 10.5688C14.4008 9.35002 15.0008 8.00002 15.0008 8.00002C15.0008 8.00002 13.0008 3.50002 8.00078 3.50002C7.56732 3.49916 7.13455 3.5347 6.70703 3.60627" stroke="#81BFB8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.46875 5.5437C9.0004 5.64444 9.48487 5.91537 9.84903 6.31561C10.2132 6.71584 10.4373 7.22367 10.4875 7.76245" stroke="#81BFB8" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <svg data-action="reveal-password" class="eye-open d-none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"></path><path fill="#81BFB8" d="M4 12.001V12c.003-.016.017-.104.095-.277c.086-.191.225-.431.424-.708c.398-.553.993-1.192 1.745-1.798C7.777 7.996 9.812 7 12 7c2.188 0 4.223.996 5.736 2.216c.752.606 1.347 1.245 1.745 1.798c.2.277.338.517.424.708c.078.173.092.261.095.277V12c-.003.016-.017.104-.095.277a4.251 4.251 0 0 1-.424.708c-.398.553-.993 1.192-1.745 1.798C16.224 16.004 14.188 17 12 17c-2.188 0-4.223-.996-5.736-2.216c-.752-.606-1.347-1.245-1.745-1.798a4.226 4.226 0 0 1-.424-.708A1.115 1.115 0 0 1 4 12.001ZM12 5C9.217 5 6.752 6.254 5.009 7.659c-.877.706-1.6 1.474-2.113 2.187a6.157 6.157 0 0 0-.625 1.055C2.123 11.23 2 11.611 2 12c0 .388.123.771.27 1.099c.155.342.37.7.626 1.055c.513.713 1.236 1.48 2.113 2.187C6.752 17.746 9.217 19 12 19c2.783 0 5.248-1.254 6.991-2.659c.877-.706 1.6-1.474 2.113-2.187c.257-.356.471-.713.625-1.055c.148-.328.271-.71.271-1.099c0-.388-.123-.771-.27-1.099a6.197 6.197 0 0 0-.626-1.055c-.513-.713-1.236-1.48-2.113-2.187C17.248 6.254 14.783 5 12 5Zm-1 7a1 1 0 1 1 2 0a1 1 0 0 1-2 0Zm1-3a3 3 0 1 0 0 6a3 3 0 0 0 0-6Z"></path></g></svg>
                     </div>
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