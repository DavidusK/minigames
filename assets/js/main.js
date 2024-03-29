let provider;
const API_BASE_URL = "https://api.piratepets.io/api/v1/";
// const API_BASE_URL = "https://api-dev.piratepets.io/api/v1/";
const LAMBDA_BASE_URL = "https://n01g0o3sug.execute-api.eu-north-1.amazonaws.com/dev/";
// const LAMBDA_BASE_URL = "https://h5hjkdsee4.execute-api.eu-north-1.amazonaws.com/test/";
const busdLiveContractAddress = "0xe9e7CEA3DedcA5984780Bafc599bD69ADd087D56";
const busdTestNetContractAddress = "0x3681a42E747794D110a1F1Dad66D3cbac8653422";

const showAlert = (errotType, errorMsg, timer = 1500) => { Swal.fire({ icon: errotType, title: errorMsg, position: 'center', showConfirmButton: false, timer: timer, showClass: { popup: 'animate__animated animate__fadeInDown' }, hideClass: { popup: 'animate__animated animate__fadeOutUp' } }) }
const currentChainId = async () => { return await provider.request({ method: "eth_chainId" }) }
const ethHexValue = (value) => { return ethers.utils.hexValue(parseInt(value)) }
const copyToolout = () => { document.getElementById("myTooltip").innerHTML = "Copy to clipboard"; }
// CHECK DEVICE
const isMobile = () => { let i = !1; return !function (e) { (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(e) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(e.substr(0, 4))) && (i = !0) }(navigator.userAgent || navigator.vendor || window.opera), i };

const copyToolText = () => {
    let walletAddress = getCookie("minigameWalletAddress");
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = `Copied: ${walletAddress.slice(0, 8)}...${walletAddress.slice(33)}`;
    navigator.clipboard.writeText(walletAddress);
}

const ajaxCall = async (appUrl, params, method, token) => {
    // return await $.ajax({ url: appUrl, type: method, data: params, dataType: "json", async: true, headers: { 'Authorization': token }, error: async (error) => { console.log(error); } });
    return await $.ajax({ url: appUrl, type: method, data: params, dataType: "json", async: true, headers: { 'Authorization': token } });
}

