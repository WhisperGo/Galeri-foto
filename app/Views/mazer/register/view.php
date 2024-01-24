<script src="<?=base_url('@mazer/assets/static/js/initTheme.js')?>"></script>
<div id="auth">
	<div class="row h-100">
		<div class="col-lg-5 col-12">
			<div id="auth-left">
				<div class="auth-logo">
					<img src="<?=base_url('@mazer/assets/compiled/svg/logo.svg')?>" alt="Logo">
				</div>

				<h1 class="auth-title">Register.</h1>
				<p class="auth-subtitle mb-5">
					Daftar untuk mendapatkan akses upload foto ke album pribadi.
				</p>

				<form action="<?= base_url('register/aksi_register')?>"method="post" enctype="multipart/form-data">
					
					<div class="form-group position-relative mb-4">
						<div class="input-group">
							<span class="input-group-text"><i class="fa-solid fa-user"></i></span>
							<input type="text" class="form-control form-control-xl" placeholder="Username" name="username"/>
						</div>
					</div>

					<div class="form-group position-relative mb-4">
						<div class="input-group">
							<span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
							<input type="password" class="form-control form-control-xl" placeholder="Password" name="password" id="password-input">
							<button type="button" class="btn btn-outline-primary" id="show-password-btn">
								<i class="fa-solid fa-eye"></i>
							</button>
						</div>
					</div>

					<div class="form-group position-relative mb-4">
						<label for="logo_perusahaan" class="form-label">Foto Profil (Opsional)</label>
						<div class="mb-3">
							<div class="custom-file">
								<div class="col-12 col-md-12">
									<input type="file" class="logo-perusahaan" id="foto_profil" name="foto_profil" accept="image/*">
								</div>
							</div>
						</div>
						<div id="preview"></div>
					</div>

					<!-- <div class="form-check form-check-lg d-flex align-items-end mb-4">
						<input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault"/>
						<label class="form-check-label text-gray-600" for="flexCheckDefault">
							Ingat Saya
						</label>
					</div> -->

					<!-- <div class="g-recaptcha" data-sitekey="6LcEfuojAAAAANG5m1V5uLxuVdX1L9ZXYA9XUM9v" data-callback="onCaptchaVerified"></div> -->

					<button type="submit" class="btn btn-primary btn-block shadow-lg btn-lg mt-2">Register</button>
				</form>


			</div>
		</div>
		<div class="col-lg-7 d-none d-lg-block">
			<div id="auth-right"></div>
		</div>
	</div>
</div>
</body>
</html>

<script>
	$(document).ready(function() {
		$('#show-password-btn').click(function() {
			var passwordInput = $('#password-input');
			var passwordInputType = passwordInput.attr('type');
			var showPasswordBtn = $('#show-password-btn');
			if (passwordInputType === 'password') {
				passwordInput.attr('type', 'text');
				showPasswordBtn.html('<i class="fa-solid fa-eye-slash"></i>');
			} else {
				passwordInput.attr('type', 'password');
				showPasswordBtn.html('<i class="fa-solid fa-eye"></i>');
			}
		});
	});
</script>

<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    // Callback function saat CAPTCHA berhasil diverifikasi
	function onCaptchaVerified(token) {
        // Enable tombol login
		document.getElementById("login-button").disabled = false;
	}
</script> -->