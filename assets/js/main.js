let provider;
const API_BASE_URL = "https://api.piratepets.io/api/v1/";
// const API_BASE_URL = "https://api-dev.piratepets.io/api/v1/";
const showAlert = (errotType, errorMsg) =>{ Swal.fire({ icon: errotType, title: errorMsg, position: 'center', showConfirmButton: false, timer: 1500, showClass: { popup: 'animate__animated animate__fadeInDown' }, hideClass: { popup: 'animate__animated animate__fadeOutUp'} }) }
const currentChainId = async () => { return await provider.request({ method: "eth_chainId" }) }
const ethHexValue = (value) => { return ethers.utils.hexValue(parseInt(value)) }
const copyToolout = () => { document.getElementById("myTooltip").innerHTML = "Copy to clipboard"; }

const copyToolText = () => {
    let walletAddress = getCookie("minigameWalletAddress");
    var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = `Copied: ${walletAddress.slice(0, 8)}...${walletAddress.slice(33)}`;
    navigator.clipboard.writeText(walletAddress);
}

const ajaxCall = async (appUrl, params, method, token) => {
    return await $.ajax({ url: appUrl, type: method, data: params, dataType: "json", async: true, headers: { 'Authorization': token }, error: async (error) => { console.log(error); } });
}

const callHttpRequest = async (appUrl, params, method, token) => {
    let reponse = await ajaxCall(appUrl, params, method, token);
    if(typeof reponse.isInvalidToken == "undefined"){
        return reponse;
    }
    else{
        showAlert("info", "Session Timeout, Please Login.");
        setTimeout(function () {
            $(".login_btn").removeClass("d-none");
            $(".wallet_connect").addClass("d-none");
            $(".user_profile_dd").addClass('d-none');
            deleteCookie('minigameWalletAddress'), deleteCookie('minigameWalletBalance'), deleteCookie('userLogin'), deleteCookie('userInfo'), location.replace(APP_URL);
            location.replace(APP_URL + '/login');
        }, 2000);
    }
}

const ajaxCallImg = async (appUrl, params, method, token) => {
    return await $.ajax({ url: appUrl, processData: false, mimeType: "multipart/form-data", contentType: false, type: method, data: params, dataType: "json", async: true, headers: { 'Authorization': token }, error: async (error) => { console.log(error); } });
}

const callHttpRequestImg = async (appUrl, params, method, token) => {
    let reponse = await ajaxCallImg(appUrl, params, method, token);
    if(typeof reponse.isInvalidToken == "undefined"){
        return reponse;
    }
    else{
        showAlert("info", "Session Timeout, Please Login.");
        setTimeout(function () {
            $(".login_btn").removeClass("d-none");
            $(".wallet_connect").addClass("d-none");
            $(".user_profile_dd").addClass('d-none');
            deleteCookie('minigameWalletAddress'), deleteCookie('minigameWalletBalance'), deleteCookie('userLogin'), deleteCookie('userInfo'), location.replace(APP_URL);
            location.replace(APP_URL + '/login');
        }, 2000);
    }
}

const switchNetwork = async () => {
    provider = await detectEthereumProvider();    
    if (provider) {
        let appUrl = `${API_BASE_URL}setting/view`;
        let response = await callHttpRequest(appUrl, [], "GET", "");
        let networkMode = response.data.blockchainNetworkMode;
        let networkUrls = response.data.blockchain[0].networkUrl;
        let blockchain_setting = $.grep(networkUrls, function(network) { return network.type == networkMode });
            blockchain_setting = blockchain_setting[0];
        let currentChainID = await currentChainId();
        let deployChainID = ethHexValue(blockchain_setting.chainId);
        if (deployChainID !== currentChainID)
            switchResponse = await switchAccount(blockchain_setting);
    }
}

const switchAccount = async (network) => {
    let chainId = ethers.utils.hexValue(parseInt(network.chainId));
    let chainName = network.chainName;
    let rpcUrls = network.url;
    let explorerUrl = network.blockExplorerUrls[0];
    let currencySymbol = network.nativeCurrency.symbol;
    let currencyDecimal = parseInt(network.nativeCurrency.decimals);
    try {
        console.info("Switching Network");
        await provider.request({ method: 'wallet_switchEthereumChain', params: [{ 'chainId': chainId }] });
        console.info("Network Switched Successfully");
        return true;
    }
    catch (switchError) {
        if (switchError.code === 4902) {
            try {
                console.log("This network is not available in your metamask, adding it")
                await provider.request({ method: 'wallet_addEthereumChain', params: [{ "chainId": chainId, "chainName": chainName, "rpcUrls": [rpcUrls], "nativeCurrency": { "symbol": currencySymbol, "decimals": currencyDecimal }, "blockExplorerUrls": [explorerUrl] }] });
                return true;
            }
            catch (addError) {
                console.log(addError);
            }
        }
        else {
            console.log("Failed to switch to the network")
        }
        return false;
    }
}

