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
		$this->data['ch'] = json_decode($this->model("CuaHangModel")->getAll());

		$this->render("layout/admin_chain_layout", $this->data);
	}
}
