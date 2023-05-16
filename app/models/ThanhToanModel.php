<?php
class ThanhToanModel extends BaseModel
{
	public function insert($madonhang, $phuongthucthanhtoan, $trangthaithanhtoan)
	{
		$res = $this->db->prepare("insert into thanhtoan (maDonHang, phuongThucThanhToan, trangThaiThanhToan) values(?,?,?)");
		$res->bind_param("isi", $madonhang, $phuongthucthanhtoan, $trangthaithanhtoan);
		$res->execute();
		return json_encode(array('status' => $res->affected_rows == 1));
	}
	public function update($madonhang, $trangthaithanhtoan)
	{
		$res = $this->db->prepare("update thanhtoan set trangThaiThanhToan = ? where maDonHang = ?");
		$res->bind_param("ii", $trangthaithanhtoan, $madonhang);
		$res->execute();
		return json_encode(array('status' => $res->affected_rows == 1));
	}
}
