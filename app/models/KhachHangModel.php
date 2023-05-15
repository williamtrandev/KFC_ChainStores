<?php
class KhachHangModel extends BaseModel
{
	public function authenticate($sdt, $matkhau)
	{
		$res = $this->db->prepare("select * from khachhang where sdt=? and matkhau=?");
		$res->bind_param("ss", $sdt, $matkhau);
		$res->execute();
		$result = $res->get_result();
		$data = [];
		while ($row = $result->fetch_assoc()) {
			$data[] = $row;
		}
		$status = count($data) == 1;
		return json_encode(array('status' => $status, 'data' => $data[0]));
	}
}