const getInventoryList = async (collectionName, page) => {
    let walletAddress = getCookie("minigameWalletAddress");
    let userAuth = getCookie("userLogin");
    let data = {
        page: page, limit: 10,
        collectionName: collectionName, current_owner: walletAddress,
        order: 1, orderBy: "_id", price: "", shipsLevelEnd: 49, shipsLevelStart: 1
    };
    let appUrl = `${API_BASE_URL}item/list`;
    let inventory = await callHttpRequest(appUrl, data, "POST", userAuth);
    let html = "";
    let pagination = "";
    if (inventory.totalCount == 0 || inventory.status == 'failure') {
        html = `<div class="no_data">No data found</div>`;
    }
    else {
        html += `<div class="Pirates_here common_market_tab">
                    <div class="parates_list ship_list">
                        <ul>`;
        inventory.data.forEach(element => {
            html += `<li style="cursor: pointer">
                                        <div class="parates_div_main position-relative">
                                            <div class="nft_nameidhere">
                                                <p title="${element.name}">${element.name}</p>
                                            </div>
                                            <img src="${element.image_url}" alt="${element.name}" class="img-fluid level_bg">
                                        </div>
                                    </li>`;
        });
        html += `</ul>
                    </div>
                </div>`;
        pagination = await createPaginationLinks(inventory.totalCount, page, 10, 2);
    }
    $("#pagination").html(pagination);
    $("#inventoryListing").html(html);
}

const createPaginationLinks = async (total, page, limit, links) => {
    let last = Math.ceil(total / limit);
    let start = ((page - links) > 0 ? page - links : 1);
    let end = ((page + links) < last ? page + links : last);
    let lclass = (page == 1 ? "disabled" : "");

    let html = `<li><a class="${lclass}" href="javascript:void(0)" data-page="${(page - 1)}">&laquo;</a></li>`;
    if (start > 1) {
        html += '<li><a href="javascript:void(0)" data-page="1">1</a></li>';
        html += '<li class="disabled"><span>...</span></li>';
    }
    for (let i = start; i <= end; i++) {
        lclass = (page == i ? "active" : "");
        html += `<li><a class="${lclass}" href="javascript:void(0)" data-page="${i}">${i}</a></li>`;
    }
    if (end < last) {
        html += `<li class="disabled"><span>...</span></li>`;
        html += `<li><a href="javascript:void(0)" data-page="${last}">${last}</a></li>`;
    }
    lclass = (page == last ? "disabled" : "");
    html += `<li><a class="${lclass}" href="javascript:void(0)" data-page="${(page + 1)}">&raquo;</a></li>`;
    return html;
}

