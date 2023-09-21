<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
<div class="mainpage-wrap position-relative">
	<div class="overlay_col"></div>
	<section class="react-reveal d-none SendRecive_main position-relative common_padding_main">
		<div class="container">
			<div class="sendrecieve_main position-relative">
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
				<div class="cryto_name_top position-relative">
					<div class="cryto_name d-flex justify-content-center">
						<img src="<?=@APP_URL?>/assets/images/bnb_icon.png" alt="BNB" class="img-fluid" style="width: 33px;height: 29px;object-fit: contain;">
						<p> BNB <span class="theme-text" style="color: #6afff9;"><?=@$_COOKIE['minigameWalletBalance']?></span></p>
					</div>
					<div class="copy_Code">
						<div class="code_here position-relative">
							<p class="wallet_address"></p>
						</div>
						<div class="tooltipa">
							<button onclick="copyToolText()" onmouseout="copyToolout()" type="button" class="copy_code_btn btn btn-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
									<g clip-path="url(#clip0_1_10707)">
										<g filter="url(#filter0_d_1_10707)">
											<path d="M12.8253 1.5H9.67531C7.08781 1.5 6.03781 2.5275 6.00781 5.0625H8.32531C11.4753 5.0625 12.9378 6.525 12.9378 9.675V11.9925C15.4728 11.9625 16.5003 10.9125 16.5003 8.325V5.175C16.5003 2.55 15.4503 1.5 12.8253 1.5Z" fill="#79E7FB"></path>
										</g>
										<g filter="url(#filter1_d_1_10707)">
											<path d="M8.325 6H5.175C2.55 6 1.5 7.05 1.5 9.675V12.825C1.5 15.45 2.55 16.5 5.175 16.5H8.325C10.95 16.5 12 15.45 12 12.825V9.675C12 7.05 10.95 6 8.325 6ZM9.2175 10.2375L6.435 13.02C6.38497 13.0704 6.32536 13.1104 6.25967 13.1374C6.19398 13.1645 6.12354 13.1781 6.0525 13.1775C5.98146 13.1781 5.91102 13.1645 5.84533 13.1374C5.77964 13.1104 5.72003 13.0704 5.67 13.02L4.275 11.625C4.22507 11.5754 4.18544 11.5164 4.1584 11.4514C4.13136 11.3864 4.11744 11.3167 4.11744 11.2463C4.11744 11.1758 4.13136 11.1061 4.1584 11.0411C4.18544 10.9761 4.22507 10.9171 4.275 10.8675C4.485 10.6575 4.8225 10.6575 5.0325 10.8675L6.045 11.88L8.4525 9.4725C8.6625 9.2625 9 9.2625 9.21 9.4725C9.42 9.6825 9.4275 10.0275 9.2175 10.2375Z" fill="#53BCCF"></path>
										</g>
									</g>
									<defs>
										<filter id="filter0_d_1_10707" x="2.00781" y="1.5" width="18.4922" height="18.4926" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
											<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
											<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
											<feOffset dy="4"></feOffset>
											<feGaussianBlur stdDeviation="2"></feGaussianBlur>
											<feComposite in2="hardAlpha" operator="out"></feComposite>
											<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
											<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_10707"></feBlend>
											<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_10707" result="shape"></feBlend>
										</filter>
										<filter id="filter1_d_1_10707" x="-2.5" y="6" width="18.5" height="18.5" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
											<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
											<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
											<feOffset dy="4"></feOffset>
											<feGaussianBlur stdDeviation="2"></feGaussianBlur>
											<feComposite in2="hardAlpha" operator="out"></feComposite>
											<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
											<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_10707"></feBlend>
											<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_10707" result="shape"></feBlend>
										</filter>
										<clipPath id="clip0_1_10707">
											<rect width="18" height="18" fill="white"></rect>
										</clipPath>
									</defs>
								</svg>
								<span class="tooltiptext" id="myTooltip">Copy to clipboard</span> Copy
							</button>
						</div>
					</div>
				</div>
				<hr class="custom_hr">
				<div class="send_reciece_btns">
					<div class="btn-one"></div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	$(document).ready(async function(){
        let userAuth = getCookie("userLogin");
        if (userAuth == null) {
            $(".battleship_main").empty();
            location.replace(APP_URL + '/login');
        }
		else{
			let walletAddress = getCookie("minigameWalletAddress");
			if(typeof walletAddress == "undefinded" || walletAddress == "" || walletAddress == null){
				$(".SendRecive_main").empty();
				showAlert("info", "Connect Metamask First!");
				setTimeout(function () {  window.history.back() }, 2000);
			}
			else{
				$(".SendRecive_main").removeClass("d-none");
			}
		}
    });
</script>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>