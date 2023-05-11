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
		$this->data['title_page'] = 'Trang bán hàng';
		$this->data['content'] = ''; // content giữ đường dẫn đến file view
		// $this->data['monan'] = json_decode($this->model("FoodModel")->getNewFood());
		$this->data['loaimon'] = json_decode($this->model("LoaiMonModel")->getAll());
		$this->render("layout/client_layout", $this->data);
	}
	public function listOrder() {
		$this->data['title_page'] = 'Danh sách đơn hàng online';
		$this->data['content'] = "order/order_list_online";
		$this->render("layout/client_layout", $this->data);
	}
	public function listShip()
	{
		$this->data['title_page'] = 'Phân bổ đơn giao online';
		$this->data['content'] = "order/order_list_ship";
		$this->render("layout/client_layout", $this->data);
	}
}
