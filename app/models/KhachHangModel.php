<?php
class KhachHangModel extends BaseModel
{
	public function authenticate($sdt, $matkhau)
	{
		$res = $this->db->prepare("select * from khachhang where sdt=? and matkhau=?");
		$res->bind_param("ss", $sdt, $matkhau);
		$res->execute();
		$res1 = $res->get_result();
		$data = array();
		while ($row = $res1->fetch_assoc()) {
			$data[] = $row;
		}
		$status = count($data) == 1;
		return json_encode(array('status' => $status, 'data' => $data[0]));
	}
}
