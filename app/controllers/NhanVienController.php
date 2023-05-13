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
					header("Location: " . _WEB_ROOT . "/quanLyTong");
					exit();
				} else if ($user['roleStaff'] == 'ql') {
					header("Location: " . _WEB_ROOT . "/quanLy");
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
	public function logout()
	{
		// Xóa session
		session_destroy();
		// Chuyển đến trang home
		header("Location: " . _WEB_ROOT . "/nhanVien/login");
		exit();
	}
	public function getAllNhanVienGiaoHang($macuahang)
	{
		echo $this->model_user->getAllNhanVienGiaoHang($macuahang);
	}
	public function insert($tennv, $gioitinh, $ngaysinh, $sdt, $diachi, $chucVu, $matkhau)
	{
		$maCuaHang = json_decode($_SESSION['user'])->maCuaHang;
		echo $this->model_user->insert($tennv, $gioitinh, $ngaysinh, $sdt, $diachi, $chucVu, $maCuaHang, $matkhau);
	}
	public function update($tennv, $gioitinh, $ngaysinh, $diachi, $chucVu, $matkhau, $manv)
	{
		echo $this->model_user->update($tennv, $gioitinh, $ngaysinh, $diachi, $chucVu, $matkhau, $manv);
	}
	public function delete($manv)
	{
		echo $this->model_user->delete($manv);
	}
}
