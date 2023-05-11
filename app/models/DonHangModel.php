<?php
class DonHangModel extends BaseModel
{
	public function insert($sdtKhachHang, $tongTien, $maNhanVien)
	{
		$res = $this->db->prepare("insert into donhang (sdtKhachHang, tongTien, maNhanVien) values(?,?,?)");
		$res->bind_param("sdi", $sdtKhachHang, $tongTien, $maNhanVien);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function getMaDonHangMoiNhat()
	{
		$res = $this->db->query("select maDonHang from donhang order by maDonHang desc limit 1");
		return $res->fetch_assoc()['maDonHang'];
	}
	public function getAllDonHangOnline()
	{
		$res = $this->db->query("select * from donhang dh join donhangonline dho on dh.maDonHang = dho.maDonHang where trangthai = 'Chờ'");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getAllDonHangOnlineShip()
	{
		$res = $this->db->query("select * from donhang dh join donhangonline dho on dh.maDonHang = dho.maDonHang join thanhtoan tt on dh.maDonHang = tt.maDonHang left join nhanvien nv on nv.maNhanVien = dho.maNhanVienGiao where trangthai = 'Sẵn sàng giao'");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function updateNhanVienGiao($maDonHang, $maNhanVien)
	{
		$res = $this->db->prepare("update donhangonline set maNhanVienGiao = ? where maDonHang = ?");
		$res->bind_param("ii", $maNhanVien, $maDonHang);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function updateTrangThaiDonHang($maDonHang, $trangThai)
	{
		$res = $this->db->prepare("update donhang set trangThai = ? where maDonHang = ?");
		$res->bind_param("si", $trangThai, $maDonHang);
		$res->execute();
		return $res->affected_rows == 1;
	}
}
