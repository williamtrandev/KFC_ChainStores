<?php
class DonHangController extends BaseController
{
	public $model_dh, $data = [];
	public function __construct()
	{
		$this->model_dh = $this->model("DonHangModel");
	}

	public function getAllDonHangOnline()
	{
		echo $this->model_dh->getAllDonHangOnline();
	}
	public function getAllDonHangOnlineShip()
	{
		echo $this->model_dh->getAllDonHangOnlineShip();
	}
	public function insert($sdtKhachHang, $tongTien, $maNhanVien)
	{
		echo $this->model_dh->insert($sdtKhachHang, $tongTien, $maNhanVien);
	}
	public function getMaDonHangMoiNhat()
	{
		echo $this->model_dh->getMaDonHangMoiNhat();
	}
	public function updateNhanVienGiao($maDonHang, $maNhanVien)
	{
		echo $this->model_dh->updateNhanVienGiao($maDonHang, $maNhanVien);
	}
	public function updateTrangThaiDonHang($maDonHang, $trangThai)
	{
		echo $this->model_dh->updateTrangThaiDonHang($maDonHang, $trangThai);
	}
}
