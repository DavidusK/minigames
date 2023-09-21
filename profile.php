<?php require_once("./config.php"); ?>
<?php require_once(ROOT_DIR . "/includes/header.php"); ?>
<div class="profile_main position-relative">
	<div class="overlay_col"></div>
	<section class="profile_section common_padding_main position-relative">
		<div class="container">
			<div class="profile_bio">
				<div class="profile_user">
					<div class="user_img">
						<img src="<?=@APP_URL?>/assets/images/profileuser.png" alt="<?=@$userInfo['username']?>" class="user_profile_img img-fluid">
					</div>
					<div class="bio_content">
						<h4 class="user_profile_name text-capitalize"><?=@$userInfo['username']?></h4>
						<h4 class="user_profile_email_profile"><?=@$userInfo['email']?></h4>
						<div class="d-flex"></div>
					</div>
				</div>
				<div class="edit_btn">
					<button data-bs-toggle="modal" data-bs-target="#editProfile" class="copy_address edit-btn btn btn-primary" style="width: 136px; margin-top: 10px">
						Edit Profile
					</button>
					<button data-bs-toggle="modal" data-bs-target="#changePassword" class="copy_address edit-btn btn btn-primary" style="width: max-content; margin-top: 10px">
						Change password
					</button>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- Profile Modal -->
<div class="modal fade buy_modal profile_edit_mod" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="modal_inner_main position-relative">
					<a href="javascript:void(0)" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
						<img src="<?= @APP_URL ?>/assets/images/close_img.png" alt="close" class="img-fluid">
					</a>
					<div class="profile_inner">
						<form id="profile_form" class="form_login text-start">
							<input type="hidden" id="profileImage">
							<div class="mb-3">
								<div class="uploding_img position-relative">
									<img src="<?=@APP_URL?>/assets/images/profileuser.png" alt="<?=@$userInfo['username']?>" class="user_profile_img img-fluid">
									<div class="upload_wrapping">
										<div class="file_upload_icon position-relative">
											<label for="userProfileImg" class="upload_btn btn btn-secondary">Upload</label>
											<input type="file" id="userProfileImg" class="opacity-0 cursor-pointer profile_pic" />
											<p class="text-center img-text-msg" style="color: rgb(255, 35, 35); cursor: pointer;margin-top: 12px;"></p>
										</div>
									</div>
								</div>
							</div>
							<div class="mb-4 mb-3">
								<input name="user_name" id="user_name" placeholder="Name" required type="text" class="form-control">
							</div>
							<div class="login-btn-wrap mt-5">
								<button type="submit" data-action="update_profile" class="btn-form btn btn-secondary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Password Modal -->
<div class="modal fade buy_modal profile_edit_mod change_pass" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="modal_inner_main position-relative">
					<a href="javascript:void(0)" class="close-btn" style="top: 11px; right: 22px" data-bs-dismiss="modal" aria-label="Close">
						<img src="<?= @APP_URL ?>/assets/images/close_img.png" alt="close" class="img-fluid">
					</a>
					<div class="profile_inner">
						<div class="mainpage-wrap position-relative">
							<div class="overlay_col"></div>
							<section class="login-theme position-relative">
								<div class="container">
									<div class="login_inner change_pass2">
										<h5 class="log-head">Change password</h5>
										<form class="form_login text-start" id="change-password">
											<div class="mb-4 mb-3">
												<input name="email" id="email" placeholder="Email" autocomplete="off" required type="email" class="form-control">
											</div>
											<div class="position-relative mb-4 mb-3">
												<input name="oldPassword" id="oldPassword" required placeholder="Old Password" autocomplete="new-password" type="password" class="form-control">
											</div>
											<div class="position-relative mb-4 mb-3">
												<input name="password" id="password" minlength="8" required placeholder="Password" autocomplete="new-password" type="password" class="form-control">
											</div>
											<div class="position-relative mb-4 mb-3">
												<input name="repeat_password" id="repeat_password" placeholder="Confirm Password" type="password" class="form-control">
											</div>
											<div class="position-relative mb-4 mb-3">
												<input name="verify_code" id="verify_code" placeholder="Email Verification Code" type="text" class="form-control">
												<div class="eye-icon" style="cursor:pointer;" id="verification-code">Get </div>
											</div>
											<div class="login-btn-wrap mt-4">
												<button class="btn-form btn btn-secondary" type="submit">
													<span class="ml-2">Update</span>
												</button>
											</div>
										</form>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(async function(){
        let userAuth = getCookie("userLogin");
        if (userAuth == null) {
            $(".battleship_main").empty();
            location.replace(APP_URL + '/login');
        }
    });
</script>
<?php require_once(ROOT_DIR . "/includes/footer.php"); ?>