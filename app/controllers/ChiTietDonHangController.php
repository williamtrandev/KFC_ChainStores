<?php
class ChiTietDonHangController extends BaseController
{
	public $model_ctdh, $data = [];
	public function __construct()
	{
		$this->model_ctdh = $this->model("ChiTietDonHangModel");
	}

	public function insert($maHoaDon, $maMonAn, $soluong)
	{
		echo $this->model_ctdh->insert($maHoaDon, $maMonAn, $soluong);
	}
	public function detail($maDonHang) {
		echo $this->model_ctdh->detail($maDonHang);
	}
}
