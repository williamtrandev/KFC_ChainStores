<?php
class ChiTietDonHangModel extends BaseModel
{
	public function insert($maDonHang, $maMonAn, $soLuong)
	{
		$res = $this->db->prepare("insert into chitietdonhang (maDonHang, maMonAn, soLuong) values(?,?,?)");
		$res->bind_param("iii", $maDonHang, $maMonAn, $soLuong);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function detail($maDonHang)
	{
		$res = $this->db->prepare("select * from chitietdonhang ctdh join MonAn ma on ctdh.maMonAn=ma.maMonAn where maDonHang = ?");
		$res->bind_param("i", $maDonHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function detailShip($maDonHang)
	{
		$res = $this->db->prepare("select * from chitietdonhang ctdh join MonAn ma on ctdh.maMonAn=ma.maMonAn where maDonHang = ?");
		$res->bind_param("i", $maDonHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}

}
