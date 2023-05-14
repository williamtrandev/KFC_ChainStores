<?php
class CuaHangController extends BaseController
{
	public $model_res, $data = [];
	public function __construct()
	{
		$this->model_res = $this->model("CuaHangModel");
	}
	public function index()
	{
		$this->data['title_page'] = 'Hệ thống rạp';
		$this->data['content'] = 'theater/theater';
		$this->data['link_css'] = "<link rel='stylesheet' href='" . _WEB_ROOT . "/public/assets/client/css/theater.css' />";
		$this->data['data_pass'] = json_decode($this->model_res->getAll());
		$this->render("layout/client_layout", $this->data);
	}
	public function getAll()
	{
		echo $this->model_res->getAll();
	}
	public function insert($tencuahang, $chinhanh)
	{
		echo $this->model_res->insert($tencuahang, $chinhanh);
	}
	public function update($tencuahang, $chinhanh, $macuahang)
	{
		echo $this->model_res->update($tencuahang, $chinhanh, $macuahang);
	}
	public function delete($macuahang)
	{
		echo $this->model_res->delete($macuahang);
	}
	public function getAllWithRevenue($macuahang)
	{
		echo $this->model_res->getAllWithRevenue($macuahang);
	}
}
