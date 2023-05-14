<?php
class QuanLyTongController extends BaseController
{
	public $data = [];
	public function index()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$this->data['title_page'] = 'Quản lý chuỗi cửa hàng';
		$this->data['content'] = 'admin/quanlychuoicuahang';
		$this->data['qlch'] = '';
		$this->data['ch'] = json_decode($this->model("CuaHangModel")->getAll());

		$this->render("layout/admin_chain_layout", $this->data);
	}
	
	public function statistic()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$maCuaHang = json_decode($_SESSION['user'])->maCuaHang;
		$this->data['title_page'] = 'Xem thống kê lợi nhuận';
		$this->data['content'] = 'admin/thongkeloinhuanchuoi';
		$this->data['tkln'] = '';
		$maCuaHang = json_decode($_SESSION['user'])->maCuaHang;
		$this->data['ch'] = json_decode($this->model("CuaHangModel")->getAllWithRevenue($maCuaHang));

		$this->render("layout/admin_chain_layout", $this->data);
	}
}
