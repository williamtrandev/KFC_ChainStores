<?php
class PhieuNhapHangController extends BaseController
{
	public $model_pnh, $data = [];
	public function __construct()
	{
		$this->model_pnh = $this->model("PhieuNhapHangModel");
	}
	public function getTotal($maCuaHang)
	{
		echo $this->model_pnh->getTotal($maCuaHang);
	}
	public function getAll($maCuaHang)
	{
		echo $this->model_pnh->getAll($maCuaHang);
	}
}
