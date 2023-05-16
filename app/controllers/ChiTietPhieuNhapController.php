<?php
class ChiTietPhieuNhapController extends BaseController
{
	public $model_ctdh, $data = [];
	public function __construct()
	{
		$this->model_ctdh = $this->model("PhieuNhapHangModel");
	}

	public function insert($maPhieu, $maHang, $soluong, $maCuaHang)
	{
		echo $this->model_ctdh->insertCT($maPhieu, $maHang, $soluong, $maCuaHang);
	}
	
}
