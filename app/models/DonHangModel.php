<?php
class DonHangModel extends BaseModel
{
	public function insert($sdtKhachHang, $tongTien, $maNhanVien, $maCuaHang)
	{
		$res = $this->db->prepare("insert into donhang (sdtKhachHang, tongTien, maNhanVien, maCuaHang) values(?,?,?,?)");
		$res->bind_param("sdii", $sdtKhachHang, $tongTien, $maNhanVien, $maCuaHang);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function getAllDonHang($maCuaHang, $page)
	{
		$perpage = 10;
		$offset = ($page - 1) * $perpage;
		$res = $this->db->prepare("select * from donhang dh join nhanvien nv on dh.maNhanVien = nv.maNhanVien where trangthai = 'Hoàn thành' and MONTH(ngayLap) = MONTH(CURDATE()) and dh.maCuaHang=? order by dh.maDonHang desc limit $offset, $perpage");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
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
	public function getAllDonHangCanLam($maCuaHang)
	{
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
	public function getAllDonHangDaBan($maCuaHang, $page)
	{
		$perpage = 10;
		$offset = ($page - 1) * $perpage;
		$res = $this->db->prepare("select * from donhang dh join nhanvien nv on dh.maNhanVien = nv.maNhanVien where trangthai = 'Hoàn thành' and dh.maCuaHang=? and dh.maDonHang not in (select maDonHang from donhangonline) order by dh.maDonHang desc limit $offset, $perpage");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getAllDonHangOnlineDaBan($maCuaHang, $page)
	{
		$perpage = 10;
		$offset = ($page - 1) * $perpage;
		$res = $this->db->prepare("select dh.maDonHang, sdtKhachHang, ngayLap, tongTien, nv.tenNhanVien, nv2.tenNhanVien as tenNhanVienGiao, dho.diaChiGiaoHang from donhangonline dho join donhang dh on dho.maDonHang = dh.maDonHang join nhanvien nv on nv.maNhanVien = dh.maNhanVien join nhanvien nv2 on nv2.maNhanVien = dho.maNhanVienGiao where dh.trangthai = 'Hoàn thành' and dh.maCuaHang=? order by dh.maDonHang desc limit $offset, $perpage");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getNumberDonHang($maCuaHang)
	{
		$res = $this->db->prepare("select count(*) as soluong from donhang dh where trangthai = 'Hoàn thành' and dh.maCuaHang=?");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result()->fetch_assoc();
		return $result['soluong'];
	}
	public function getNumberDonHangDaBan($maCuaHang)
	{
		$res = $this->db->prepare("select count(*) as soluong from donhang dh where trangthai = 'Hoàn thành' and dh.maCuaHang=? and dh.maDonHang not in (select maDonHang from donhangonline)");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result()->fetch_assoc();
		return $result['soluong'];
	}
	public function getNumberDonHangOnlineDaBan($maCuaHang)
	{
		$res = $this->db->prepare("select count(*) as soluong from donhangonline dho join donhang dh on dho.maDonHang = dh.maDonHang where trangthai = 'Hoàn thành' and dh.maCuaHang=?");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result()->fetch_assoc();
		return $result['soluong'];
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
	public function getTotalRevenue($maCuaHang)
	{
		$res = $this->db->prepare("select sum(tongTien) as tongDoanhThu from donhang where trangThai = 'Hoàn thành' and MONTH(ngayLap) = MONTH(CURDATE()) and maCuaHang = ?");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		return $res->get_result()->fetch_assoc()['tongDoanhThu'];
	}
}
