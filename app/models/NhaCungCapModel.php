<?php
class NhaCungCapModel extends BaseModel
{
	public function getAll($maCuaHang)
	{
		$res = $this->db->prepare("select * from nhacungcap where deleted=0 and maCuaHang=?");
		$res->bind_param("i", $maCuaHang);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function insert($tenncc, $sdt, $diachi, $maCuaHang)
	{
		$res = $this->db->prepare("insert into nhacungcap (tenNhaCungCap, sdt, diaChi, maCuaHang) values(?,?,?,?)");
		$res->bind_param("sssi", $tenncc, $sdt, $diachi, $maCuaHang);
		$res->execute();
		return $res->affected_rows  == 1;
	}
	public function update($tenncc, $sdt, $diachi, $maNhaCungCap)
	{
		$res = $this->db->prepare("update nhacungcap set tenNhaCungCap = ?, sdt =?, diaChi=? where maNhaCungCap=?");
		$res->bind_param("sssi", $tenncc, $sdt, $diachi, $maNhaCungCap);
		$res->execute();
		return $res->affected_rows  == 1;
	}
	public function delete($maNhaCungCap)
	{
		$res = $this->db->prepare("update nhacungcap set deleted=1 where maNhaCungCap=?");
		$res->bind_param("i", $maNhaCungCap);
		$res->execute();
		return $res->affected_rows  == 1;
	}
}
