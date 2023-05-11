<?php
class DonHangModel extends BaseModel
{
	public function insert($sdtKhachHang, $tongTien, $maNhanVien, $maCuaHang)
	{
		$res = $this->db->prepare("insert into donhang (sdtKhachHang, tongTien, maNhanVien, maCuaHang) values(?,?,?,?)");
		$res->bind_param("sdi", $sdtKhachHang, $tongTien, $maNhanVien, $maCuaHang);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function getMaDonHangMoiNhat($maCuaHang)
	{
		$res = $this->db->prepare("select maDonHang from donhang where maCuaHang=? order by maDonHang desc limit 1");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		return $result->fetch_assoc()['maDonHang'];
	}
	public function getAllDonHangOnline($maCuaHang)
	{
		$res = $this->db->prepare("select * from donhang dh join donhangonline dho on dh.maDonHang = dho.maDonHang where trangthai = 'Chờ' and maCuaHang=?");
		$res->bind_param('i', $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getAllDonHangCanLam($maCuaHang) {
		$res = $this->db->prepare("select * from donhang dh where trangThai = 'Đang xử lý' and dh.maCuaHang=?");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getAllDonHangOnlineShip($maCuaHang)
	{
		$res = $this->db->prepare("select * from donhang dh join donhangonline dho on dh.maDonHang = dho.maDonHang join thanhtoan tt on dh.maDonHang = tt.maDonHang left join nhanvien nv on nv.maNhanVien = dho.maNhanVienGiao where trangthai = 'Sẵn sàng giao' and dh.maCuaHang=?");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
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
