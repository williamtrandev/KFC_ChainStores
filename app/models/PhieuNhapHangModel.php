<?php
class PhieuNhapHangModel extends BaseModel
{
	public function getAll($maCuaHang)
	{
		$res = $this->db->prepare("select * from phieunhaphang where maCuaHang=?");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}

	public function insert($maNhaCungCap, $tongTien, $maCuaHang)
	{
		$res = $this->db->prepare("insert into phieunhaphang (maNhaCungCap, tongTien, maCuaHang) values(?,?,?)");
		$res->bind_param("idi", $maNhaCungCap, $tongTien, $maCuaHang);
		$res->execute();
		return $res->affected_rows == 1;
	}

	public function getTotal($maCuaHang)
	{
		$res = $this->db->prepare("select sum(tongTien) as tongPhieuNhap from phieunhaphang where maCuaHang=?");
		$res->bind_param('i', $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		return $result->fetch_assoc()['tongPhieuNhap'];
	}
	public function insertCT($maPhieu, $maHang, $soluong, $maCuaHang)
	{
		$flag = false;
		$res = $this->db->prepare("insert into chitietphieunhaphang (maPhieuNhap, maHang, soLuong) values(?,?,?)");
		$res->bind_param("iii", $maPhieu, $maHang, $soluong);
		$res->execute();
		$flag = $res->affected_rows == 1;
		$res = $this->db->prepare("insert into kho (maPhieuNhap, maHang, soLuong, maCuaHang) values(?,?,?,?)");
		$res->bind_param("iiii", $maPhieu, $maHang, $soluong, $maCuaHang);
		$res->execute();
		$flag = $res->affected_rows == 1;
		return $flag;
	}
	public function getMaMoiNhat($maCuaHang)
	{
		$res = $this->db->prepare("select maPhieuNhap from phieunhaphang where maCuaHang=? order by maPhieuNhap desc limit 1");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		return $result->fetch_assoc()['maPhieuNhap'];
	}
	public function checkSoLuongTonKho($maHang, $soluong)
	{
		$res = $this->db->prepare("select COUNT(*) as available_count from kho where maHang = ? group by maHang having sum(soLuong) >= ?");
		$res->bind_param("id", $maHang, $soluong);
		$res->execute();
		$result = $res->get_result();
		return $result->fetch_assoc()['availabel_count'];
	}
	public function updateKho($maHang, $soluong)
	{
		$res = $this->db->prepare("UPDATE kho SET soluong = CASE WHEN (SELECT SUM(soLuong) FROM kho WHERE maHang = ?) >= ? THEN
        CASE
            WHEN ? > 0 THEN
                (SELECT SUM(soLuong) - ? FROM kho WHERE maHang = ? ORDER BY id ASC LIMIT 1)
            ELSE
                soLuong
        END
    ELSE
        soLuong END WHERE mahang = ?;");
		$res->bind_param("idddii", $maHang, $soluong, $soluong, $soluong, $maHang, $maHang);
		$res->execute();
		return 1;
	}
}
