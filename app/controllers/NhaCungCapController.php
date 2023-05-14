<?php
class NhaCungCapController extends BaseController
{
	public $model_ncc, $data = [];
	public function __construct()
	{
		$this->model_ncc = $this->model("NhaCungCapModel");
	}
	public function getAll($maCuaHang)
	{
		echo $this->model_ncc->getAll($maCuaHang);
	}
	public function insert($tenncc, $sdt, $diachi, $maCuaHang)
	{
		echo $this->model_ncc->insert($tenncc, $sdt, $diachi, $maCuaHang);
	}
	public function update($tenncc, $sdt, $diachi, $maNhaCungCap)
	{
		echo $this->model_ncc->update($tenncc, $sdt, $diachi, $maNhaCungCap);
	}
	public function delete($maNhaCungCap)
	{
		echo $this->model_ncc->delete($maNhaCungCap);
	}
}
