<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
<div class="mainpage-wrap position-relative">
    <div class="overlay_col"></div>
    <section class="inventory_main common_padding_main position-relative d-none">
        <div class="Market_full">
            <section class="market_dash inventory-dash position-relative">
                <div class="text-center">
                    <h3 class="inventory_heading">Inventory</h3>
                </div>
                <div class="market_dash_tab">
                    <div class="send-tabling">
                        <div class="tab-frame market_tabs">
                            <div class="with_fillte-wrap">
                                <a href="javascript:void(0);" onclick="goBack()" class="inventory_back">
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
                                <div class="clearfix">
                                    <input type="radio" name="inventory_tab" checked value="All" id="All">
                                    <label for="All">All</label>

                                    <input type="radio" name="inventory_tab" value="Pirates" id="Pirates">
                                    <label for="Pirates">Pirates</label>

                                    <input type="radio" name="inventory_tab" value="Ships" id="Ships">
                                    <label for="Ships">Ships</label>

                                    <input type="radio" name="inventory_tab" value="Others" id="Others">
                                    <label for="Others">Others</label>
                                </div>
                            </div>
                            <div class="container">
                                <div class="left_Market" id="inventoryListing">

                                </div>
                                <ul id="pagination"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
            let walletAddress = getCookie("minigameWalletAddress");
            if (typeof walletAddress == "undefinded" || walletAddress == "" || walletAddress == null) {
                $(".inventory_main").empty();
                showAlert("info", "Please connect wallet to continue");
                setTimeout(function() {
                    window.history.back()
                }, 2000);
            } else {
                $(".inventory_main").removeClass("d-none");
                await getInventoryList("All", 1);
            }
        }
    });
</script>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>