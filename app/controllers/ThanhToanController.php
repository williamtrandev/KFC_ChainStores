<?php
class ThanhToanController extends BaseController
{
	public $model_tt, $data = [];
	public function __construct()
	{
		$this->model_tt = $this->model("ThanhToanModel");
	}
	public function insert($madonhang, $phuongthucthanhtoan, $trangthaithanhtoan) {
		echo $this->model_tt->insert($madonhang, $phuongthucthanhtoan, $trangthaithanhtoan);
	}
	public function update($madonhang, $trangthaithanhtoan)
	{
		echo $this->model_tt->update($madonhang, $trangthaithanhtoan);
	}
}
