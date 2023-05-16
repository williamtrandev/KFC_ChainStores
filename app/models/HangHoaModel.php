<?php
class HangHoaModel extends BaseModel
{
	public function getAll()
	{
		$res = $this->db->query("select * from hanghoa");
		$data = [];
		while ($row = $res->fetch_assoc()) {
			$data[] = $row;
		}
		return json_encode($data);
	}
	public function getHangHoaTheoNCC($maNhaCungCap)
	{
		$res = $this->db->query("select * from hanghoa where maNhaCungCap=?");
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
