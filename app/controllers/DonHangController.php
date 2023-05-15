<?php
class DonHangController extends BaseController
{
	public $model_dh, $data = [];
	public function __construct()
	{
		$this->model_dh = $this->model("DonHangModel");
	}
	public function getAllDonHang($maCuaHang, $page) {
		echo $this->model_dh->getAllDonHang($maCuaHang, $page);
	}
	public function getAllDonHangOnline($maCuaHang)
	{
		echo $this->model_dh->getAllDonHangOnline($maCuaHang);
	}
	public function getAllDonHangOnlineShip($maCuaHang)
	{
		echo $this->model_dh->getAllDonHangOnlineShip($maCuaHang);
	}
	public function getAllDonHangCanLam($maCuaHang)
	{
		echo $this->model_dh->getAllDonHangCanLam($maCuaHang);
	}
	public function insert($sdtKhachHang, $tongTien, $maNhanVien, $maCuaHang)
	{
		echo $this->model_dh->insert($sdtKhachHang, $tongTien, $maNhanVien, $maCuaHang);
	}
	public function getMaDonHangMoiNhat($maCuaHang)
	{
		echo $this->model_dh->getMaDonHangMoiNhat($maCuaHang);
	}
	public function updateNhanVienGiao($maDonHang, $maNhanVien)
	{
		echo $this->model_dh->updateNhanVienGiao($maDonHang, $maNhanVien);
	}
	public function updateTrangThaiDonHang($maDonHang, $trangThai)
	{
		echo $this->model_dh->updateTrangThaiDonHang($maDonHang, $trangThai);
	}
	public function getAllDonHangDaBan($maCuaHang, $page)
	{
		echo $this->model_dh->getAllDonHangDaBan($maCuaHang, $page);
	}
	public function getNumberDonHang($maCuaHang)
	{
		echo $this->model_dh->getNumberDonHang($maCuaHang);
	}
	public function getNumberDonHangDaBan($maCuaHang) {
		echo $this->model_dh->getNumberDonHangDaBan($maCuaHang);
	}
	public function getAllDonHangOnlineDaBan($maCuaHang, $page)
	{
		echo $this->model_dh->getAllDonHangOnlineDaBan($maCuaHang, $page);
	}
	public function getNumberDonHangOnlineDaBan($maCuaHang)
	{
		echo $this->model_dh->getNumberDonHangOnlineDaBan($maCuaHang);
	}
	public function getTotalRevenue($maCuaHang) {
		echo $this->model_dh->getTotalRevenue($maCuaHang);
	}
}
