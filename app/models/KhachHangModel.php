<?php
class KhachHangModel extends BaseModel
{
	public function authenticate($sdt, $matkhau)
	{
		$res = $this->db->prepare("select * from khachhang where sdt=? and matkhau=?");
		$res->bind_param("ss", $sdt, $matkhau);
		$res->execute();
		return $res->affected_rows == 1;
	}
}
