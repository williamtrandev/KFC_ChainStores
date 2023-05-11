<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="<?php echo _WEB_ROOT; ?>/public/assets/server/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/login.css" />
	<title>Đăng nhập</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
	<div class="login-container">
		<div class="forms-container">
			<div class="signin-signup">
				<form action="<?php echo _WEB_ROOT ?>/nhanVien/authenticate" class="sign-in-form" method="post">
					<h2 class="title">Đăng nhập</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Số điện thoại" name="username" required maxlength="10" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Mật khẩu" name="password" required />
					</div>
					<?php if (isset($_SESSION['err'])) {
						echo "<div style='color: red;'>" . $_SESSION['err'] . "</div>";
						unset($_SESSION['err']);
					} ?>
					<input type="submit" value="Đăng nhập" class="btn solid" />
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
				</div>
				<img src="<?php echo _WEB_ROOT ?>/public/assets/server/img/img_login.png" class="image" alt="" />
			</div>
		</div>
	</div>
</body>

</html>