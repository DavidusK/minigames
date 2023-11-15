<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
<section class="crystal_section profile_section common_padding_main position-relative">
    <div class="container position-relative">
        <div class="row">
            <div class="withdraw_form" id="crystal_tab">
                <ul class="nav nav-tabs withdrw_frame">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#withdraw">Withdraw</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#buy">Buy</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane container active" id="withdraw">
                        <div class="Withdraw_tab">
                            <div class="balance_box lg-my-5 my-4 pt-1">
                                <h6>Balance</h6>
                                <h5>
                                    <div class="diamond_img">
                                        <img src="<?= @APP_URL ?>/assets/images/diamond.png" class="img-fluid" />
                                    </div>
                                    <span class="crystal-balance"><div class="spinner-border" role="status"><span class="sr-only"></span></div></span>
                                </h5>
                            </div>
                            <div class="withdra_form">
                                <div class="">
                                    <label for="crystal_amount">Enter amount</label>
                                    <div class="withdrawinput_wrap position-relative">
                                        <input type="text" name="crystal_amount" id="crystal_amount" placeholder="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" autocomplete="off">
                                        <div class="amont_icon">
                                            <img src="<?= @APP_URL ?>/assets/images/diamond.png" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="min_max d-flex align-items-center gap-4 mt-2">
                                        <p>Min:<span>10,000</span></p>
                                        <p>Max:<span>100,000</span></p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="crystal_gusd">You Get</label>
                                    <div class="withdrawinput_wrap position-relative">
                                        <input type="text" name="crystal_gusd" id="crystal_gusd" readonly placeholder="0" autocomplete="off">
                                        <div class="amont_icon">
                                            <img src="<?= @APP_URL ?>/assets/images/busd_icon.png" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="min_max d-flex align-items-center gap-4 mt-2">
                                        <p>Min:<span>100</span></p>
                                        <p>Max:<span>1,000</span></p>
                                    </div>
                                </div>
                                <div class="with_btn text-center lg-mt-5 mt-4">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#withdrawConfirmation" class="btn_widraw" disabled>Withdraw</button>
                                    <div class="dimaond_wrap d-flex justify-content-center">
                                        <div class="sm-dimanod">
                                            <img src="<?= @APP_URL ?>/assets/images/diamond.png" class="img-fluid" />
                                        </div>
                                        <p class="commm_rate"><div class="spinner-border" role="status"><span class="sr-only"></span></div></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="History-main">
                            <div class="history-head">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                    <path d="M15 9.375V15" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M19.875 17.8125L15 15" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.41406 11.6836H3.72656V6.99609" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M7.71094 22.2891C9.15283 23.7321 10.9903 24.7151 12.991 25.1137C14.9916 25.5123 17.0656 25.3086 18.9504 24.5283C20.8353 23.748 22.4464 22.4263 23.5799 20.7302C24.7134 19.0341 25.3185 17.04 25.3185 15C25.3185 12.96 24.7134 10.9659 23.5799 9.26981C22.4464 7.57375 20.8353 6.25197 18.9504 5.47169C17.0656 4.69141 14.9916 4.48768 12.991 4.88627C10.9903 5.28486 9.15283 6.26787 7.71094 7.71094L3.72656 11.6836" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p>History</p>
                            </div>
                            <div class="history_list amount_table mt-4">
                                <table class="table table-hover" id="withdraw_history">
                                    <tbody>
                                        <tr><td colspan="6" class="text-center"><div class="spinner-border" role="status"><span class="sr-only"></span></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane container fade" id="buy">
                        <section class='buy_card'>
                            <div class="buy_card_list">
                                <ul id="buy-crystal-listing">
                                    <li class="text-center"><div class="spinner-border" role="status"><span class="sr-only"></span></div></li>
                                </ul>
                            </div>
                            <section class="History-main">
                                <div class="history-head">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                        <path d="M15 9.375V15" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.875 17.8125L15 15" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.41406 11.6836H3.72656V6.99609" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.71094 22.2891C9.15283 23.7321 10.9903 24.7151 12.991 25.1137C14.9916 25.5123 17.0656 25.3086 18.9504 24.5283C20.8353 23.748 22.4464 22.4263 23.5799 20.7302C24.7134 19.0341 25.3185 17.04 25.3185 15C25.3185 12.96 24.7134 10.9659 23.5799 9.26981C22.4464 7.57375 20.8353 6.25197 18.9504 5.47169C17.0656 4.69141 14.9916 4.48768 12.991 4.88627C10.9903 5.28486 9.15283 6.26787 7.71094 7.71094L3.72656 11.6836" stroke="#46C7A8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <p>History</p>
                                </div>
                                <div class="history_list amount_table mt-4">
                                    <table class="table table-hover" id="buy_history">
                                        <tbody>
                                            <tr><td colspan="6" class="text-center"><div class="spinner-border" role="status"><span class="sr-only"></span></div></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- withdrawConfirmation Modal -->
