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
}
