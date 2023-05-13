<?php
class HomeController extends BaseController
{
	public $model_home, $data = [];
	public function __construct()
	{
		$this->model_home = $this->model("HomeModel");
	}
	
	public function index()
	{
		if(!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
			exit();
		}
		if (json_decode($_SESSION['user'])->chucVu == 'Nhân viên bán hàng') {
			$this->data['title_page'] = 'Trang bán hàng';
			$this->data['content'] = ''; // content giữ đường dẫn đến file view
			$this->data['loaimon'] = json_decode($this->model("LoaiMonModel")->getAll());
		} else {
			$this->data['title_page'] = 'Danh sách đơn cần làm';
			$this->data['content'] = "order/order_list_todo";
		}
		$this->render("layout/client_layout", $this->data);
	}
	public function listOrder()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$this->data['title_page'] = 'Danh sách đơn hàng online';
		$this->data['content'] = "order/order_list_online";
		$this->render("layout/client_layout", $this->data);
	}
	public function listShip()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$this->data['title_page'] = 'Phân bổ đơn giao online';
		$this->data['content'] = "order/order_list_ship";
		$this->render("layout/client_layout", $this->data);
	}
	public function listToDo()
	{
		if (!isset($_SESSION['user'])) {
			header("Location: " . _WEB_ROOT . "/nhanVien/login");
		}
		$this->data['title_page'] = 'Danh sách đơn cần làm';
		$this->render("layout/client_layout", $this->data);
	}
}