<div class="modal fade buy_modal profile_edit_mod change_pass" id="withdrawConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal_inner_main position-relative">
                    <a href="javascript:void(0)" class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="top: 11px; right: 22px;">
                        <img src="<?= @APP_URL ?>/assets/images/close_img.png" class="img-fluid">
                    </a>
                    <div class="modal_buy-cont login_inner mobile_pad">
                        <h4 class="text-center">Confirm Withdraw</h4>
                        <hr class="custom_hr">
                        <div class="withdraw_info my-5">
                            <ul>
                                <li>
                                    <p>Amount: </p>
                                    <div class="span_wrap d-flex align-items-center gap-3">
                                        <span class="color_diff d-flex align-items-center gap-1">
                                            <div class="img_span">
                                                <img src="<?=@APP_URL?>/assets/images/diamond.png" class="img-fluid">
                                            </div>
                                            <span class="withdraw_crystal_confirm"></span>
                                        </span>
                                        <span class="color_diff">=</span><span class="color_diff d-flex align-items-center gap-1">
                                            <div class="img_span">
                                                <img src="<?=@APP_URL?>/assets/images/busd_icon.png" class="img-fluid">
                                            </div>
                                            <span class="withdraw_busd_confirm"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <p>Fee:</p><span class="fee_admin text-white withdraw_fee_confirm">--</span>
                                </li>
                                <li>
                                    <p>Total:</p>
                                    <span class="color_diff d-flex align-items-center gap-1">
                                        <div class="img_span">
                                            <img src="<?=@APP_URL?>/assets/images/busd_icon.png" class="img-fluid">
                                        </div>
                                        <span class="withdraw_balance_busd_confirm"></span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="modal_buy_btn">
                            <button type="button" data-action="confirm-withdraw" class="confirm-withdraw-confirm mod_confirmbtn btn btn-secondary">Confirm</button>
                            <button type="button" class="confirm-withdraw-cancel mod_cancelbtn btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- buyConfirmation Modal -->
