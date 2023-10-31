<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=@APP_URL?>/assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css " rel="stylesheet">    
    <link href="<?=@APP_URL?>/assets/css/style.css?v=<?=@rand()?>" rel="stylesheet">
    <link href="<?=@APP_URL?>/assets/css/crystal.css?v=<?=@rand()?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Piratepets - The NFT GAME</title>
</head>
<body>
    <section class="header-main">
        <div class="custom_container">
            <div id="header">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid p-0">
                        <a class="navbar-brand" href="<?=@APP_URL?>">
                            <img src="<?=@APP_URL?>/assets/images/logo.png" alt="logo" class="img-fluid logodesktop">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav scroll-menu ms-auto mb-2 mb-lg-0">
                                <button type="button" class="close-menu btn btn-primary">
                                    <svg aria-hidden="true" role="img" class="iconify iconify--gg" width="28" height="28" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                        <path fill="#fff" d="M6.225 4.811a1 1 0 0 0-1.414 1.414L10.586 12L4.81 17.775a1 1 0 1 0 1.414 1.414L12 13.414l5.775 5.775a1 1 0 0 0 1.414-1.414L13.414 12l5.775-5.775a1 1 0 0 0-1.414-1.414L12 10.586L6.225 4.81Z"></path>
                                    </svg>
                                </button>
                                <li class="nav-item marketplaceLink">
                                    <a target="blank" href="https://marketplace.piratepets.io">Marketplace</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="add-wallet-wrap">
                    <div class="wallet-section">
                        <ul class="connect_navbar-nav">
                            <!-- Login -->    
                            <li class="nav-item login_btn <?=@(isset($_COOKIE['userLogin']) && $_COOKIE['userLogin'] != "" ? "d-none" : "")?>">
                                <a class="connet_wallet" href="<?=@APP_URL?>/login">Login</a>
                            </li>
                            <!-- Connect Wallet -->
                            <li class="nav-item wallet_connect <?=@(!isset($_COOKIE['userLogin']) && $_COOKIE['userLogin'] == "" ? "d-none" : (isset($_COOKIE['minigameWalletAddress']) && $_COOKIE['minigameWalletAddress'] != "" ? "d-none" : ""))?>">
                                <a class="connect-metamask" id="connect" href="javascript:;">
                                    <div class="connet_wallet">
                                        Connect
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25.14" height="25" viewBox="0 0 256 240">
                                                <path fill="#E17726" d="M250.066 0L140.219 81.279l20.427-47.9z"></path>
                                                <path fill="#E27625" d="m6.191.096l89.181 33.289l19.396 48.528zM205.86 172.858l48.551.924l-16.968 57.642l-59.243-16.311zm-155.721 0l27.557 42.255l-59.143 16.312l-16.865-57.643z"></path>
                                                <path fill="#E27625" d="m112.131 69.552l1.984 64.083l-59.371-2.701l16.888-25.478l.214-.245zm31.123-.715l40.9 36.376l.212.244l16.888 25.478l-59.358 2.7zM79.435 173.044l32.418 25.259l-37.658 18.181zm97.136-.004l5.131 43.445l-37.553-18.184z"></path>
                                                <path fill="#D5BFB2" d="m144.978 195.922l38.107 18.452l-35.447 16.846l.368-11.134zm-33.967.008l-2.909 23.974l.239 11.303l-35.53-16.833z"></path>
                                                <path fill="#233447" d="m100.007 141.999l9.958 20.928l-33.903-9.932zm55.985.002l24.058 10.994l-34.014 9.929z"></path>
                                                <path fill="#CC6228" d="m82.026 172.83l-5.48 45.04l-29.373-44.055zm91.95.001l34.854.984l-29.483 44.057zm28.136-44.444l-25.365 25.851l-19.557-8.937l-9.363 19.684l-6.138-33.849zm-148.237 0l60.435 2.749l-6.139 33.849l-9.365-19.681l-19.453 8.935z"></path>
                                                <path fill="#E27525" d="m52.166 123.082l28.698 29.121l.994 28.749zm151.697-.052l-29.746 57.973l1.12-28.8zm-90.956 1.826l1.155 7.27l2.854 18.111l-1.835 55.625l-8.675-44.685l-.003-.462zm30.171-.101l6.521 35.96l-.003.462l-8.697 44.797l-.344-11.205l-1.357-44.862z"></path>
                                                <path fill="#F5841F" d="m177.788 151.046l-.971 24.978l-30.274 23.587l-6.12-4.324l6.86-35.335zm-99.471 0l30.399 8.906l6.86 35.335l-6.12 4.324l-30.275-23.589z"></path>
                                                <path fill="#C0AC9D" d="m67.018 208.858l38.732 18.352l-.164-7.837l3.241-2.845h38.334l3.358 2.835l-.248 7.831l38.487-18.29l-18.728 15.476l-22.645 15.553h-38.869l-22.63-15.617z"></path>
                                                <path fill="#161616" d="m142.204 193.479l5.476 3.869l3.209 25.604l-4.644-3.921h-36.476l-4.556 4l3.104-25.681l5.478-3.871z"></path>
                                                <path fill="#763E1A" d="M242.814 2.25L256 41.807l-8.235 39.997l5.864 4.523l-7.935 6.054l5.964 4.606l-7.897 7.191l4.848 3.511l-12.866 15.026l-52.77-15.365l-.457-.245l-38.027-32.078zm-229.628 0l98.326 72.777l-38.028 32.078l-.457.245l-52.77 15.365l-12.866-15.026l4.844-3.508l-7.892-7.194l5.952-4.601l-8.054-6.071l6.085-4.526L0 41.809z"></path>
                                                <path fill="#F5841F" d="m180.392 103.99l55.913 16.279l18.165 55.986h-47.924l-33.02.416l24.014-46.808zm-104.784 0l-17.151 25.873l24.017 46.808l-33.005-.416H1.631l18.063-55.985zm87.776-70.878l-15.639 42.239l-3.319 57.06l-1.27 17.885l-.101 45.688h-30.111l-.098-45.602l-1.274-17.986l-3.32-57.045l-15.637-42.239z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="desktop_user">
                            <!-- Wallet Address -->
                            <div class="dropdown wallet_address_wrap <?=@(isset($_COOKIE['minigameWalletAddress']) && $_COOKIE['minigameWalletAddress'] != "" ? "" : "d-none")?> d-flex">
                                <a href="<?=@APP_URL?>/send-recieve">
                                    <div class="comon-token">
                                        <img src="<?=@APP_URL?>/assets/images/bnb_icon.png" alt="" class="img-fluid">
                                        <p>BNB <span class="theme-text"><?=@$_COOKIE['minigameWalletBalance']?></span></p>
                                    </div>
                                </a>
                                <button type="button" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="wallet_adress me-3 position-relative btn btn-secondary">
                                    <?php
                                        $account = isset($_COOKIE['minigameWalletAddress']) ? $_COOKIE['minigameWalletAddress'] : null;
                                        if (!is_null($account) && strlen($account) >= 34) {
                                            $slicedAccount = substr($account, 0, 8) . '...' . substr($account, 33);
                                        }
                                    ?>
                                    <p class="wallet_address m-0"><?=@$slicedAccount?></p>
                                    <div class="arrow-down">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 10 10" fill="none">
                                            <path d="M3.75 1.87549L6.875 5.00049L3.75 8.12549" stroke="#fff" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="dropdown-menu">
                                    <button tabindex="0" role="menuitem" class="btnbottom position-relative dropdown-item">
                                        <a class="inventory-link wallet_disconnect" href="<?=@APP_URL?>">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 256 240">
                                                    <path fill="#E17726" d="M250.066 0L140.219 81.279l20.427-47.9z"></path>
                                                    <path fill="#E27625" d="m6.191.096l89.181 33.289l19.396 48.528zM205.86 172.858l48.551.924l-16.968 57.642l-59.243-16.311zm-155.721 0l27.557 42.255l-59.143 16.312l-16.865-57.643z"></path>
                                                    <path fill="#E27625" d="m112.131 69.552l1.984 64.083l-59.371-2.701l16.888-25.478l.214-.245zm31.123-.715l40.9 36.376l.212.244l16.888 25.478l-59.358 2.7zM79.435 173.044l32.418 25.259l-37.658 18.181zm97.136-.004l5.131 43.445l-37.553-18.184z"></path>
                                                    <path fill="#D5BFB2" d="m144.978 195.922l38.107 18.452l-35.447 16.846l.368-11.134zm-33.967.008l-2.909 23.974l.239 11.303l-35.53-16.833z"></path>
                                                    <path fill="#233447" d="m100.007 141.999l9.958 20.928l-33.903-9.932zm55.985.002l24.058 10.994l-34.014 9.929z"></path>
                                                    <path fill="#CC6228" d="m82.026 172.83l-5.48 45.04l-29.373-44.055zm91.95.001l34.854.984l-29.483 44.057zm28.136-44.444l-25.365 25.851l-19.557-8.937l-9.363 19.684l-6.138-33.849zm-148.237 0l60.435 2.749l-6.139 33.849l-9.365-19.681l-19.453 8.935z"></path>
                                                    <path fill="#E27525" d="m52.166 123.082l28.698 29.121l.994 28.749zm151.697-.052l-29.746 57.973l1.12-28.8zm-90.956 1.826l1.155 7.27l2.854 18.111l-1.835 55.625l-8.675-44.685l-.003-.462zm30.171-.101l6.521 35.96l-.003.462l-8.697 44.797l-.344-11.205l-1.357-44.862z"></path>
                                                    <path fill="#F5841F" d="m177.788 151.046l-.971 24.978l-30.274 23.587l-6.12-4.324l6.86-35.335zm-99.471 0l30.399 8.906l6.86 35.335l-6.12 4.324l-30.275-23.589z"></path>
                                                    <path fill="#C0AC9D" d="m67.018 208.858l38.732 18.352l-.164-7.837l3.241-2.845h38.334l3.358 2.835l-.248 7.831l38.487-18.29l-18.728 15.476l-22.645 15.553h-38.869l-22.63-15.617z"></path>
                                                    <path fill="#161616" d="m142.204 193.479l5.476 3.869l3.209 25.604l-4.644-3.921h-36.476l-4.556 4l3.104-25.681l5.478-3.871z"></path>
                                                    <path fill="#763E1A" d="M242.814 2.25L256 41.807l-8.235 39.997l5.864 4.523l-7.935 6.054l5.964 4.606l-7.897 7.191l4.848 3.511l-12.866 15.026l-52.77-15.365l-.457-.245l-38.027-32.078zm-229.628 0l98.326 72.777l-38.028 32.078l-.457.245l-52.77 15.365l-12.866-15.026l4.844-3.508l-7.892-7.194l5.952-4.601l-8.054-6.071l6.085-4.526L0 41.809z"></path>
                                                    <path fill="#F5841F" d="m180.392 103.99l55.913 16.279l18.165 55.986h-47.924l-33.02.416l24.014-46.808zm-104.784 0l-17.151 25.873l24.017 46.808l-33.005-.416H1.631l18.063-55.985zm87.776-70.878l-15.639 42.239l-3.319 57.06l-1.27 17.885l-.101 45.688h-30.111l-.098-45.602l-1.274-17.986l-3.32-57.045l-15.637-42.239z"></path>
                                                </svg>
                                            </span>Disconnect Metamask
                                        </a>
                                    </button>
                                </div>
                            </div>
                            <!-- Profile Section -->
                            <div class="dropdown user_profile_dd <?=@(isset($_COOKIE['userLogin']) && $_COOKIE['userLogin'] != "" ? "" : "d-none")?>">
                                <button type="button" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="btn_user btn btn-secondary">
                                    <?php if(@$userInfo['profileImage'] != ""): ?>
                                        <img src="<?=@$userInfo['profileImage']['link']?>" alt="<?=@$userInfo['username']?>" class="user_profile_img img-fluid">
                                    <?php else: ?>
                                        <img src="<?=@APP_URL?>/assets/images/profileuser.png" alt="<?=@$userInfo['username']?>" class="user_profile_img img-fluid">
                                    <?php endif ?>
                                </button>
                                <div class="dropdown-menu">
                                    <button tabindex="0" role="menuitem" class="dropdown-item">
                                        <a href="<?=@APP_URL?>/profile">
                                            <span class="user_profile_name"><?=@$userInfo['username']?></span>
                                            <div style="top: -7px;right: -10px;position: absolute;">
                                                <?php if(@$userInfo['profileImage'] != ""): ?>
                                                    <img src="<?=@$userInfo['profileImage']['link']?>" alt="<?=@$userInfo['username']?>" class="user_profile_img img-fluid">
                                                <?php else: ?>
                                                    <img src="<?=@APP_URL?>/assets/images/profileuser.png" alt="<?=@$userInfo['username']?>" class="user_profile_img img-fluid">
                                                <?php endif ?>
                                            </div>
                                        </a>
                                    </button>
                                    <button tabindex="0" role="menuitem" class="btnbottom position-relative dropdown-item">
                                        <a class="inventory-link" href="<?=@APP_URL?>/profile">Profile</a>
                                        <div class="arrow_inv">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 10 10" fill="none">
                                                <path d="M3.75 1.87549L6.875 5.00049L3.75 8.12549" stroke="#8DBDF1" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <button tabindex="0" role="menuitem" class="btnbottom position-relative dropdown-item">
                                        <a class="inventory-link" href="<?=@APP_URL?>/inventory">Inventory</a>
                                        <div class="arrow_inv">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 10 10" fill="none">
                                                <path d="M3.75 1.87549L6.875 5.00049L3.75 8.12549" stroke="#8DBDF1" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <button tabindex="0" role="menuitem" class="btnbottom position-relative dropdown-item">
                                        <a href="<?=@APP_URL?>/crystals">
                                            <div class="dimoond_icon">
                                                <img src="<?=@APP_URL?>/assets/images/diamond.png" alt="Crystals" class="img-fluid">
                                            </div>Crystals
                                        </a>
                                        <div class="arrow_inv">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 10 10" fill="none">
                                                <path d="M3.75 1.87549L6.875 5.00049L3.75 8.12549" stroke="#8195D6" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round" ></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <button tabindex="0" role="menuitem" class="btnbottom position-relative dropdown-item">
                                        <a class="inventory-link" href="<?=@APP_URL?>/wallet">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 100 100" fill="none">
                                                <g clip-path="url(#clip0_497_9)">
                                                    <path d="M49.9996 98.9903C77.0567 98.9903 98.9908 77.0562 98.9908 49.9991C98.9908 22.9419 77.0567 1.00781 49.9996 1.00781C22.9424 1.00781 1.0083 22.9419 1.0083 49.9991C1.0083 77.0562 22.9424 98.9903 49.9996 98.9903Z" fill="#122243"></path>
                                                    <path d="M50.0008 95.8902C24.6956 95.8902 4.1084 75.3029 4.1084 49.9978C4.1084 24.6927 24.6956 4.10547 50.0008 4.10547C75.3059 4.10547 95.8931 24.6927 95.8931 49.9978C95.8919 75.3029 75.3046 95.8902 50.0008 95.8902Z" fill="url(#paint0_linear_497_9)"></path>
                                                    <path d="M50.0006 100C22.4297 100 0 77.5703 0 50.0006C0 22.4297 22.4297 0 50.0006 0C77.5703 0 100 22.4297 100 50.0006C100 77.5703 77.5703 100 50.0006 100ZM50.0006 1.36445C23.1833 1.36445 1.3657 23.1821 1.3657 49.9994C1.3657 76.8167 23.1833 98.6343 50.0006 98.6343C76.8179 98.6343 98.6355 76.8167 98.6355 49.9994C98.6355 23.1821 76.8179 1.36445 50.0006 1.36445Z" fill="url(#paint1_linear_497_9)"></path>
                                                    <path d="M40.6333 52.5837L59.362 41.2658V13.2814L59.3669 10.4818H59.362C58.4631 10.2645 57.5555 10.082 56.6393 9.933V39.7288L43.3572 47.7566V32.2447L48.64 29.0503V33.67C47.5611 34.1816 46.8137 35.2766 46.8137 36.5492C46.8137 38.3097 48.2415 39.7375 50.002 39.7375C51.7625 39.7375 53.1903 38.3097 53.1903 36.5492C53.1903 35.2766 52.4428 34.1803 51.3639 33.67V9.41403C50.9095 9.39541 50.4564 9.38672 50.002 9.38672C49.5476 9.38672 49.0944 9.39541 48.64 9.41403V25.8732L40.6345 30.7102V52.5837H40.6333Z" fill="#122142"></path>
                                                    <path d="M35.3565 29.7119C36.4354 29.2004 37.1828 28.1054 37.1828 26.8328C37.1828 25.0723 35.7551 23.6445 33.9945 23.6445C32.234 23.6445 30.8063 25.0723 30.8063 26.8328C30.8063 28.1054 31.5537 29.2017 32.6326 29.7119V44.9022L10.4338 58.3208L10.2612 58.4251C10.3159 58.6833 10.3742 58.9428 10.4338 59.1961C10.6424 60.1223 10.8919 61.0385 11.1688 61.9374C14.8313 73.8401 23.8251 83.4285 35.3565 87.8943V86.9594V84.963V56.7217C36.4354 56.2102 37.1828 55.1151 37.1828 53.8426C37.1828 52.082 35.7551 50.6543 33.9945 50.6543C32.234 50.6543 30.8063 52.082 30.8063 53.8426C30.8063 55.1151 31.5537 56.2114 32.6326 56.7217V83.688C23.47 78.9416 16.4776 70.5686 13.5737 60.4811C13.5017 60.2315 13.4334 59.982 13.3651 59.7324L35.3565 46.4368V29.7119Z" fill="#122142"></path>
                                                    <path d="M43.3558 9.93359V22.8804L40.6331 24.5279V13.2833C24.9003 17.2984 13.0746 31.1851 12.1621 47.9211L24.6321 40.3837V34.207L27.3548 32.5595V41.917L9.53872 52.6861C9.44312 51.6693 9.39346 50.6438 9.38477 49.6046V49.5996C9.571 30.6078 22.8629 14.6887 40.6331 10.4824C41.527 10.2651 42.4358 10.0838 43.3558 9.93359Z" fill="#122142"></path>
                                                    <path d="M64.6432 70.3074C63.5643 70.8189 62.8169 71.9139 62.8169 73.1865C62.8169 74.947 64.2447 76.3748 66.0052 76.3748C67.7657 76.3748 69.1935 74.947 69.1935 73.1865C69.1935 71.9139 68.446 70.8176 67.3671 70.3074V55.1208L89.7385 41.5942C87.0928 29.0696 78.6528 18.6555 67.3659 13.2958C66.477 12.8687 65.5694 12.4788 64.6432 12.125V43.2976C63.5643 43.8091 62.8169 44.9042 62.8169 46.1768C62.8169 47.9373 64.2447 49.365 66.0052 49.365C67.7657 49.365 69.1935 47.9373 69.1935 46.1768C69.1935 44.9042 68.446 43.8079 67.3671 43.2976V16.3313C76.7557 21.192 83.8672 29.8679 86.6346 40.2919L64.6432 53.5875V70.3074Z" fill="#122142"></path>
                                                    <path d="M90.6151 50.3889V50.4212C90.4289 69.4168 77.1332 85.3321 59.3667 89.5384C58.4728 89.7557 57.5603 89.9382 56.644 90.0872V77.1317L59.3667 75.4842V86.7388C75.0996 82.7224 86.9252 68.8407 87.8378 52.101L75.3677 59.6384V65.8014L72.645 67.4489V58.1051L87.8477 48.9152L90.4612 47.3359C90.5555 48.3428 90.6052 49.3584 90.6151 50.3889Z" fill="#122142"></path>
                                                    <path d="M59.3669 47.4336L40.6383 58.7515L40.6333 89.5368C41.5322 89.7503 42.4397 89.9365 43.361 90.0855V60.2898L56.643 52.2619V67.7676L51.3602 70.9583V66.4391C52.4391 65.9276 53.1865 64.8326 53.1865 63.56C53.1865 61.7995 51.7588 60.3717 49.9983 60.3717C48.2377 60.3717 46.81 61.7995 46.81 63.56C46.81 64.8326 47.5574 65.9288 48.6363 66.4391V90.6033C49.0907 90.6219 49.5438 90.6306 49.9983 90.6306C50.4527 90.6306 50.9058 90.6219 51.3602 90.6033V74.1479L59.3657 69.3108V47.4336H59.3669Z" fill="#122142"></path>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_497_9" x1="101.015" y1="18.9816" x2="-1.9832" y2="81.6043" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#6FBBB4"></stop>
                                                        <stop offset="0.4621" stop-color="#37A7A5"></stop>
                                                        <stop offset="1" stop-color="#46C7A8"></stop>
                                                    </linearGradient>
                                                    <linearGradient id="paint1_linear_497_9" x1="111.439" y1="13.1363" x2="26.7556" y2="63.9466" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#509E89"></stop>
                                                        <stop offset="0.5" stop-color="#436874"></stop>
                                                        <stop offset="1" stop-color="#365666"></stop>
                                                    </linearGradient>
                                                    <clipPath id="clip0_497_9">
                                                        <rect width="100" height="100" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            Wallet
                                        </a>
                                        <div class="arrow_inv">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 10 10" fill="none">
                                                <path d="M3.75 1.87549L6.875 5.00049L3.75 8.12549" stroke="#8195D6" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="logout_bnt">
                                        <button type="button" id="logout" class="logout_btn btn btn-primary">Log Out</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    