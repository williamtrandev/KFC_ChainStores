<?php
class CuaHangModel extends BaseModel
{
	public function getAll()
	{
		$res = $this->db->query("select * from cuahang where deleted=0");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}

	public function insert($tencuahang, $chinhanh)
	{
		$res = $this->db->prepare("insert into cuahang (tenCuaHang, chiNhanh) values(?,?)");
		$res->bind_param("ss", $tencuahang, $chinhanh);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function update($tencuahang, $chinhanh, $maCuaHang)
	{
		$res = $this->db->prepare("update cuahang set tenCuaHang=?, chiNhanh=? where maCuaHang=?");
		$res->bind_param('ssi', $tencuahang, $chinhanh, $maCuaHang);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function delete($maCuaHang)
	{
		$res = $this->db->prepare("update cuahang set deleted=1 where maCuaHang=?");
		$res->bind_param('i', $maCuaHang);
		$res->execute();
		return $res->affected_rows == 1;
	}
	public function getAllWithRevenue($maCuaHang)
	{
		$res = $this->db->prepare("select ch.*, sum(dh.tongTien) as tongDoanhThu from cuahang ch join donhang dh on ch.maCuaHang = dh.maCuaHang where dh.maCuaHang=?");
		$res->bind_param('i', $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
}