const callHttpRequest = async (appUrl, params, method, token) => {
    let reponse = await ajaxCall(appUrl, params, method, token);
    if (typeof reponse.isInvalidToken == "undefined") {
        return reponse;
    }
    else {
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
    if (typeof reponse.isInvalidToken == "undefined") {
        return reponse;
    }
    else {
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



const parseJwt = (token) => {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));
    return JSON.parse(jsonPayload);
}

const switchNetwork = async () => {
    provider = await detectEthereumProvider();
    if (provider) {
        let appUrl = `${API_BASE_URL}setting/view`;
        let response = await callHttpRequest(appUrl, [], "GET", "");
        let networkMode = response.data.blockchainNetworkMode;
        let networkUrls = response.data.blockchain[0].networkUrl;
        let blockchain_setting = $.grep(networkUrls, function (network) { return network.type == networkMode });
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

const levelImg = (item) => {
	if (item?.category_id?.catName === "Ships") {
		if (item.level < 10) {
			return `${APP_URL}/assets/images/lvl1ships.png`;
		}
		else if (item.level >= 10 && item.level < 20) {
			return `${APP_URL}/assets/images/lvl2ships.png`;
		}
		else if (item.level >= 20 && item.level < 30) {
			return `${APP_URL}/assets/images/lvl3ships.png`;
		}
		else if (item.level >= 30 && item.level < 40) {
			return `${APP_URL}/assets/images/lvl4ships.png`;
		}
		else if (item.level >= 40 && item.level < 50) {
			return `${APP_URL}/assets/images/lvl5ships.png`;
		}
	}
	else if (item?.category_id?.catName === "Pirates") {
		if (item.level === 1) {
			return `${APP_URL}/assets/images/lvl1pirates.png`;
		}
		else if (item.level === 2) {
			return `${APP_URL}/assets/images/lvl2pirates.png`;
		}
		else if (item.level === 3) {
			return `${APP_URL}/assets/images/lvl3pirates.png`;
		}
		else if (item.level === 4) {
			return `${APP_URL}/assets/images/lvl4pirates.png`;
		}
		else if (item.level === 5) {
			return `${APP_URL}/assets/images/lvl5pirates.png`;
		}
	}
	else if (item?.category_id?.catName === "Others") {
		return `${APP_URL}/assets/images/lvl1ships.png`;
	}
}

const frameImg = (item) => {
	if (item?.category_id?.catName === "Ships") {
        if (item.level < 10) {
            return `${APP_URL}/assets/images/Framelvl1.png`;
        }
        else if (item.level >= 10 && item.level < 20) {
            return `${APP_URL}/assets/images/Framelvl2.png`;
        }
        else if (item.level >= 20 && item.level < 30) {
            return `${APP_URL}/assets/images/Framelvl3.png`;
        }
        else if (item.level >= 30 && item.level < 40) {
            return `${APP_URL}/assets/images/Framelvl4.png`;
        }
        else if (item.level >= 40 && item.level < 50) {
            return `${APP_URL}/assets/images/Framelvl5.png`;
        }
    }
    else if (item?.category_id?.catName === "Pirates") {
        if (item.level === 1) {
            return `${APP_URL}/assets/images/Framelvl1.png`;
        }
        else if (item.level === 2) {
            return `${APP_URL}/assets/images/Framelvl2.png`;
        }
        else if (item.level === 3) {
            return `${APP_URL}/assets/images/Framelvl3.png`;
        }
        else if (item.level === 4) {
            return `${APP_URL}/assets/images/Framelvl4.png`;
        }
        else if (item.level === 5) {
            return `${APP_URL}/assets/images/Framelvl5.png`;
        }
    }
    else if (item?.category_id?.catName === "Others") {
        return `${APP_URL}/assets/images/Framelvl1.png`;
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
                    // console.log(element)
                    let level = element?.level;
                    let Imgframe = frameImg(element);
                    let ImgframeLvl = levelImg(element);
                    html += `<li style="cursor: pointer">
                                <div class="parates_div_main position-relative" style="background-image: url('${Imgframe}');">
                                    <div class="parates_label" style="background-image: url('${ImgframeLvl}');">
                                        <small>LVL</small><h5>${level}</h5>
                                    </div>
                                    <div class="nft_nameidhere">
                                        <p title="${element.name}">${element.name}</p>
                                    </div>
                                    <img src="${element.media.link}" alt="${element.name}" class="img-fluid level_bg">
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
        if (isMobile()) {
            window.location = 'https://metamask.app.link/dapp/https://mini-games.suffescom.dev';
        }
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
    if (typeof account != "undefined") {
        let appUrl = `${API_BASE_URL}setting/view`;
        let response = await callHttpRequest(appUrl, [], "GET", "");
        let networkMode = response.data.blockchainNetworkMode;
        let networkUrls = response.data.blockchain[0].networkUrl;
        let filteredUrl = $.grep(networkUrls, function (network) { return network.type == networkMode });
        const web3 = new Web3(new Web3.providers.HttpProvider(filteredUrl[0].url));
        // var balance = parseFloat(web3.utils.fromWei( await web3.eth.getBalance(account) )).toFixed(4);
        var balance = parseFloat(web3.utils.fromWei(await web3.eth.getBalance(account)));
        // console.log(balance);
        setCookie("minigameWalletBalance", balance.toString(), 365);
        $('.comon-token span.theme-text').html(`${balance}`);
    }
}

$(document).on('submit', '#loginForm', async function (event) {
    event.preventDefault();
    let btn = $(this).find(':submit');
    let prevText = btn.text();
    btn.text("Please Wait...");
    let data = $(this).serialize();
    let appUrl = `${API_BASE_URL}user/login`;
    let response = await callHttpRequest(appUrl, data, "POST", "");
    if (response.status === 'success') {
        setCookie('userLogin', response.data.Token, 365), location.replace(APP_URL);
        setCookie('userInfo', JSON.stringify({ "_id": response.data._id, "email": response.data.email }), 365), location.replace(APP_URL);
    }
    else {
        let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
        showAlert("error", message);
    }
    btn.text(prevText);
});

$(document).on('submit', '#forgot_password', async function (event) {
    event.preventDefault();
    let email = $("#forgot_password #forgot-email").val();
    let data = { "email": email, "type": "forgotPassword" };
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

$(document).on('submit', '#reset_password', async function (e) {
    e.preventDefault();
    let email = $("#reset_password input[name='email']").val();
    let password = $("#reset_password input[name='password']").val();
    let repeat_password = $("#reset_password input[name='repeatPassword']").val();
    let verify_code = $("#reset_password input[name='verifyCode']").val();
    let otpEncryption = getCookie("encrypt");
    let decrypted = CryptoJS.AES.decrypt(otpEncryption, email).toString(CryptoJS.enc.Utf8);
    if (password != repeat_password) {
        showAlert("error", "Please enter same password");
    }
    else if (decrypted != verify_code) {
        showAlert("error", "OTP not match");
    }
    else {
        let appUrl = `${API_BASE_URL}user/newPassword`;
        let params = { "email": email, "password": password, "verify_code": verify_code };
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if (response.status === 'success') {
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
    let btn = $(this);
    let prevText = btn.text();
    btn.text("Please Wait...");
    let data = {};
    let username = $("#profile_form #user_name").val();
    data.username = username;
    let profileImage = $("#profile_form #profileImage").val();
    if (profileImage != "")
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
    }
    btn.text(prevText);
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

$(document).on('submit', '#registerForm', async function (e) {
    e.preventDefault();
    let email = $("#registerForm input[name='email']").val();
    let username = $("#registerForm input[name='username']").val();
    let password = $("#registerForm input[name='password']").val();
    let repeat_password = $("#registerForm input[name='repeat_password']").val();
    let verify_code = $("#registerForm input[name='verify_code']").val();
    let promo_code = $("#registerForm input[name='promo_code']").val();
    let otpEncryption = getCookie("encrypt");
    let decrypted = CryptoJS.AES.decrypt(otpEncryption, email).toString(CryptoJS.enc.Utf8);
    if (password != repeat_password) {
        showAlert("error", "Please enter same password");
    }
    else if (decrypted != verify_code) {
        showAlert("error", "OTP not match");
    }
    else {
        let appUrl = `${API_BASE_URL}user/register`;
        let params = { "email": email, "username": username, "password": password, "promoCode": promo_code };
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if (response.status === 'success') {
            showAlert("success", response.message);
            setTimeout(function () { location.replace(APP_URL + '/login'); }, 2000);
        } else {
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
    }
});

$(document).on('click', '#verification-code', async function (e) {
    e.preventDefault();
    let appUrl = `${API_BASE_URL}user/sendEmailVerificationOtp`;
    let email = "";
    if ($("#change-password #email").length > 0)
        email = $("#change-password #email").val();
    else
        email = $("#registerForm #email").val();
    let params = { 'email': email };
    let text = $('#verification-code').html();
    if (text == "Get") {
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if (response.status === 'success') {
            let counter = 60;
            let message = response.message.replace(/\b\w/g, function (match) { return match.toUpperCase(); });
            $(this).after(`<p class="code-msg text-white text-center">The code was successfully sent</p>`);
            showAlert("success", message);
            setCookie('encrypt', response.data, 365);
            let interval = setInterval(function () {
                counter--;
                if (counter <= 0) {
                    clearInterval(interval), $('#verification-code').html("Get"), $(".code-msg").remove();
                    counter = 60;
                    return;
                }
                else {
                    $('#verification-code').text(`${counter}s`);
                }
            }, 1000);
        }
        else {
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
    }
});

$(document).on('submit', '#change-password', async function (e) {
    e.preventDefault();
    let email = $("#change-password input[name='email']").val();
    let oldPassword = $("#change-password input[name='oldPassword']").val();
    let password = $("#change-password input[name='password']").val();
    let repeat_password = $("#change-password input[name='repeat_password']").val();
    let verify_code = $("#change-password input[name='verify_code']").val();
    let otpEncryption = getCookie("encrypt");
    let decrypted = CryptoJS.AES.decrypt(otpEncryption, email).toString(CryptoJS.enc.Utf8);
    let btn = $(this).find(':submit');
    let prevText = btn.text();
    btn.text("Please Wait...");
    if (password != repeat_password) {
        showAlert("error", "Please enter same password");
    }
    else if (decrypted != verify_code) {
        showAlert("error", "OTP not match");
    }
    else {
        let appUrl = `${API_BASE_URL}user/newPassword`;
        let params = { "email": email, "oldPassword": oldPassword, "password": password, "verify_code": verify_code };
        let response = await callHttpRequest(appUrl, params, "POST", "");
        if (response.status === 'success') {
            showAlert("success", response.message);
            setTimeout(function () { location.replace(APP_URL + '/profile'); }, 2000);
        } else {
            let message = response.message.replace("_", " ").toLocaleLowerCase().charAt(0).toUpperCase() + response.message.replace("_", " ").toLocaleLowerCase().slice(1);
            showAlert("error", message);
        }
    }
    btn.text(prevText);
});

const timerIncrement = () => {
    idleTimerCheck = 59, idleTimer++;
    if (idleTimer > idleTimerCheck) {
        Swal.fire({ title: "In-Activity!", text: "Session Timeout.", icon: 'info', confirmButtonText: 'Ok', allowOutsideClick: false })
            .then((result) => {
                if (result.isConfirmed) {
                    $(".login_btn").removeClass("d-none"), $(".user_profile_dd, .wallet_connect").addClass("d-none");
                    deleteCookie('minigameWalletAddress'), deleteCookie('minigameWalletBalance'), deleteCookie('userLogin'), deleteCookie('userInfo'), location.replace(APP_URL);
                    location.replace(APP_URL + '/login');
                }
            })
    }
}

let idleTimer = 0;
$(document).ready(async function () {
    let userAuth = getCookie("userLogin");
    if(USER_APP_TOKEN != "" && userAuth == null){
        let detail = await parseJwt(USER_APP_TOKEN);
        setCookie('userLogin', USER_APP_TOKEN, 365);
        setCookie('userInfo', JSON.stringify({ "_id": detail._id, "email": detail.email }), 365);
        userAuth = USER_APP_TOKEN;
    }
    if (userAuth && userAuth !== null) {
        let walletAddress = getCookie("minigameWalletAddress");
        if (walletAddress)
            await switchNetwork();
        await checkBalance(walletAddress);
        let walletBalance = getCookie("minigameWalletBalance");
        // console.log(walletBalance);
        let data = $(this).serialize();

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
            if ($(".user_profile_email_profile").length > 0)
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
    saveBtn.addEventListener('click', function () {
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
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

// Crystals Withdraw Flow
const getCrystalSettings = async (user_id) => {
    let token = getCookie("userLogin");
    let appUrl = `${API_BASE_URL}setting/view`;
    let response = await callHttpRequest(appUrl, [], "GET", token);

    appUrl = `${LAMBDA_BASE_URL}get-balance`;
    let params = { "user_id": user_id };
    let balance = await callHttpRequest(appUrl, JSON.stringify(params), "POST", token);

    return {
        "crystalConversionRate": response.data.minigameSetting.crystalConversionRate,
        "crystalCommission": response.data.minigameSetting.crystalCommission,
        "adminWalletAddress": response.data.minigameSetting.adminWalletAddress,
        "userBalance": balance.data.amount
    };
}

const createWithdrawRequest = async (crystalAmount, user_id) => {
    let token = getCookie("userLogin");
    let params = { "crystalAmount": crystalAmount, "user_id": user_id };
    let appUrl = `${LAMBDA_BASE_URL}withdraw-create`;
    // console.log(response);
    return await callHttpRequest(appUrl, JSON.stringify(params), "POST", token);
}

const getWithdrawHistory = async (page, limit, user_id) => {
    $("#withdraw_history tbody").html(`<tr><td colspan="6" class="text-center"><div class="spinner-border" role="status"><span class="sr-only"></span></div></td></tr>`);
    let token = getCookie("userLogin");
    let params = { "page": page, "limit": limit, "user_id": user_id };
    let appUrl = `${LAMBDA_BASE_URL}withdraw-list`;
    let response = await callHttpRequest(appUrl, JSON.stringify(params), "POST", token);
    // console.log(response);
    let history = "";
    if (response.status == "success") {
        let records = response.data;
        if (records.length > 0) {
            records.forEach(function (record, index) {
                // console.log(record);
                let dateTime = new Date(record.date_created_utc);
                let date = dateTime.toLocaleString().split(",")[0].trim();
                let time = dateTime.toLocaleString().split(",")[1].trim();
                history += `<tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="table_dimond">
                                <img src="${APP_URL}/assets/images/diamond.png" class="img-fluid" />
                            </div>${record.crystalAmount}
                        </div>
                    </td>
                    <td class="mobile_address_td">
                        <p class="mobile_address">${record.walletAddress}</p>
                    </td>
                    <td class="desktop_adrees">
                        <p class="buy_his_add">${record.walletAddress}</p>
                    </td>
                    <td class='text-uppercase'>${date}</td>
                    <td class='text-uppercase'>${time}</td>
                    <td>
                        <button class="btn_history_show">
                            <span class="text-capitalize his-${record.status == "pending" ? 'rejected' : 'confirmed'}">${record.status}</span>
                        </button>
                    </td>
                </tr>`;
                // <td>
                //     <div class="d-flex align-items-center gap-2">
                //         <div class="table_dimond">
                //             <img src="${APP_URL}/assets/images/busd_icon.png" class="img-fluid" />
                //         </div>${parseFloat(record.busdAmount) - parseFloat(record.fee)}
                //     </div>
                // </td>
                // <td>
                //     <div class="d-flex align-items-center gap-2">
                //         <div class="table_dimond">
                //             <img src="${APP_URL}/assets/images/busd_icon.png" class="img-fluid" />
                //         </div>${record.busdAmount}
                //     </div>
                // </td>
                // <td>
                //     <div class="d-flex align-items-center gap-2">
                //         <div class="table_dimond">
                //             <img src="${APP_URL}/assets/images/busd_icon.png" class="img-fluid" />
                //         </div>${record.fee}
                //     </div>
                // </td>
                // <td>
                //     <div class="d-flex align-items-center gap-2">
                //         <div class="table_dimond">
                //             <img src="${APP_URL}/assets/images/busd_icon.png" class="img-fluid" />
                //         </div>${record.receivableAmount}
                //     </div>
                // </td>
            });
        }
        else {
            history += `<tr><td class="text-center" colspan="6">No History Found</td></tr>`;
        }
    }
    $("#withdraw_history tbody").html(history);
}

// Crystals Buy Flow
const getCrystalListings = async (page, limit) => {
    let token = getCookie("userLogin");
    let appUrl = `${LAMBDA_BASE_URL}package-list`;
    let params = { "page": page, "limit": limit, "order": 1 };
    let response = await callHttpRequest(appUrl, JSON.stringify(params), "POST", token);
    // console.log(response);
    let listing = "";
    if (response.status == "success") {
        let records = response.data;
        if (records.length > 0) {
            records.forEach(function (record, index) {
                listing += `<li>
                    <div class='buy_card_wrap'>
                        <div class='buy_cardimgwrap'>
                            <div class='imgcard-wrap'>
                                <img src='${record.image}' alt='${record._id}' class='img-fluid' />
                            </div>
                            <div class='crystal_wrap d-flex align-items-center justify-content-center gap-2'>
                                <div class='buy_diamond'>
                                    <img src='${APP_URL}/assets/images/diamond.png' alt='${record._id}' class='img-fluid' />
                                </div>
                                <p class='crystals_items'>${record.crystalAmount}$</p>
                            </div>
                        </div>
                        <div class='buy_btns_twos d-flex align-items-center justify-content-center gap-2 mt-3'>
                            <button class='btn_green'>
                                <div class='btn_icon me-2'>
                                    <img src='${APP_URL}/assets/images/busd_icon.png' alt='${record._id}' class='img-fluid' />
                                </div>
                                ${record.busdAmount}
                            </button>
                            <button type='button' data-bs-toggle='modal' data-bs-target='#buyConfirmation' class='btn_blue'
                            data-p-id='${record._id}' data-p-busd='${record.busdAmount}' data-p-camt='${record.crystalAmount}'>Buy</button>
                        </div>
                    </div>
                </li>`;
            });
        }
        else {
            listing += `<li>No Items Found</li>`;
        }
    }
    else {
        listing += `<li>No Items Found</li>`;
    }
    
    $("#buy-crystal-listing").html(listing);
    
}

const getBuyPackageHistory = async (page, limit, user_id) => {
    $("#buy_history tbody").html(`<tr><td colspan="6" class="text-center"><div class="spinner-border" role="status"><span class="sr-only"></span></div></td></tr>`);
    let token = getCookie("userLogin");
    let params = { "page": page, "limit": limit, "user_id": user_id };
    let appUrl = `${LAMBDA_BASE_URL}package-purchase-history`;
    let response = await callHttpRequest(appUrl, JSON.stringify(params), "POST", token);
    // console.log(response);
    let history = "";
    if (response.status == "success") {
        let records = response.data;
        if (records.length > 0) {
            records.forEach(function (record, index) {
                // console.log(record);
                let dateTime = new Date(record.date_created_utc);
                let date = dateTime.toLocaleString().split(",")[0].trim();
                let time = dateTime.toLocaleString().split(",")[1].trim();
                history += `<tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="table_dimond">
                                <img src="${APP_URL}/assets/images/diamond.png" class="img-fluid" />
                            </div>${record.crystalAmount}
                        </div>
                    </td>
                    <td class="mobile_address_td">
                        <p class="mobile_address">${record.walletAddress}</p>
                    </td>
                    <td class="desktop_adrees">
                        <p class="buy_his_add">${record.walletAddress}</p>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="table_dimond">
                                <img src="${APP_URL}/assets/images/busd_icon.png" class="img-fluid" />
                            </div>${parseFloat(record.busdAmount) + parseFloat(record.adminCommission)}
                        </div>
                    </td>           
                    <td class='text-uppercase'>${date}</td>
                    <td class='text-uppercase'>${time}</td>
                    <td>
                        <button class="btn_history_show">
                            <span class="text-capitalize his-confirmed">${record.status}</span>
                        </button>
                    </td>
                </tr>`;
                // <td>
                //     <div class="d-flex align-items-center gap-2">
                //         <div class="table_dimond">
                //             <img src="${APP_URL}/assets/images/busd_icon.png" class="img-fluid" />
                //         </div>${record.adminCommission}
                //     </div>
                // </td>
                // <td>
                //     <div class="d-flex align-items-center gap-2">
                //         <div class="table_dimond">
                //             <img src="${APP_URL}/assets/images/busd_icon.png" class="img-fluid" />
                //         </div>${record.totalPaid}
                //     </div>
                // </td>
            });
        }
        else {
            history += `<tr><td class="text-center" colspan="6">No History Found</td></tr>`;
        }
    }
    $("#buy_history tbody").html(history);
}

// eth Parse Units
const ethParseUnits = (value) => {
    if (typeof value != "undefined")
        return ethers.utils.parseUnits(value.toString()).toString()
}
// eth Hex Value
const WeitoEthValue = (value) => { return ethers.utils.formatEther(value) }

const buyCrystalPackage = async (userId, p_id, amount, adminCommission, walletAddress) => {
    let prevText  = $(".confirm-buy-confirm").text();
    $(".confirm-buy-cancel, .confirm-buy-confirm").attr('disabled',true);
    $(".confirm-buy-confirm").text("Please Wait");
    try {
        await switchNetwork();
        let settings = await getCrystalSettings(userId);
        let adminWalletAddress = settings.adminWalletAddress;
        let appUrl = `${API_BASE_URL}setting/view`;
        let response = await callHttpRequest(appUrl, [], "GET", "");
        let networkMode = response.data.blockchainNetworkMode;
        let busdabi = await callHttpRequest(`assets/js/abi.json`, '', "GET", '');

        let provider = new ethers.providers.Web3Provider(window.ethereum);
        let signer = await provider.getSigner(walletAddress);

        let contract = await new ethers.Contract(networkMode == "testnet" ? busdTestNetContractAddress : busdLiveContractAddress, busdabi, signer);
        let isConformed = await contract.increaseAllowance(walletAddress, ethParseUnits(amount));
        let isConformedreceipt = await isConformed.wait();
        
        if (isConformedreceipt.status == 1) {
            const transaction = await contract.transferFrom( walletAddress, adminWalletAddress, ethParseUnits(amount), { gasLimit: "3000000" });
            const receipt = await transaction.wait();
            // console.log(receipt);
            // Save Response to API
            let settings = await getCrystalSettings(userId);
            let token = getCookie("userLogin");
            let params = { "packageId": p_id, "walletAddress": walletAddress, "adminCommission": adminCommission, "transactionHash": receipt.transactionHash };
            let appUrl = `${LAMBDA_BASE_URL}package-buy`;
            let response = await callHttpRequest(appUrl, JSON.stringify(params), "POST", token);
            // console.log(response);
            if(response.status == "success"){
                $("#buyConfirmation").modal("hide");
                showAlert("success", response.message, 5000);
                await getCrystalListings(1, 10);
                await getBuyPackageHistory(1, 10, userId);
            }
            else{
                showAlert("error", response.message, 5000);
            }
        }
        else {
            showAlert("error", "increaseAllowance failed", 5000);
        }
    }
    catch (error){
        if(error?.code == "ACTION_REJECTED")
            showAlert("error", "Transaction has been rejected", 5000);
        else
            // console.log("error", error)
            showAlert("error", error.message, 5000);
    }
    $(".confirm-buy-confirm").text(prevText);
    $(".confirm-buy-cancel, .confirm-buy-confirm").attr('disabled',false);
}

const validateNumber = (evt) => {
    var theEvent = evt || window.event;    
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    }
    else {
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault)
            theEvent.preventDefault();
    }
}