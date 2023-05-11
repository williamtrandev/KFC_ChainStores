<?php
class NhanVienController extends BaseController
{
	public $model_user, $data = [];
	public function __construct()
	{
		$this->model_user = $this->model("NhanVienModel");
	}
	public function login()
	{
		$this->render("login/login");
	}
	public function authenticate()
	{
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user = $this->model_user->login($username, $password);
			if ($user['authenticate']) {
				$_SESSION['user'] = $this->model("NhanVienModel")->getDetailByPhone($username);
				if ($user['roleStaff'] == 'qlt') {
					header("Location: " . _WEB_ROOT . "/admin");
					exit();
				} else if ($user['roleStaff'] == 'ql') {
					header("Location: " . _WEB_ROOT . "/home");
					exit();
				} else {
					header("Location: " . _WEB_ROOT . "/home");
					exit();
				}
			} else {
				$_SESSION['err'] = "Sai số điện thoại hoặc mật khẩu";
				header("Location: " . _WEB_ROOT . "/nhanVien/login");
				exit();
			}
		}
	}
	public function update($name, $email, $birthday)
	{
		$id_khachhang = json_decode($_SESSION['user'])->id_khachhang;
		echo $this->model_user->updateInfo($name, $email, $birthday, $id_khachhang);
	}
	public function logout()
	{
		// Xóa session
		session_destroy();
		// Chuyển đến trang home
		header("Location: " . _WEB_ROOT . "/nhanVien/login");
		exit();
	}
	public function getAllNhanVienGiaoHang($macuahang) {
		echo $this-> model_user->getAllNhanVienGiaoHang($macuahang);
	}
}
