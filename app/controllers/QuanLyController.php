<?php
class QuanLyController extends BaseController
{
	public $data = [];
	public function index()
	{
		$this->data['title_page'] = 'Thống kê lợi nhuận';
		$this->data['content'] = 'admin/thongkeloinhuan';
		$this->data['data_pass'] = '';
		$this->render("layout/admin_layout", $this->data);
	}
	public function staffList()
	{
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
	public function foodList()
	{
		$this->data['title_page'] = 'Danh sách món ăn';
		$this->data['content'] = 'admin/foodlist';
		$this->data['data_pass'] = json_decode($this->model("FoodModel")->getAll());
		$this->render("layout/admin_layout", $this->data);
	}
}
