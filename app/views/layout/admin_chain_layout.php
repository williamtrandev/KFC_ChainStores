<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- MATERIAL CDN -->
	<link rel="icon" href="<?php echo _WEB_ROOT; ?>/public/assets/server/img/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
	<!-- STYLE SHEET -->
	<link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/admin.css">
	<link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/movieAdmin.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<title><?php echo $title_page ?></title>
</head>

<body>
	<div class="my-container">
		<aside>
			<!-- ===================== SIDEBAR ===================== -->
			<div class="my-sidebar">
				<div class="top">
					<div class="logo">
						<div style="width: 50px; height: 50px; border-radius: 10px; background-color: #695cfe; color: #f6f5ff; font-weight: 600; display: flex; justify-content: center; align-items: center; font-size: 1.4rem">KFC</div>
						<h2><span>William & Luanado</span></h2>
					</div>
					<div class="close" id="close-btn">
						<span class="material-icons-sharp">close</span>
					</div>
				</div>

				<a href="<?php echo _WEB_ROOT ?>/quanLyTong/index">
					<span class="material-icons-sharp">store</span>
					<h3>Quản lý chuỗi cửa hàng</h3>
				</a>
				<a href="<?php echo _WEB_ROOT ?>/quanLyTong/statistic">
					<span class="material-icons-sharp">query_stats</span>
					<h3>Xem thống kê lợi nhuận</h3>
				</a>

				<a href="<?php echo _WEB_ROOT ?>/nhanVien/logout">
					<span class="material-icons-sharp">logout</span>
					<h3>Đăng xuất</h3>
				</a>
			</div>
		</aside>
		<main>
			<div class="wrapper-date-user">
				<div class=" top">
					<button id="menu-btn">
						<span class="material-icons-sharp">menu</span>
					</button>
					<div class="profile d-md-flex align-items-center" style="font-size: 1.2rem">
						<div class="info d-flex align-items-center">
							<span style="color: var(--color-dark)">Chào,</span> <b><?php echo json_decode($_SESSION['user'])->tenNhanVien ?></b>
						</div>
						<div class="profile-photo">
							<img src="<?php echo _WEB_ROOT; ?>/public/assets/client/img/user.png">
						</div>
					</div>
				</div>
			</div>

			<?php

			if (isset($qlch)) {
				$this->render($content, ['ch' => $ch]);
			} else {
				$this->render($content, ['ch' => $ch]);
			}
			?>


	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo _WEB_ROOT; ?>/public/assets/client/js/admin.js"></script>

</body>

</html>