$(document).on("click", "#connect", async function () {
    if (!window.ethereum || !window.ethereum.isMetaMask) {
        window.open("https://metamask.io/download", "_blank");
    }
    else {
        if (typeof window.ethereum !== "undefined") {
            const [account] = await window.ethereum.request({ method: "eth_requestAccounts" });
            let userAuth = getCookie("userLogin");
            let data = { walletAddress: account };
            let appUrl = `${API_BASE_URL}user/updateProfile`;
            let response = await callHttpRequest(appUrl, data, "POST", userAuth);
            if (response.status == "failure") {
                showAlert("error", response.message);
            }
            else {
                $('.wallet_address').html(`${account.slice(0, 8)}...${account.slice(33)}`);
                $(".wallet_connect").addClass("d-none");
                $(".wallet_address_wrap").removeClass("d-none");
                setCookie("minigameWalletAddress", account, 365);
                checkBalance(account);
            }
        }
    }
});
checkBalance = async (account) => {
    if(typeof account != "undefined"){
        let appUrl = `${API_BASE_URL}setting/view`;
        let response = await callHttpRequest(appUrl, [], "GET", "");
        let networkMode = response.data.blockchainNetworkMode;
        let networkUrls = response.data.blockchain[0].networkUrl;
        let filteredUrl = $.grep(networkUrls, function(network) { return network.type == networkMode });
        const web3 = new Web3(new Web3.providers.HttpProvider(filteredUrl[0].url));
        var balance = parseFloat(web3.utils.fromWei( await web3.eth.getBalance(account) )).toFixed(4);
        // console.log(balance);
        $('.comon-token span.theme-text').html(`${balance}`);
        setCookie("minigameWalletBalance", balance, 365);
    }
}
$(document).on('submit', '#loginForm', async function (event) {
    event.preventDefault();
    let data = $(this).serialize();
    let appUrl = `${API_BASE_URL}user/login`;
    let response = await callHttpRequest(appUrl, data, "POST", "");
    if (response.status === 'success') {
        // console.log(response.data);
        setCookie('userLogin', response.data.Token, 365),location.replace(APP_URL);
        setCookie('userInfo', JSON.stringify({ "_id" : response.data._id, "email" : response.data.email }), 365),location.replace(APP_URL);
    }
    else {
        let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
        showAlert("error", message);
        $('#loginForm').find('input').val('')
    }
});

$(document).on('submit', '#forgot_password', async function (event) {
    event.preventDefault();
    let email = $("#forgot_password #forgot-email").val();
    let data = {"email" : email, "type" : "forgotPassword"};
    let appUrl = `${API_BASE_URL}user/sendEmailVerificationOtp`;
    let response = await callHttpRequest(appUrl, data, "POST", "");
    if (response.status === 'success') {
        showAlert("info", response.message);
        setCookie('encrypt', response.data, 365);
        $('.login_inner').html(`<form class="form_login" id="reset_password">
            <div class="mb-4 mb-3">
                <input name="email" id="exampleEmail" placeholder="Email" type="email" class="form-control" value="${email}">
            </div>
            <div class="mb-4 mb-3">
                <input name="verifyCode" id="exampleVerifyCode" autocomplete="new" placeholder="Email code" type="text" class="form-control">
            </div>
            <div class="position-relative mb-4 mb-3">
                <input name="password" id="examplePassword" autocomplete="new" placeholder="New Password" type="password" class="form-control">
            </div>
            <div class="position-relative mb-4 mb-3">
                <input name="repeatPassword" id="exampleRepeatPassword" placeholder="Repeat Password" type="password" class="form-control">
            </div>
            <div class="login-btn-wrap mt-5">
                <button type="submit" class="btn-form btn btn-secondary">Save</button>
            </div>
        </form>`);
    }
    else {
        let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
        showAlert("error", message);
    }
});

