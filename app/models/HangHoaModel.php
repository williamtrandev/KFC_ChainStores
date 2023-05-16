<?php
class HangHoaModel extends BaseModel
{
	public function getAll($maCuaHang)
	{
		$res = $this->db->prepare("select * from kho k join phieunhaphang pnh on k.maPhieuNhap = pnh.maPhieuNhap join hanghoa hh on hh.maHang = k.maHang where k.maCuaHang = ? group by hh.maHang");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getHangHoaTheoNCC($maNhaCungCap)
	{
		$res = $this->db->prepare("select * from hanghoa where maNhaCungCap=?");
		$res->bind_param("i", $maNhaCungCap);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	
}
