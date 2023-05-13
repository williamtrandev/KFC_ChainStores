<?php
class QuanLyController extends BaseController
{
	public $data = [];
	public function index()
	{
		if(!isset($_SESSION['user'])) {
			header("Location: ". _WEB_ROOT."/nhanVien/login");
		}
		$this->data['title_page'] = 'Thống kê lợi nhuận';
		$this->data['content'] = 'admin/thongkeloinhuan';
		$this->data['data_pass'] = '';
		$this->data['tkln'] = '';
		$this->data['ndh'] = json_decode($this->model("DonHangModel")->getNumberDonHang(json_decode($_SESSION['user'])->maCuaHang));
		$this->data['tongdt'] = json_decode($this->model("DonHangModel")->getTotalRevenue(json_decode($_SESSION['user'])->maCuaHang));

		$this->render("layout/admin_layout", $this->data);
	}
	public function staffList()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$maCuaHang = json_decode($_SESSION['user'])->maCuaHang;
		$this->data['title_page'] = 'Quản lý nhân viên';
		$this->data['content'] = 'admin/quanlynhanvien';
		$this->data['data_pass'] = '';
		$this->data['nvbh'] = json_decode($this->model("NhanVienModel")->getAllNhanVienBanHang($maCuaHang));
		$this->data['nvgh'] = json_decode($this->model("NhanVienModel")->getAllNhanVienGiaoHang($maCuaHang));
		$this->data['db'] = json_decode($this->model("NhanVienModel")->getAllDauBep($maCuaHang));
		// $this->data['data_pass'] = json_decode($this->model("NhanVienModel")->getAll());
		$this->render("layout/admin_layout", $this->data);
	}
	public function historyList()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$maCuaHang = json_decode($_SESSION['user'])->maCuaHang;
		$this->data['title_page'] = 'Lịch sử giao dịch';
		$this->data['content'] = 'admin/lichsugiaodich';
		$dh = json_decode($this->model("DonHangModel")->getAllDonHangDaBan($maCuaHang, 1));
		$dho = json_decode($this->model("DonHangModel")->getAllDonHangOnlineDaBan($maCuaHang, 1));
		$this->data['data_pass'] = '';
		$this->data['dh'] = $dh;
		$this->data['dho'] = $dho;
		$this->data['ndh'] = $this->model("DonHangModel")->getNumberDonHangDaBan($maCuaHang);
		$this->data['ndho'] = $this->model("DonHangModel")->getNumberDonHangOnlineDaBan($maCuaHang);
		$this->render("layout/admin_layout", $this->data);
	}
	public function foodList()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$this->data['title_page'] = 'Danh sách món ăn';
		$this->data['content'] = 'admin/quanlymonan';
		$this->data['data_pass'] = '';
		$this->data['qlma'] = '';
		$this->data['monmoi'] = json_decode($this->model("MonAnModel")->getMonAnById(1));
		$this->data['cb1'] = json_decode($this->model("MonAnModel")->getMonAnById(2));
		$this->data['cbn'] = json_decode($this->model("MonAnModel")->getMonAnById(3));
		$this->data['gr_gq'] = json_decode($this->model("MonAnModel")->getMonAnById(4));
		$this->data['bg'] = json_decode($this->model("MonAnModel")->getMonAnById(5));
		$this->data['tan'] = json_decode($this->model("MonAnModel")->getMonAnById(6));
		$this->data['tu'] = json_decode($this->model("MonAnModel")->getMonAnById(7));
		$this->render("layout/admin_layout", $this->data);
	}
	public function storehouse() {
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$maCuaHang = json_decode($_SESSION['user'])->maCuaHang;
		$this->data['title_page'] = 'Quản lý kho';
		$this->data['content'] = 'admin/quanlykho';
		$this->data['qlk'] = '';
		$this->data['hh'] = json_decode($this->model("HangHoaModel")->getAll());
		$this->data['ncc'] = json_decode($this->model("NhaCungCapModel")->getAll($maCuaHang));
		$this->render("layout/admin_layout", $this->data);

	}
}