$(document).on('submit','#reset_password', async function(e){
    e.preventDefault();
    let email = $("#reset_password input[name='email']").val();
    let password = $("#reset_password input[name='password']").val();
    let repeat_password = $("#reset_password input[name='repeatPassword']").val();
    let verify_code = $("#reset_password input[name='verifyCode']").val();
    let otpEncryption = getCookie("encrypt");
    let decrypted = CryptoJS.AES.decrypt(otpEncryption, email).toString(CryptoJS.enc.Utf8);
    if(password != repeat_password){
        showAlert("error", "Please enter same password");
    }
    else if(decrypted != verify_code){
        showAlert("error", "OTP not match");
    }
    else{
        let appUrl = `${API_BASE_URL}user/newPassword`;
        let params = { "email" : email, "password" : password, "verify_code" : verify_code };
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if(response.status === 'success') {
            showAlert("success", response.message);
            setTimeout(function () { location.replace(APP_URL + '/login'); }, 2000);
        } else {
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
    }
});


$(document).on("click", ".wallet_disconnect", function () {
    $('.wallet_address').html("");
    $(".wallet_connect").removeClass("d-none");
    $(".wallet_address_wrap").addClass("d-none");
    deleteCookie('minigameWalletAddress'), deleteCookie('minigameWalletBalance'), location.replace(APP_URL);
});

$(document).on("click", "#logout", function () {
    $(".login_btn").removeClass("d-none");
    $(".wallet_connect").addClass("d-none");
    $(".user_profile_dd").addClass('d-none');
    deleteCookie('minigameWalletAddress'), deleteCookie('minigameWalletBalance'), deleteCookie('userLogin'), deleteCookie('userInfo'), location.replace(APP_URL);
});

$(document).on("click", ".recovery_col", function () {
    $(".log-head").html("Forgot Password");
    $('.login_inner').html(`<form class="form_login" id="forgot_password">
                                <div class="mb-4 mb-3">
                                    <input name="email" id="forgot-email" placeholder="Email" type="email" class="form-control" value="${$("#loginForm input[name='email']").val()}">
                                </div>
                                <div class="login-btn-wrap mt-5">
                                    <button type="submit" class="btn-form btn btn-secondary">Send</button>
                                </div>
                                <div class="have_account mt-5 text-center">
                                    <a class="create_account btn btn-secondary" href="${APP_URL}/login">Back</a>
                                </div>
                            </form>`);
});

$(document).on('click', '[data-action="update_profile"]', async function (event) {
    event.preventDefault();
    let data = {};
    let username = $("#profile_form #user_name").val();
        data.username = username;
    let profileImage = $("#profile_form #profileImage").val();
    if(profileImage != "")
        data.profileImage = profileImage;
    let userAuth = getCookie("userLogin");
    let appUrl = `${API_BASE_URL}user/updateProfile`;
    let response = await callHttpRequest(appUrl, data, "POST", userAuth);
    if (response.status === 'success') {
        showAlert("success", response.message);
        setTimeout(function () { location.replace(APP_URL + '/profile'); }, 2000);
    }
    else {
        let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
        showAlert("error", message);
        $('#profile_form').find('input').val('')
    }
});

$(document).on("click", "[data-action='remove-img']", async function (event) {
    event.preventDefault();    
    let userAuth = getCookie("userLogin");
    let profileImage = $("#profile_form #profileImage").val();
    let data = { "profileImage": profileImage };
    let appUrl = `${API_BASE_URL}user/profile/remove`;
    $(".img-text-msg").html("removing ...");
    let response = await callHttpRequest(appUrl, data, "POST", userAuth);
    if (response.status === 'success') {
        showAlert("success", response.message);
        setTimeout(function () { location.replace(APP_URL + '/profile'); }, 2000);
    }
    else {
        let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
        showAlert("error", message);
    }
})

$(document).on("change", "#profile_form #userProfileImg", async function (event) {
    event.preventDefault();
    var file_data = $('#profile_form #userProfileImg').prop('files')[0];
    var form_data = new FormData();
    form_data.append('image', file_data);
    $(".img-text-msg").html("uploading ...");
    let userAuth = getCookie("userLogin");
    let appUrl = `${API_BASE_URL}file/add`;
    let response = await callHttpRequestImg(appUrl, form_data, "POST", userAuth);
    if (response.status == "success") {
        $("#profile_form #profileImage").val(response.data._id);
        $(".user_profile_img").attr("src", response.data.link);
        showAlert("success", response.message);
        $(".img-text-msg").html(`<span data-action="remove-img"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20"><path fill="#fff" d="M8.5 4h3a1.5 1.5 0 0 0-3 0Zm-1 0a2.5 2.5 0 0 1 5 0h5a.5.5 0 0 1 0 1h-1.054l-1.194 10.344A3 3 0 0 1 12.272 18H7.728a3 3 0 0 1-2.98-2.656L3.554 5H2.5a.5.5 0 0 1 0-1h5ZM5.741 15.23A2 2 0 0 0 7.728 17h4.544a2 2 0 0 0 1.987-1.77L15.439 5H4.561l1.18 10.23ZM8.5 7.5A.5.5 0 0 1 9 8v6a.5.5 0 0 1-1 0V8a.5.5 0 0 1 .5-.5ZM12 8a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V8Z"></path></svg></span>`);
    }
    else {
        $(".img-text-msg").html("");
        showAlert("error", response.message);
    }
})


$(document).on("click", '[data-action="reveal-password"]', async function (event) {
    event.preventDefault();
    $(this).addClass('d-none').siblings("svg").removeClass("d-none").siblings("input").removeClass("d-none");
    let passwordInput = $(this).closest(".eye-icon").parent().find("input");
    passwordInput.attr("type", passwordInput.attr("type") === "password" ? "text" : "password");
})


$(document).on("click", "input[name='inventory_tab']", async function () {
    let collectionName = $(this).val();
    await getInventoryList(collectionName, 1);
});

$(document).on("click", 'ul#pagination li a', async function (e) {
    e.preventDefault();
    if ($(this).hasClass('active'))
        return false;
    if ($(this).hasClass('disabled'))
        return false;
    $("ul#pagination li a").removeClass('active');
    $(this).addClass('active');
    await getInventoryList($('input[name="inventory_tab"]:checked').val(), $(this).data('page'));
    $('html, body').animate({ scrollTop: $("#inventoryListing").offset().top }, 1000);
});

$(document).on('submit','#registerForm', async function(e){
    e.preventDefault();
    let email = $("#registerForm input[name='email']").val();
    let username = $("#registerForm input[name='username']").val();
    let password = $("#registerForm input[name='password']").val();
    let repeat_password = $("#registerForm input[name='repeat_password']").val();
    let verify_code = $("#registerForm input[name='verify_code']").val();
    let promo_code = $("#registerForm input[name='promo_code']").val();
    let otpEncryption = getCookie("encrypt");
    let decrypted = CryptoJS.AES.decrypt(otpEncryption, email).toString(CryptoJS.enc.Utf8);
    if(password != repeat_password){
        showAlert("error", "Please enter same password");
    }
    else if(decrypted != verify_code){
        showAlert("error", "OTP not match");
    }
    else{
        let appUrl = `${API_BASE_URL}user/register`;
        let params = { "email" : email, "username" : username, "password" : password, "promoCode" : promo_code };
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if(response.status === 'success') {
            showAlert("success", response.message);
            setTimeout(function () { location.replace(APP_URL + '/login'); }, 2000);
        } else {
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
    }
});

$(document).on('click','#verification-code', async function(e){
    e.preventDefault();
    let appUrl = `${API_BASE_URL}user/sendEmailVerificationOtp`;
    let email = "";
    if($("#change-password #email").length > 0)
        email = $("#change-password #email").val();
    else
        email = $("#registerForm #email").val();
    let params = {'email': email};
    let text = $('#verification-code').html();
    if(text == "Get"){
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if(response.status === 'success') {
            let counter = 60;
            let message = response.message.replace(/\b\w/g, function(match) { return match.toUpperCase(); });
            $(this).after(`<p class="code-msg text-white text-center">The code was successfully sent</p>`);
            showAlert("success", message);
            setCookie('encrypt', response.data, 365);
            setInterval(function() { $(".code-msg").remove() },10000);
            let interval = setInterval(function() {
                counter--;
                if (counter <= 0) {
                    clearInterval(interval),$('#verification-code').html("Get");
                    counter = 60;
                    return;
                }
                else{
                    $('#verification-code').text(`${counter}s`);            
                }
            }, 1000);
        }
        else{
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
    }
});

$(document).on('submit','#change-password', async function(e){
    e.preventDefault();
    let email = $("#change-password input[name='email']").val();
    let oldPassword = $("#change-password input[name='oldPassword']").val();
    let password = $("#change-password input[name='password']").val();
    let repeat_password = $("#change-password input[name='repeat_password']").val();
    let verify_code = $("#change-password input[name='verify_code']").val();
    let otpEncryption = getCookie("encrypt");
    let decrypted = CryptoJS.AES.decrypt(otpEncryption, email).toString(CryptoJS.enc.Utf8);
    if(password != repeat_password){
        showAlert("error", "Please enter same password");
    }
    else if(decrypted != verify_code){
        showAlert("error", "OTP not match");
    }
    else{
        let appUrl = `${API_BASE_URL}user/newPassword`;
        let params = { "email" : email,"oldPassword" : oldPassword, "password" : password, "verify_code" : verify_code };
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if(response.status === 'success') {
            showAlert("success", response.message);
            setTimeout(function () { location.replace(APP_URL + '/profile'); }, 2000);
        } else {
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
    }
});

const timerIncrement = () => {
    idleTimerCheck = 59,idleTimer++;
    if(idleTimer > idleTimerCheck){
        Swal.fire({ title: "In-Activity!", text: "Session Timeout.", icon: 'info', confirmButtonText: 'Ok', allowOutsideClick: false })
        .then((result) => {
            if (result.isConfirmed) {
                $(".login_btn").removeClass("d-none"),$(".user_profile_dd, .wallet_connect").addClass("d-none");
                deleteCookie('minigameWalletAddress'), deleteCookie('minigameWalletBalance'), deleteCookie('userLogin'), deleteCookie('userInfo'), location.replace(APP_URL);
                location.replace(APP_URL + '/login');
            }
        })
    }
}

let idleTimer = 0;
$(document).ready(async function () {
    await switchNetwork();
    let userAuth = getCookie("userLogin");
    let walletAddress = getCookie("minigameWalletAddress");
    await checkBalance(walletAddress);
    let walletBalance = getCookie("minigameWalletBalance");
    // console.log(walletBalance);
    let data = $(this).serialize();
    if(userAuth && userAuth !== null){
        setInterval(timerIncrement, 60000);
        $(this).mousemove(function (e) { idleTimer = 0; });
        $(this).keypress(function (e) { idleTimer = 0; });

        $("#login_btn").addClass("d-none");
        let appUrl = `${API_BASE_URL}user/profile`;
        let response = await callHttpRequest(appUrl, data, "GET", userAuth);
        if (response.status === 'success') {
            if (response.data.profileImage != null)
                $(".user_profile_img").attr("src", response.data.profileImage.link);
            else
                $(".user_profile_img").attr("src", `${APP_URL}/assets/images/profileuser.png`);
            $(".user_profile_img").attr("alt", response.data.username);
            if ($(".user_profile_name").length > 0)
                $(".user_profile_name").text(response.data.username);
            if ($("#profile_form #user_name").length > 0) {
                $("#profile_form #user_name").val(response.data.username);
                if (response.data.profileImage != null) {
                    $("#profile_form #profileImage").val(response.data.profileImage._id);
                    $(".img-text-msg").html(`<span data-action="remove-img"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20"><path fill="#fff" d="M8.5 4h3a1.5 1.5 0 0 0-3 0Zm-1 0a2.5 2.5 0 0 1 5 0h5a.5.5 0 0 1 0 1h-1.054l-1.194 10.344A3 3 0 0 1 12.272 18H7.728a3 3 0 0 1-2.98-2.656L3.554 5H2.5a.5.5 0 0 1 0-1h5ZM5.741 15.23A2 2 0 0 0 7.728 17h4.544a2 2 0 0 0 1.987-1.77L15.439 5H4.561l1.18 10.23ZM8.5 7.5A.5.5 0 0 1 9 8v6a.5.5 0 0 1-1 0V8a.5.5 0 0 1 .5-.5ZM12 8a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V8Z"></path></svg></span>`);
                }
            }
            if ($("#change-password #email").length > 0) {
                $("#change-password #email").val(response.data.email);
            }
            $(".user_profile_email").text(`${response.data.email?.slice(0, 18)}...`);
            if($(".user_profile_email_profile").length > 0)
                $(".user_profile_email_profile").text(response.data.email);
            $(".login_btn").addClass("d-none");
            $(".user_profile_dd").removeClass('d-none');
        }
        else {
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
        if (walletAddress) {
            $('.wallet_address').html(`${walletAddress.slice(0, 8)}...${walletAddress.slice(33)}`);
            $('.comon-token span.theme-text').html(`${walletBalance}`);
            $(".wallet_connect").addClass("d-none");
            $(".wallet_address_wrap").removeClass("d-none");
        }
        else {
            $(".wallet_connect").removeClass("d-none");
            $(".wallet_address_wrap").addClass("d-none");
        }
    }
    else
        $("#login_btn").removeClass("d-none");
});

// cookies
const popup = document.getElementById('cookie-consent-popup');
const saveBtn = document.getElementById('save-cookie-preferences');
// Check if user has set preferences before
if (popup !== null && !getCookie('cookiePreferencesSet')) {
    popup.style.display = 'block';
}
if (saveBtn !== null) {
    saveBtn.addEventListener('click', function() {
        var performanceConsent = document.getElementById('performance-cookies').checked;
        var functionalityConsent = document.getElementById('functionality-cookies').checked;
        var advertisingConsent = document.getElementById('advertising-cookies').checked;
        // Store user preferences in cookies (or other storage)
        setCookie('cookiePreferencesSet', 'true', 365);
        setCookie('performanceConsent', performanceConsent, 365);
        setCookie('functionalityConsent', functionalityConsent, 365);
        setCookie('advertisingConsent', advertisingConsent, 365);
        // Conditionally load third-party scripts based on user preferences
        // Example: if(performanceConsent) { /* load Google Analytics */ }
        popup.style.display = 'none';
    });
}

const setCookie = (name, value, days) => {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

const getCookie = (name) => {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

const deleteCookie = (name) => {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}