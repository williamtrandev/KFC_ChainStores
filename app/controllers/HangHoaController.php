<?php
class CuaHangController extends BaseController
{
	public $model_res, $data = [];
	public function __construct()
	{
		$this->model_res = $this->model("CuaHangModel");
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
	public function getHangHoaTheoNCC($maNhaCungCap)
	{
		echo $this->model_res->getHangHoaTheoNCC($maNhaCungCap);
	}
}