<div class="modal fade buy_modal profile_edit_mod change_pass" id="buyConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal_inner_main position-relative">
                    <a href="javascript:void(0)" class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="top: 11px; right: 22px;">
                        <img src="<?=@APP_URL?>/assets/images/close_img.png" class="img-fluid">
                    </a>
                    <div class="modal_buy-cont login_inner mobile_pad">
                        <h4 class="text-center">Buy</h4>
                        <hr class="custom_hr">
                        <div class="withdraw_info my-5">
                            <ul>
                                <li>
                                    <p>Amount: </p>
                                    <div class="span_wrap d-flex align-items-center gap-3">
                                        <span class="color_diff d-flex align-items-center gap-1">
                                            <div class="img_span">
                                                <img src="<?=@APP_URL?>/assets/images/diamond.png" class="img-fluid">
                                            </div>
                                            <span class="buy_crystals"></span>
                                        </span>
                                        <span class="color_diff">=</span>
                                        <span class="color_diff d-flex align-items-center gap-1">
                                            <div class="img_span">
                                                <img src="<?=@APP_URL?>/assets/images/busd_icon.png" class="img-fluid">
                                            </div>
                                            <span class="buy_busd"></span> BUSD
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <p>Fee:</p><span class="text-white fee_admin buy_fee_confirm">--</span>
                                </li>
                                <li>
                                    <p>You Get:</p>
                                    <span class="color_diff d-flex align-items-center gap-1">
                                        <div class="img_span">
                                            <img src="<?=@APP_URL?>/assets/images/busd_icon.png" class="img-fluid">
                                        </div>
                                        <span class="buy_final_busd"></span> BUSD
                                    </span>
                                </li>
                                <li>
                                    <p>Address: </p>
                                    <span class="text-white buy_wallet_address address_span"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="modal_buy_btn">
                            <input type="hidden" id="p_id">
                            <input type="hidden" id="ad_fee">
                            <button type="button" data-action="confirm-buy" class="confirm-buy-confirm mod_confirmbtn btn btn-secondary">Confirm</button>
                            <button type="button" class="confirm-buy-cancel mod_cancelbtn btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let Adm_Co;
    let Adm_Fe;
    let Adm_Ad;
    $(document).ready(function() {
        let userAuth = getCookie("userLogin");
        if (userAuth == null) {
            $(".battleship_main").empty();
            location.replace(APP_URL + '/login');
        }else{
            updateBalance();  
        }
    });
    const updateBalance = async () => {
        $(".btn_widraw").attr("disabled",true);
        let userId = "<?=@$userInfo['_id']?>";
        let settings = await getCrystalSettings(userId);
        if(settings){
            // console.log("settings",settings);
            Adm_Co = settings.crystalConversionRate; // Admin ConversionRate
            Adm_Fe = settings.crystalCommission; // Admin Fee
            Adm_Ad = settings.adminWalletAddress; // Admin Address
            $(".commm_rate").html(`1=${settings.crystalConversionRate}$`);
            $(".commm_rate").next('div.spinner-border').remove();
            $(".crystal-balance").html(settings.userBalance);
            $(".fee_admin").html(`${Adm_Fe}%`)
            await getWithdrawHistory(1, 10, userId);
            await getBuyPackageHistory(1, 10, userId);
        }
    }
    $(document).on("input","#crystal_amount",function(e){
        validateNumber(e);
        let crystal_amount = $(this).val();
        let crystal_gusd = crystal_amount * Adm_Co;
        $("#crystal_gusd").val(crystal_gusd);
        if(crystal_amount >= 10000 && crystal_amount <= 100000)
            $(".btn_widraw").attr("disabled",false);
        else
            $(".btn_widraw").attr("disabled",true);
    })
    $(document).on("click","button[data-action='confirm-withdraw']",async function(e){
        e.preventDefault();
        let crystal_amount = $("#crystal_amount").val();
        // console.log("crystal_amount",crystal_amount);
        if(crystal_amount == 0 || crystal_amount < 10000 && crystal_amount > 100000){
            showAlert("info", "Please enter amount with in the range.");
        }
        else{
            let prevText  = $(".confirm-withdraw-confirm").text();
            $(".confirm-withdraw-cancel, .confirm-withdraw-confirm").attr('disabled',true);
            $(".confirm-withdraw-confirm").text("Please Wait");
            let userId = "<?=@$userInfo['_id']?>";
            let response = await createWithdrawRequest(crystal_amount, userId);
            if(response.status == "failure")
                showAlert("error", response.message, 5000);
            else
                await updateBalance();
            $(".confirm-withdraw-confirm").text(prevText);
            $(".confirm-withdraw-cancel, .confirm-withdraw-confirm").attr('disabled',false);
        }
    })
    $(window).on('shown.bs.modal', function (e) {
        if(e.target.id == "withdrawConfirmation"){
            let crystal_amount = $("#crystal_amount").val();
            console.log("crystal_amount",crystal_amount);
            if(crystal_amount == 0 || crystal_amount < 10000 && crystal_amount > 100000){
                showAlert("info", "Please enter amount with in the range.");
            }
            else{
                let crystal_gusd = crystal_amount * 0.01;
                let after_fee_gusd = ((crystal_gusd * Adm_Fe)/100).toFixed(2);
                $('.withdraw_crystal_confirm').text(crystal_amount);
                $('.withdraw_busd_confirm').text(`${crystal_gusd} BUSD`);
                $('.withdraw_fee_confirm').text(`${after_fee_gusd} BUSD`);
                $('.withdraw_balance_busd_confirm').text(`${crystal_gusd - after_fee_gusd} BUSD`);
            }
        }
        else if(e.target.id == "buyConfirmation"){
            let triggerEl = $(e.relatedTarget);
            $("#p_id").val(triggerEl.attr('data-p-id'));
            let camt = triggerEl.attr('data-p-camt');
            let busd = triggerEl.attr('data-p-busd');
            let busd_fee = ((busd * Adm_Fe)/100).toFixed(2);
            let final_busd = (parseFloat(busd) + parseFloat(busd_fee)).toFixed(2);
            $('.buy_crystals').text(camt);
            $('.buy_busd').text(busd);
            $("#ad_fee").val(busd_fee);
            $('.buy_fee_confirm').text(`${busd_fee} BUSD`);
            $('.buy_final_busd').text(`${final_busd}`);
            $('.buy_wallet_address').text("<?=@$userInfo['walletAddress']?>");
        }
    });
    $(window).on('hidden.bs.modal', function (e) {
        if(e.target.id == "withdrawConfirmation"){
            $('.withdraw_crystal_confirm, .withdraw_busd_confirm, .withdraw_fee_confirm, .withdraw_balance_busd_confirm').text("");
        }
        else if(e.target.id == "buyConfirmation"){
            $("#p_id").val("");
            $('.buy_crystals, .buy_busd, .buy_final_busd, .buy_wallet_address').text("");
        }
    });
    $(document).on("click","#crystal_tab a.nav-link", async function(e){
        e.preventDefault();
        let userId = "<?=@$userInfo['_id']?>";
        $("#crystal_tab a.nav-link, #crystal_tab div.tab-pane").removeClass('active');
        let targetDiv = $(this).attr('href');
        $(this).addClass('active');
        $(`#crystal_tab ${targetDiv}`).addClass('active');
        if(targetDiv == "#withdraw"){
            await getWithdrawHistory(1, 10, userId);
        }
        else{
            await getCrystalListings(1, 10);
            await getBuyPackageHistory(1, 10, userId);
        }
    })
    $(document).on("click","[data-action='confirm-buy']", async function(){
        let walletAddress = getCookie("minigameWalletAddress");
        if(typeof walletAddress == "undefinded" || walletAddress == "" || walletAddress == null){            
            showAlert("info", "Connect Metamask First!");
        }
        else{
            let p_id = $("#p_id").val();
            let uWalt = "<?=@$userInfo['walletAddress']?>";
            let userId = "<?=@$userInfo['_id']?>";
            let f_at = $(".buy_final_busd").text();
            let busd_fee = $("#ad_fee").val();
            await buyCrystalPackage(userId, p_id, f_at, busd_fee, uWalt);   
        }
    })
</script>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>